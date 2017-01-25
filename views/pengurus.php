<?php
	
echo'
<section id="single-page-header">
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="single-page-header-left">
						<h2>Struktur Kepengurusan</h2>
						<p>Himpunan Mahasiswa Informatika Fakultas Teknik Universitas Hasanuddin Periode 2016/2017</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="portfolio">
	<div class="portfolio-area">
		<!-- portfolio menu -->
		<div class="portfolio-menu">
			<ul>
			<li class="filter" data-filter="all">Semua</li>
			<li class="filter" data-filter=".KESEKRETARIATAN">KESEKRETARIATAN</li>
			<li class="filter" data-filter=".HUMAS">HUMAS</li>
			<li class="filter" data-filter=".PENGABDIAN">PENGABDIAN</li>
			<li class="filter" data-filter=".PENDIDIKAN">PENDIDIKAN</li>
			<li class="filter" data-filter=".PSDM">PSDM</li>
			</ul>
		</div>      
		<!-- Portfolio container -->

		<div class="portfolio-container" id="mixit-container">
		';
		$ketua = $ketua->getKetuaHimpunan();
		foreach ($ketua as $a) 
		{
			echo'
			<div class="single-portfolio mix ">
				<div class="single-item">
					<img src="'.root.'asset/ketua/'.$a['foto'].'" alt="img">
					<div class="single-item-content">               
						<a class="fancybox view-icon" data-fancybox-group="gallery" href="assets/images/portfolio/portfolio-big-2.jpg"><i class="fa fa-search-plus"></i></a>
						<div class="portfolio-title">
							<h4>'.$a['name'].'</h4>
							<span>'.$a['jabatan'].'</span>
						</div>
					</div>
				</div>
			</div>';
		}
		
		$pengurus = $pengurus->getPengurus();
		foreach ($pengurus as $a) 
		{
			echo'
			<div class="single-portfolio mix '.$a['kompartemen'].' ">
				<div class="single-item">
					<img src="'.root.'asset/pengurus/'.$a['foto'].'" alt="img">
					<div class="single-item-content">               
						<a class="fancybox view-icon" data-fancybox-group="gallery" href="assets/images/portfolio/portfolio-big-2.jpg"><i class="fa fa-search-plus"></i></a>
						<div class="portfolio-title">
							<h4>'.$a['name'].'</h4>
							<span>'.$a['jabatan'].'</span>
						</div>
					</div>
				</div>
			</div>';
		}

		
		echo'
		</div>
	</section>
	';
	?>