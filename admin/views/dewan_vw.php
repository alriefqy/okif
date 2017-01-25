<?php
$aksi = adm."controllers/dewan_control.php?model=dewan&method=";
if(isset($method)) :
	echo '

<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i>Dewan Musyawarah Mahasiswa Informatika</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					
					<section id="unseen">
						';
						switch($method)
						{
							case '':
							$no = 1;
							$a = $dewan->getDewan();
							echo'
							<h4><a href="'.adm.'dewan/add"><button type="button" class="btn btn-default">Tambah Dewan</button></a></h4>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Periode</th>
										<th>Foto</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>';
									foreach ($a as $a)
									{
										echo'
										<tr>
											<td>'.$no++.'</td>
											<td>'.$a['nama'].'</td>
											<td>'.$a['angkatan'].'</td>
											<td>'.$a['periode'].'</td>
											<td><img src="'.root.'asset/dewan/'.$a['foto'].'" width="130" height="130"></td>
											<td><a href="'.adm.'dewan/edit/'.$a['id'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbspEdit</i></button></a>

												<button class="btn btn-danger btn-xs"><a href=\'javascript: hapusAlert("'.$a['id'].'");\'><i class="fa fa-trash-o ">&nbspDelete</i></button></td>
											</tr>
											';
										}
										echo'

									</tbody>
								</table>

							</section>
						</div><!-- /content-panel -->

					</div><!-- /col-lg-4 -->	

				</div><!-- /row -->



				';
				break;

				case 'add':
				echo'

				<div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
							<h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data</h4>
							<form class="form-horizontal style-form" method="post" action="'.$aksi.'add" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Anggota Dewan</label>
									<div class="col-sm-10">
										<input type="text" name="name" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Angkatan</label>
									<div class="col-sm-10">
										<select required name="angkatan" class="form-control">
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="Akumulasi">Akumulasi</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periode Kepengurusan</label>
									<div class="col-sm-10">
										<input type="text" name="periode" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Foto</label>
									<div class="col-sm-10">
										<input type="file" name="foto" class="form-control"  required>
									</div>
									<img style="max-height: 250px;" id="uploadgambar" src="'.root.'asset/image/ORIGINAL.PNG" alt="Upload Gambar" />
								</div>

								<button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
							</form>
						</div>
					</div><!-- col-lg-12-->      	
				</div><!-- /row -->


				
				';
				break;

				case 'edit':
				$a = $dewan->getDewanById($parameter);
				foreach ($a as $a) 
				{
					echo'

					<div class="row mt">
						<div class="col-lg-12">
							<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
								<form class="form-horizontal style-form" method="post" action="'.$aksi.'edit" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Nama</label>
										<div class="col-sm-10">
											<input type="text" name="name" class="form-control" value="'.$a['nama'].'" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
										<div class="col-sm-10">
											<select required name="angkatan" value="'.$a['angkatan'].'" class="form-control">
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="Akumulasi">Akumulasi</option>
										</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Periode</label>
										<div class="col-sm-10">
											<input type="text" name="periode" class="form-control" value="'.$a['periode'].'" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Foto</label>
										<div class="col-sm-10">
											<input type="file" name="foto" class="form-control">
										</div>
									</div>
									<input type="hidden" name="id"  value="'.$a['id'].'">
									<input type="hidden" name="foto"  value="'.$a['foto'].'">
									<button type="submit" name="edit" class="btn btn-success">Edit Data</button>
								</form>
							</div>
						</div><!-- col-lg-12-->      	
					</div><!-- /row -->
					';
				}

				break;
			}

			endif;
			?>
			<script type="text/javascript">
				function hapusAlert(iddokumen) {
					var conBox = confirm("Anda yakin ingin menghapus data ini?");
					if (conBox) {
						location.href = "<?php echo $aksi."delete"; ?>&id=" + iddokumen;
					} else {
						return false;
					}
				}
			</script>