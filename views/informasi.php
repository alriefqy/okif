<?php
echo'
	<section id="single-page-header">
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single-page-header-left">
							<h2>KEGIATAN OKIF</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	';
	if ($informasi->countDataLengkap() > 0) 
	{
					$semua = $informasi->countDataLengkap();
					$limit = 2; // jumlah query per berita 
					$pages = ceil($semua / $limit); // melihat total blok yang ada
					$page = (isset($_GET['page']))? (int)$_GET['page'] : 1; // default page
					$start = ($page - 1) * $limit; //startnya 
					$no = ($page - 1) * $limit + 1; // menentukan asending nomor tiap paging
					//$author = $author->getAuthorByUser($parameter);
					$data = $informasi->getDataLimit($start, $limit);
					
					foreach ($data as $a) 
						//$a = $artikel->getArtikel();
						//foreach ($a as $a)
					{
						echo '

		<section id="blog-archive">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="blog-archive-area">
						<div class="row">
							<div class="col-md-8">
								<div class="blog-archive-left">
									<!-- Start blog news single -->
									<article class="blog-news-single">
										<div class="blog-news-img">
											<a href="'.root.'informasi/read/'.$a['id'].'"><img src="'.root.'/asset/galeri/'.$a['foto'].'" alt="image"></a>
										</div>
										<div class="blog-news-title">
											<h2><a href="'.root.'informasi/read/'.$a['id'].'">'.$a['kegiatan'].'</a></h2>
											<p>By <b>admin</b></p>
										</div>
										<div class="blog-news-details">
											<p>'.substr($a['content'], 0,200).'</p>
											<a class="blog-more-btn" href="'.root.'informasi/read/'.$a['id'].'">Read More <i class="fa fa-long-arrow-right"></i></a>
										</div>
									</article>
									<!-- Start blog pagination -->
									
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>  
		</section>

						';
						
					}

						$root = root.$model;
						$blok = 12;
						$ini = ceil($page / $blok);

						$mulai = ($blok * $ini) - ($blok - 1);
						$selesai = ($blok <= $pages)? ($ini * $blok) : $pages;

						$kurang1 = $page - 1;
						$tambah1 = $page + 1;


					echo '
						
					<div class="blog-pagination">
						<ul class="pagination-nav">
										
					';
						
						if ($pages >= 1 && $page <= $pages) 
						{
							echo ($page != 1 OR empty($page))? '<li> <a href="'.$root.'?page='.$kurang1.'"><<</a> </li>': '';

							for ($x = $mulai; $x <= $selesai; $x++) 
							{
								if ($x == $page) 
								{
									echo '<strong><li style="color:blue"> <a>'.$x.'</a> </li></strong>';
								} else 
								{
									echo '<li> <a href="'.$root.'?page='.$x.'">'.$x.'</a> </li>';
								};
							}

							echo ($page != $pages)? '<li> <a href="'.$root.'?page='.$tambah1.'">>></a> </li>' : '';
						}
						echo '
					</ul>
				</div>

				
				';
				
	}
			
			

				?>