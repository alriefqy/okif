<?php
$aksi = adm."controllers/user_control.php?model=user&method=";
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
							$a = $user->getUser();

							echo '<h4><a href="'.adm.'user/add"><button type="button" class="btn btn-default">Tambah User</button></a></h4>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>User</th>
										<th>Level</th>
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
									<td>'.$a['name'].'</td>
									<td>'.$a['user'].'</td>
									<td>'.$a['level'].'</td>
									<td><img src="'.root.'asset/user/'.$a['foto'].'" width="100" height="100"></td>
									<td><button class="btn btn-danger btn-xs"><a href=\'javascript: hapusAlert("'.$a['id'].'");\'><i class="fa fa-trash-o ">&nbspDelete</i></button></td>
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
							<form class="form-horizontal style-form" method="post" action="'.$aksi.'add" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-10">
										<input type="text" name="name" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">User Name</label>
									<div class="col-sm-10">
									<input type="text" name="user" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Foto</label>
									<div class="col-sm-10">
										<input type="password" name="password" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Foto</label>
									<div class="col-sm-10">
										<select class="form-control" name="level">
										<option class="form-control" value="Admin">Admin</option>
										<option class="form-control" value="User">User</option>
								</select>
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
							</form>
						</div>
					</div><!-- col-lg-12-->      	
				</div><!-- /row -->

				';
							case 'edit':
							$a = $pengurus->getPengurusById($parameter);
							foreach ($a as $a) 
							{
								echo'
								<form action="'.$aksi.'edit" method="POST" enctype="multipart/form-data" >
									<input type="text" name="name" value="'.$a['name'].'">
									<input type="text" name="jabatan"  value="'.$a['jabatan'].'">
									<input type="text" name="periode"  value="'.$a['periode'].'">
									<input type="file" name="foto">
									<input type="text" name="id"  value="'.$a['id'].'">
									<input type="hidden" name="foto"  value="'.$a['foto'].'">
									<input type="submit" name="edit" value="Submit">
								</form>
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