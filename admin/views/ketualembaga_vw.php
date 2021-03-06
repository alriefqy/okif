<?php
$aksi = adm."controllers/ketua_control.php?model=ketua&method=";
if(isset($method)) :
	echo '

<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i>Jabatan OKIF</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					
					<section id="unseen">
						';
						switch($method)
						{
							case '':
							$no = 1;
							$a = $ketua->getKetua();
							echo'
							<h4><a href="'.adm.'ketua/add"><button type="button" class="btn btn-default">Tambah Jabatan</button></a></h4>
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
											<td>'.$a['name'].'</td>
											<td>'.$a['jabatan'].'</td>
											<td>'.$a['periode'].'</td>
											<td><img src="'.root.'asset/ketua/'.$a['foto'].'" width="130" height="130">
											<td><a href="'.adm.'ketua/edit/'.$a['id'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbspEdit</i></button></a>

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
									<label class="col-sm-2 col-sm-2 control-label">Nama Ketua Lembaga</label>
									<div class="col-sm-10">
										<input type="text" name="name" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
									<div class="col-sm-10">
										<input type="text" name="jabatan" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periode Kepengurusan</label>
									<div class="col-sm-10">
										<input type="text" name="periode" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Status</label>
									<div class="col-sm-10">
										<select name="status" class="form-control"  required>
											<option value="himpunan">HMIF</option>
											<option value="dewan">DMMIF</option>
										</select>
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
				$a = $ketua->getKetuaById($parameter);
				foreach ($a as $a) 
				{
					echo'

					<div class="row mt">
						<div class="col-lg-12">
							<div class="form-panel">
								<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
								<form class="form-horizontal style-form" method="post" action="'.$aksi.'edit" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Default</label>
										<div class="col-sm-10">
											<input type="text" name="name" class="form-control" value="'.$a['name'].'" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Default</label>
										<div class="col-sm-10">
											<input type="text" name="jabatan" class="form-control" value="'.$a['jabatan'].'" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Default</label>
										<div class="col-sm-10">
											<input type="text" name="periode" class="form-control" value="'.$a['periode'].'" required>
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Periode Kepengurusan</label>
									<div class="col-sm-10">
										<select name="status" value="'.$a['status'].'"class="form-control"  required>
											<option value="himpunan">HMIF</option>
											<option value="dewan">DMMIF</option>
										</select>
									</div>
								</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Default</label>
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