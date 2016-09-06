<?php
	class libs_model {
		public function waktu($wkt) {
			$jam = substr($wkt, 0, 2);
			$menit = substr($wkt, 3, 2);
			if ($jam < 12) {
				$AMPM = "AM";
				if ($jam == 0) $jam = 12;
			} else {
				$AMPM = "PM";
				if ($jam != 12) $jam = $jam-12;
			}

			return $jam.':'.$menit.' '.$AMPM;
		}

		public function tgl_indo($tgl) {
			if ($tgl == "0000-00-00") {
				return "-";
			} else {
				$tanggal = date("j", strtotime($tgl));
				$bulan = $this->getBulan(substr($tgl,5,2));
				$tahun = substr($tgl, 0, 4);
				return $tanggal.' '.$bulan.' '.$tahun;
			}
		}

		public function format_tgl($tgl, $indo) {
			if (substr($tgl, 2, 1) == '-') { // ini format dd-mm-yyyy
				$tanggal = substr($tgl, 0, 2);
				$bulan = substr($tgl, 3, 2);
				$tahun = substr($tgl, 6, 4);
				return $tahun.'-'.$bulan.'-'.$tanggal;
			} else if (substr($tgl, 4, 1) == '-') { // ini format yyyy-mm-dd
				$tahun = substr($tgl, 0, 4);
				$bulan = substr($tgl, 5, 2);
				$tanggal = substr($tgl, 8, 2);
				return $indo? $tanggal.' '.$this->getBulan($bulan).' '.$tahun : $tanggal.'-'.$bulan.'-'.$tahun;
			}
		}

		public function getHari($day) {
			switch ($day) {
				case 0: 
					return "Ahad";
					break;
				case 1: 
					return "Senin";
					break;
				case 2:
					return "Selasa";
					break;
				case 3:
					return "Rabu";
					break;
				case 4:
					return "Kamis";
					break;
				case 5:
					return "Jumat";
					break;
				case 6:
					return "Sabtu";
					break;
			}
		}

		public function getBulan($bln) {
			switch ($bln) {
				case 1: 
					return "Januari";
					break;
				case 2:
					return "Februari";
					break;
				case 3:
					return "Maret";
					break;
				case 4:
					return "April";
					break;
				case 5:
					return "Mei";
					break;
				case 6:
					return "Juni";
					break;
				case 7:
					return "Juli";
					break;
				case 8:
					return "Agustus";
					break;
				case 9:
					return "September";
					break;
				case 10:
					return "Oktober";
					break;
				case 11:
					return "November";
					break;
				case 12:
					return "Desember";
					break;
			}
		}

		public function fb_comment_count($url) {
			$json = json_decode(file_get_contents('https://graph.facebook.com/?ids='.$url));
			return isset($json->$url->comments) ? $json->$url->comments : 0;
		}

		public function notifikasi($notif) {
			switch ($notif) {
				case 'add':
					echo '
						<div class="alert alert-block alert-success fade in">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<p>Data Berhasil Ditambahkan</p>
						</div>
					';
					break;

				case 'upd':
					echo '
						<div class="alert alert-block alert-success fade in">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<p>Data Berhasil Diubah</p>
						</div>
					';
					break;

				case 'del':
					echo '
						<div class="alert alert-block alert-warning fade in">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<p>Data Berhasil Dihapus</p>
						</div>
					';
					break;

				case 'snd':
					echo '
						<div class="alert alert-block alert-success fade in">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<p id="notif_kirim">File Berhasil Dikirimkan</p>
						</div>
					';
					break;

				case 'tmt':
					echo '
						<li>
							<a href="javascript:;"> <i class="fa fa-angle-double-left"></i> SESI ADA SUDAH HABIS. SILAKAN LOGIN ULANG. <i class="fa fa-angle-double-right"></i> </a>
						</li>
					';
					break;

				case 'lgt':
					echo '
						<li>
							<a href="javascript:;"> <i class="fa fa-angle-double-left"></i> ANDA SUDAH LOGOUT <i class="fa fa-angle-double-right"></i> </a>
						</li>
					';
					break;

				case 'err':
					echo '
						<div class="alert alert-block alert-danger fade in">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<p>Data Gagal Dieksekusi</p>
						</div>
					';
					break;
			}
		}

		public function cek_login() {
			@session_start();
			$timeout=$_SESSION['timeout'];
			if(time()<$timeout) {
				$this->timer();
				return true;
			} else {
				unset($_SESSION['timeout']);
				return false;
			}
		}

		public function timer() {
			@session_start();
			$time = 3600;
			return $_SESSION['timeout'] = time() + $time;
		}

		public function makeLogoPath($logo) {
			$logo = strtolower($logo);
			$logo = trim($logo, " ");
			$value = preg_replace('~[\\\\/:*?"<>|]~', '', $logo);
			$value = preg_replace("~[']~", "", $value);
			$value = str_replace(" ", "", $value);
			$value = $value.".jpg";
			return $value;
		}

		public function anti_injection($data) {
			$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
			return $filter;
		}

		public function stringHtml($text) {
			$text = trim($text);
			$save = trim(htmlentities($text, ENT_QUOTES));
			$save = str_replace('\\', '&#92;', $save);
			return $save;
		}

		public function changeLink($v) {
			$v = strtolower($v);
			$v = trim($v, " ");
			$value = preg_replace('~[\\\\/:*?"<>|.,]~', '', $v);
			$value = preg_replace("~[']~", "", $value);
			$value = str_replace(" ", "-", $value);
			// $value = $value.".html";
			return $value;
		}

		public function unsavequery($text) {
			$save = html_entity_decode($text, ENT_QUOTES);
			return $save;
		}

		public function uploadFile($folder, $file, $nametag) {
			//kode untuk upload ke folder gambar
			$tmp_name = $file["tmp_name"];
			$ext = explode('.',$file['name']);
			$extension = $ext[sizeof($ext)-1];
			$extension = strtolower($extension);

			$namaberu = $nametag.".".$extension;
			// $namaberu = $id.'_'.$tipe.'.'.$extension;

			$name = $folder.$namaberu;

			//fungsi cut dari temp file ke yang kita mau
			$size = ceil($file['size']/1024); // disini misalkan tidak ada file maka akan 0

			if($size <= 10260) { 
				if(move_uploaded_file($tmp_name, $name)) {
					return $namaberu;
				} else {
					return '';
				}; //fungsi untuk memindahkan gambar 
			} else {
				return false;
			}
		}

		public function deleteFile($url, $data) {
			$hapus = $url.$data;
			if (file_exists("$hapus")) {
				unlink("$hapus");
				return true;
			} else {
				return false;
			}
		}

		public function uploadImageToFolder($folder, $file) {
			//kode untuk upload ke folder gambar 
			$tmp_name = $file["tmp_name"];
			$ext = explode('.',$file['name']);
			$extension = $ext[sizeof($ext)-1];
			$extension = strtolower($extension);
			$namaberu = uniqid().'.'.$extension;
			$name = $folder.$namaberu;
			
			//fungsi cut dari temp file ke yang kita mau
			$size = ceil($file['size']/1024); // disini misalkan tidak ada file maka akan 0
			@$cek =  empty($file)?array():getimagesize($file['tmp_name']);
			// var_dump($cek);

			if(!empty($cek['mime']) and $size <= 1026) { 
				if($extension == 'png' or $extension == 'jpg' or $extension == 'jpeg' or $extension == 'JPEG' or $extension == 'JPG' or $extension == 'PNG') {
					if(move_uploaded_file($tmp_name, $name)) {
						return $namaberu;
					} else {
						return '';
					}; //fungsi untuk memindahkan gambar 
				} else {
					return '';
				}
			} else {
				return false;
			}
		}

	}
?>
