<?php
$aksi = adm."controllers/mahasiswa_control.php?model=mahasiswa&method=";
if(isset($method)) :
echo '
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i>Mahasiswa Dan Alumni</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					
					<section id="unseen">
					';
	switch($method)
	{
		case '':
			$no = 1;
			$a = $alumni->getData();
			echo'
							<h4><a href="'.adm.'mahasiswa/add"><button type="button" class="btn btn-default">Tambah Data</button></a></h4>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Nim</th>
										<th>Nama</th>
										<th>Tempat,Tanggal Lahir</th>
										<th>Agama</th>
										<th>Tahun Masuk</th>
										<th>Tahun Lulus</th>
										<th>Judul Skripsi</th>
										<th>Prestasi</th>
										<th>Beasiswa</th>
										<th>Alamat</th>
										<th>No Telfon</th>
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
				<td> D421'.$a['nim'].'</td>
				<td>'.$a['nama'].'</td>
				<td>'.$a['tempat'] .'&nbsp'. $a['tanggallahir'].'</td>
				<td>'.$a['agama'].'</td>
				<td>'.$a['thn_masuk'].'</td>
				<td>'.$a['thn_lulus'].'</td>
				<td>'.$a['judul_skripsi'].'</td>
				<td>'.$a['prestasi'].'</td>
				<td>'.$a['beasiswa'].'</td>
				<td>'.$a['alamat'].'</td>
				<td>'.$a['no_telp'].'</td>
				<td><img src="'.root.'asset/mahasiswa/'.$a['foto'].'" width="100" height="100"></td>
				<td><a href="'.adm.'mahasiswa/edit/'.$a['nim'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil">&nbspEdit</i></button></a>
					<button class="btn btn-danger btn-xs"><a href=\'javascript: hapusAlert("'.$a['nim'].'");\'><i class="fa fa-trash-o ">&nbspDelete</i></button></td>
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
                              <label class="col-sm-2 col-sm-2 control-label">NIM</label>
                              <div class="col-sm-10">
                              	 <h4>D421</h4>
                                  <input type="text" name="nim" class="form-control">
                                  <span class="help-block">Nim Yang dimasukkan cukup lima digit terakhir ex : 14502</span>
                              </div>
                          </div>
                          <div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-10">
										<input type="text" name="name" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
									<div class="col-sm-10">
										<input type="text" name="tempat" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="date" name="tanggallahir" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Agama</label>
									<div class="col-sm-10">
										<input type="text" name="agama" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Masuk</label>
									<div class="col-sm-10">
										<input type="text"  name="thn_masuk" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Lulus</label>
									<div class="col-sm-10">
										<input type="text" name="thn_lulus" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Judul Skripsi</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="judul_skripsi"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Prestasi</label>
									<div class="col-sm-10">
										<input type="text" name="prestasi" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Beasiswa</label>
									<div class="col-sm-10">
										<input type="text" name="beasiswa" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Alamat</label>
									<div class="col-sm-10">
										<input type="text" name="alamat" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">No Telp/Hp</label>
									<div class="col-sm-10">
										<input type="text" name="no_telp" class="form-control"  required>
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
		$a = $mahasiswa->getDataById($parameter);
		foreach ($a as $a) 
		{
			echo'

			<div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
							<h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data</h4>
							<form class="form-horizontal style-form" action="'.$aksi.'edit" method="POST" enctype="multipart/form-data">
								<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIM</label>
                              <div class="col-sm-10">
                              	<input type="text" name="nim" disabled="true" value="D421'.$a['nim'].'" class="form-control">
                                 
                              </div>
                          </div>
                          <div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama</label>
									<div class="col-sm-10">
										<input type="text" name="name" value="'.$a['nama'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
									<div class="col-sm-10">
										<input type="text" name="tempat" value="'.$a['tempat'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
									<div class="col-sm-10">
										<input type="date" value="'.$a['tanggallahir'].'" name="tanggallahir" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Agama</label>
									<div class="col-sm-10">
										<input type="text" name="agama" value="'.$a['agama'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Masuk</label>
									<div class="col-sm-10">
										<input type="text" value="'.$a['thn_masuk'].'" name="thn_masuk" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Tahun Lulus</label>
									<div class="col-sm-10">
										<input type="text" name="thn_lulus" value="'.$a['thn_lulus'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Judul Skripsi</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="judul_skripsi">'.$a['judul_skripsi'].'</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Prestasi</label>
									<div class="col-sm-10">
										<input type="text" name="prestasi" value="'.$a['prestasi'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Beasiswa</label>
									<div class="col-sm-10">
										<input type="text" value="'.$a['beasiswa'].'" name="beasiswa" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Alamat</label>
									<div class="col-sm-10">
										<input type="text" name="alamat" value="'.$a['alamat'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">No Telp/Hp</label>
									<div class="col-sm-10">
										<input type="text" name="no_telp" value="'.$a['no_telp'].'" class="form-control"  required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Foto</label>
									<div class="col-sm-10">
										<input type="file" name="foto" class="form-control">
									</div>
								</div>
								<input type="hidden" name="nim" value="'.$a['nim'].'">
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