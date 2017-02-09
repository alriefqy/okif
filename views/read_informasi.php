<?php

$a = $informasi->getInformasiById($parameter);
foreach ($a as $a)
{
	echo'
	<section id="blog-archive">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="blog-archive-area">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="blog-archive-left">
									<!-- Start blog news single -->
									<article class="blog-news-single">
										<div class="blog-news-img">
											<img src="'.root.'asset/galeri/'.$a['foto'].'" alt="image">
										</div>
										<div class="blog-news-title">
											<h2>'.$a['kegiatan'].'</h2>
											<p>By <a class="blog-author" href="#">admin</a> 
											|'.$libs->tgl_indo($a['waktu']).'</p>
										</div>
										<div class="blog-news-details blog-single-details">
											<p>'.$a['content'].'</p>
										<div class="fb-share-button" data-href="'.root.'artikel/read/'.$a['id'].'" data-layout="button" data-size="large" data-mobile-iframe="true">
											<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share This Artticle</a>
											</div>
										</article>
										
										<div class="col-md-2"></div>             
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



	?>