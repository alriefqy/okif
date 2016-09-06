<?php 
	if (isset($model)):
		$homepage_active = $model == ''? "active" : "";
		$tanggapan_active = $model == 'tanggapan'? "active" : "";
		$galeri_active = $model == 'galeri'? "active" : "";
		$slideshow_active = $model == 'slideshow'? "active" : "";
		$berita_active = $model == 'berita'? "active" : "";
		$artikel_active = $model == 'artikel'? "active" : "";
		$level_active = $model == 'level'? "active" : "";
?>
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="<?php echo $homepage_active;?>"><a href="<?php echo adm; ?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						
								
						<li>
							<a class="dropmenu" href="#"><i class="icon-home"></i><span class="hidden-tablet"> Profil Desa</span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="lembaga.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Struktur Lembaga</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Data Penduduk</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
							</ul>	
						</li>
						<li class="<?php echo $tanggapan_active;?>"><a href="<?php echo adm; ?>tanggapan"><i class="icon-inbox"></i><span class="hidden-tablet"> Tanggapan</span></a></li>
						
						
						<li class="<?php echo $galeri_active;?>"><a href="<?php echo adm; ?>galeri"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>

						<li class="<?php echo $slideshow_active;?>"><a href="<?php echo adm; ?>slideshow"><i class="icon-picture"></i><span class="hidden-tablet"> Slideshow</span></a></li>

						<li class="<?php echo $berita_active;?>"><a href="<?php echo adm; ?>berita.php"><i class="icon-file"></i><span class="hidden-tablet"> Berita</span></a></li>
						
						<li class="<?php echo $artikel_active;?>"><a href="<?php echo adm; ?>artikel"><i class="icon-file"></i><span class="hidden-tablet"> Artikel</span></a></li>

						<li class="<?php echo $level_active;?>"><a href="<?php echo adm; ?>level"><i class="icon-group"></i><span class="hidden-tablet"> Users</span></a></li>
						
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">	
			<?php endif; ?>