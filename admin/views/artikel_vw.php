<?php

$aksi = adm."controllers/artikel_control.php?model=artikel&method=";
if(isset($method)) :
	echo '
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i>Artikel</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					<section id="unseen">
						';
						switch($method)
						{
							case '':
							$no = 1;
							$a = $artikel->getArtikel();

							echo '

							<h4><a href="'.adm.'artikel/add"><button type="button" class="btn btn-default">Tambah Artikel</button></a></h4>
							<table id="example3" class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Content</th>
										<th>Time Record</th>
										<th>Author</th>
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
											<td>'.$a['title'].'</td>
											<td>'.$a['content'].'</td>
											<td>'.$a['time_record'].'</td>
											<td>'.$a['author'].'</td>
											<td><img src="'.root.'asset/artikel/'.$a['foto'].'" width="100" height="100"></td>
											<td><a href="'.adm.'artikel/edit/'.$a['id'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbspEdit</i></button></a>
												<button class="btn btn-danger btn-xs"><a href=\'javascript: hapusAlert("'.$a['id'].'");\'><i class="fa fa-trash-o ">&nbspDelete</i></button></td>
											</tr>
											';
										}
										break;

										case 'add':
										echo'

										<div class="row mt">
											<div class="col-lg-12">
												<div class="form-panel">
													<h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data</h4>
													<form class="form-horizontal style-form" action="'.$aksi.'add" method="POST" enctype="multipart/form-data">

														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Judul Artikel</label>
															<div class="col-sm-10">
																<input type="text" name="title" class="form-control"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Konten Artikel </label>
															<div class="col-sm-10">
																<textarea class="form-control" name="content"></textarea>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Foto</label>
															<div class="col-sm-10">
																<input type="file" name="foto" class="form-control">
															</div>
														</div>
														<input type="hidden" name="author" value="'.$_SESSION['name'].'">
														<button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
													</form>
												</div>
											</div><!-- col-lg-12-->      	
										</div><!-- /row -->



										';
										break;

										case 'edit':
										$a = $artikel->getArtikelById($parameter);
										foreach ($a as $a)
										{
											echo'

											<div class="row mt">
											<div class="col-lg-12">
												<div class="form-panel">
													<h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data</h4>
													<form class="form-horizontal style-form" action="'.$aksi.'edit" method="POST" enctype="multipart/form-data">
														
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Judul Artikel</label>
															<div class="col-sm-10">
																<input type="text" name="title" class="form-control" value="'.$a['title'].'"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Konten Artikel </label>
															<div class="col-sm-10">
																<textarea class="form-control" name="content">'.$a['content'].'</textarea>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Foto</label>
															<div class="col-sm-10">
																<input type="file" name="foto" class="form-control">
															</div>
															<input type="hidden" name="id"  value="'.$a['id'].'">
															<input type="hidden" name="foto"  value="'.$a['foto'].'">
															<input type="text" name="author" value="'.$_SESSION['name'].'">
														</div>

														<button type="submit" name="edit" class="btn btn-success">Tambahkan</button>
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