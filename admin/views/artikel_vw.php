<script src="<?php echo adm; ?>tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({selector:'textarea'});
  </script>
<script src="<?php echo root;?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	function filePreview(input)
	{
		if(input.files && input.files[0])
		{
			var reader = new FileReader();
			reader.onload = function(e)
			{

				$('#uploadForm + img').remove();
				$('#blah').attr('src',e.target.result);
				
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script type="text/javascript">
	function filePreview2(input)
	{
		if(input.files && input.files[0])
		{
			var reader = new FileReader();
			reader.onload = function(e)
			{
				$('#uploadForm2 + img').remove();
				$('#edit').attr('src',e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>



<?php

$aksi = adm."controllers/artikel_control.php?model=artikel&method=";
if(isset($method)) :
	echo '

<script type="text/javascript" src="'.root.'assets/datatables/js/jquery.js"></script>
<script type="text/javascript" src="'.root.'assets/datatables/js/dataTables.min.js"></script>
<script type="text/javascript" src="'.root.'assets/datatables/js/jquery.dataTables.min.js"></script>
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
							<table class="table table-striped table-bordered table-hover" id="mydata">
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
											<td>'.substr($a['content'], 0,200).'</td>
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
													<form class="form-horizontal style-form" action="'.$aksi.'add" method="POST" enctype="multipart/form-data" id="uploadForm">

														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Judul Artikel</label>
															<div class="col-sm-10">
																<input type="text" name="title" class="form-control"  required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Konten Artikel </label>
															<div class="col-sm-10">
																<textarea rows="10" class="form-control" name="content"></textarea>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Foto</label>
															<div class="col-sm-10">
																<input type="file" name="foto" id="file" class="form-control">
																<i>Ket: Ukuran gambar harus 900x500 (rasio 9:5)</i><br/><br/>
															</div>


															<label class="col-sm-2 control-label"></label>
															<div class="col-sm-10">
																<script>
																	$("#file").change(function()
																	{
																		filePreview(this);
																	});
																</script>
																<img style="max-height: 250px;" style="" src="'.root.'asset/image/okif.png" id="blah">
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
														<form class="form-horizontal style-form" action="'.$aksi.'edit" method="POST" enctype="multipart/form-data" id="">

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
																	<input type="file" name="foto" class="form-control" id="foto">
																</div>
																
																<label class="col-sm-2 control-label"></label>
																<br><br>
																<div class="col-sm-10">
																	<script type="text/javascript">
																$("#foto").change(function()
																	{
																		filePreview2(this);
																	});
																</script>
																	<img style="max-height: 250px;"  src="'.root.'asset/artikel/'.$a['foto'].'" id="edit">
																</div>
																<input type="hidden" name="id"  value="'.$a['id'].'">
																<input type="hidden" name="foto"  value="'.$a['foto'].'">
																<input type="hidden" name="author" value="'.$_SESSION['name'].'">
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
									<script>
										
										$('#mydata').dataTable();

									</script>


									

									