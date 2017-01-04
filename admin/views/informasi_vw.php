<?php
$aksi = adm."controllers/informasi_control.php?model=informasi&method=";
if(isset($method)) :
	echo '

<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i>Media Informasi</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					<section id="unseen">
						';
						switch($method) 
						{
							case '':
							$no = 1;
							$a = $informasi->getInformasi();
							echo'
							<h4><a href="'.adm.'informasi/add"><button type="button" class="btn btn-default">Tambah Data</button></a></h4>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Kegiatan</th>
										<th>Waktu</th>
										<th>Content</th>
										<th>Foto</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									';

									foreach ($a as $a)
									{
										echo'

										<tr>
											<td>'.$no++.'</td>
											<td>'.$a['kegiatan'].'</td>
											<td>'.$a['waktu'].'</td>
											<td>'.$a['content'].'</td>
											<td><img src="'.root.'asset/galeri/'.$a['foto'].'" width="130" height="130"></td>
											<td><a href="'.adm.'informasi/edit/'.$a['id'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbspEdit</i></button></a>

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

				</div><!-- /row -->';

				break;

				case 'add':
				echo'

				<div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
							<h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data</h4>
							<form class="form-horizontal style-form" method="post" action="'.$aksi.'add" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Kegiatan</label>
									<div class="col-sm-10">
										<input type="text" name="kegiatan" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Konten</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="content"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Foto</label>
									<div class="col-sm-10">
										<input type="file" name="foto" class="form-control"  required>
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
							</form>
						</div>
					</div><!-- col-lg-12-->      	
				</div><!-- /row -->


				
				';
				break;

				case 'edit':
				$a = $informasi->getInformasiById($parameter);
				foreach ($a as $a) 
				{
					echo'
					<div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
							<form class="form-horizontal style-form" method="post" action="'.$aksi.'edit" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Kegiatan</label>
									<div class="col-sm-10">
										<input type="text" name="kegiatan" class="form-control" value="'.$a['kegiatan'].'" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Konten</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="content">'.$a['content'].'</textarea>
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