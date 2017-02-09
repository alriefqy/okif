
<?php
$aksi = root."controllers/mahasiswa_control.php?model=mahasiswa&method=";


echo '

<section id="error">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="errror-page-area">
					<div class="error-content">
						<span>Form Database Anggota dan Alumni</span>
						<p>Bagi Mahasiswa atau Alumni Teknik Informatika Unhas, dimohon untuk mengisi form dibawah ini.</p>
						<div class="row mt">
							<div class="col-lg-12">
								<div class="form-panel">

									<form class="form-horizontal style-form" action="'.$aksi.'add" method="POST" enctype="multipart/form-data">
										<div class="form-group">
										';
									if (isset($_GET['act']))
									{
										$act = $_GET['act'];

									}
									else
									{
										$act = "";
									}
									$act = $libs->notifikasi($act);

									echo'
											<label class="col-sm-2 col-sm-2 control-label">NIM</label>
											<div class="col-sm-10">
												<h4>D421</h4>
												<input type="text" name="nim" class="form-control">
												<p>Nim Yang dimasukkan cukup lima digit terakhir ex : 14502</p>
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
										<button type="submit" name="submit" class="btn btn-success">Submit Data</button>
									</form>
								</div>
							</div><!-- col-lg-12-->      	
						</div><!-- /row -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
';