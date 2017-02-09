<?php
echo '
<!-- Start slider -->
<section id="slider">
	<div class="main-slider">
		';
		$headline = $headline->getDataLengkap();
		foreach ($headline as $a) 
		{
		echo'
		<div class="single-slide">
			<img src="'.root.'asset/headline/'.$a['foto'].'" alt="img">
			<div class="slide-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="slide-article">
								<h1 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">'.$a['judul'].' </h1>
								<p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">'.$a['deskripsi'].'</p>

							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="slider-img wow fadeInUp">
								';
								if ($a['foto_headline'] != NULL)
								{echo'
								<img src="'.root.'asset/headline/'.$a['foto_headline'].'" alt="logo-okifft-uh">
								';
							}
							echo'
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	';
}
echo'
<div class="single-slide">
	<img src="assets/images/back.jpg" alt="img">
	<div class="slide-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="slide-article">
						<h1 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Form Database</h1>
						<p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">Alumni dan Mahasiswa Informatika Fakultas Teknik Universitas Hasanuddin</p>
						<a class="read-more-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" href="'.root.'form">Menuju Form</a>
					</div>
				</div>

			</div> 
		</div>
	</div>

</div>
</section>
<!-- End slider -->

<!-- Start Feature -->
<section id="feature">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-area">
					<h2 class="title"><span class="normal-color">Tujuan</span> OKIF FT-UH</h2>
					<span class="line"></span>
					<p><b>OKIF FT-UH</b> bertujuan sebagai sarana peningkatan ketakwaan kepada Tuhan Yang Maha Esa, yang berasaskan nilai-nilai luhur pancasila demi terwujudnya cita-cita bangsa dengan mengembangkan wawasan, integritas dan potensi diri, kemampuan keprofesian, serta pengabdian kepada masyarakat.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Feature -->
<!-- Start Pricing table -->
<section id="our-team">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-area">
					<h2 class="title">Ketua-Ketua Lembaga</h2>
					<span class="line"></span>
				</div>
			</div>

			<div class="col-md-12">
				
				<div class="our-team-content">
					<div class="row">
						<!-- Start single team member -->
						';
						$ketua = $ketua->getKetua();
						foreach ($ketua as $a) 
						{
						echo'
						<!-- Start single team member -->
						<div class="col-md-6 col-sm-6">
							<div class="single-team-member">
								<div class="team-member-img">
									<img width="" height="60%" src="asset/ketua/'.$a['foto'].'" alt="'.$a['name'].'">
								</div>
								<div class="team-member-name">
									<p>'.$a['name'].'</p>
									<span>'.$a['jabatan'].'</span>
								</div>
								<div class="team-member-link">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
						</div>
						<!-- Start single team member -->
						';
					}

					echo'

					<!-- Start single team member -->
				</div>
			</div>

		</div>

	</div>
</div>
</section>

<!-- Start latest news -->
<section id="latest-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-area">
					<h2 class="title">Seputar OKIF FT-UH</h2>
					<span class="line"></span>
				</div>
			</div>
			<div class="col-md-12">
				<div class="latest-news-content">
					<div class="row">
						<!-- start single latest news -->
						';

						$informasi = $informasi->getLastInformasi();
						foreach ($informasi as $a) 
						{
						echo'
						<div class="col-md-4">
							<article class="blog-news-single">
								<div class="blog-news-img">
									<a href="'.root.'informasi/read/'.$a['id'].'"><img src="'.root.'asset/galeri/'.$a['foto'].'" alt="'.$a['kegiatan'].'"></a>
								</div>
								<div class="blog-news-title">
									<h2><a href="blog-single-with-right-sidebar.html">'.$a['kegiatan'].'</a></h2>
									<p>By <a class="blog-author" href="#">-Admin</a> <span class="blog-date">|'.$libs->tgl_indo($a['waktu']).'</span></p>
								</div>
								<div class="blog-news-details">
									<p>'.substr($a['content'], 0,200).'</p>
									<a class="blog-more-btn" href="'.root.'informasi/read/'.$a['id'].'">Read More <i class="fa fa-long-arrow-right"></i></a>
								</div>
							</article>
						</div>
						';
					}
					echo'


				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- End latest news -->

<!-- Start latest news -->
<section id="latest-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-area">
					<h2 class="title">IT Info</h2>
					<span class="line"></span>
				</div>
			</div>
			<div class="col-md-12">
				<div class="latest-news-content">
					<div class="row">
						<!-- start single latest news -->
						';
						$lastArtikel = $artikel->lastArtikel();
						foreach ($lastArtikel as $a) 
						{
						echo'
						<div class="col-md-4">
							<article class="blog-news-single">
								<div class="blog-news-img">
									<a href="'.root.'artikel/read/'.$a['id'].'"><img src="'.root.'asset/artikel/'.$a['foto'].'" alt="image"></a>
								</div>
								<div class="blog-news-title">
									<h2><a href="'.root.'artikel/read/'.$a['id'].'">'.$a['title'].'</a></h2>
									<p>By <a class="blog-author" href="#">'.$a['author'].'</a> <span class="blog-date">|'.$libs->tgl_indo($a['time_record']).'</span></p>
								</div>
								<div class="blog-news-details">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the</p>
									<a class="blog-more-btn" href="'.root.'artikel/read/'.$a['id'].'">Read More <i class="fa fa-long-arrow-right"></i></a>
								</div>
							</article>
						</div>
						';
					}
					echo'

					<!-- start single latest news -->
					<!-- start single latest news -->

				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- End latest news -->

<footer class="site-footer">
	<div class="text-center">
		

		';
		?>
		<div id="map" style="width:100%;height:350px;"></div>

		<script>
			function myMap() {
				var myCenter = new google.maps.LatLng(-5.231253, 119.501708);
				var mapCanvas = document.getElementById("map");
				var mapOptions = {center: myCenter, zoom: 15};
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var marker = new google.maps.Marker({position:myCenter});


				marker.setMap(map);
				google.maps.event.addListener(marker,'mousemove',function() {
					var infowindow = new google.maps.InfoWindow({
						content:"Sekretariat OKIF, Gedung Classroom lt 1"
					});
					infowindow.open(map,marker);
				});
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGO4g84_BRZwynn04cgxifVzyOA4_kKEA&callback=myMap"></script>

		<?php
		echo'
	</div>

</footer>
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<div class="footer-left">
					<h3>Contact Info</h3>
					<p>Jl Poros Malino, Bontomarannu Gowa</p>
					<p>Sulawesi Selatan 92161</p>
					<p>okifftuh@gmail.com</p><br>
					
				</div>

			</div>
			<div class="col-sm-12 col-sm-6">
				<div class="footer-right2">
					<h3>Link Terkait</h3>
					<p><a href="http://unhas.ac.id">Universitas Hasanuddin</a></p>
					<p><a href="http://eng.unhas.ac.id">Fakultas Teknik Universitas Hasanuddin</a></p>
					<p><a href="http://eng.unhas.ac.id/informatika">Prodi Teknik InformatikaFakultas Teknik Universitas Hasanuddin</a></p>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</footer>

	';


	?>