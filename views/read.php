<?php
$dihit = $artikel->getHit($parameter);
foreach ($dihit as $dihit)
{
	$hit = $dihit;
}
$hit = $hit + 1;
$artikel->hitCounter($hit,$parameter);
$a = $artikel->getArtikelById($parameter);
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
											<img src="'.root.'asset/artikel/'.$a['foto'].'" alt="image">
										</div>
										<div class="blog-news-title">
											<h2>'.$a['title'].'</h2>
											<p>By <a class="blog-author" href="#">'.$a['author'].'</a> <span class="blog-date">|'.$libs->tgl_indo($a['time_record']).'</span></p>
										</div>
										<div class="blog-news-details blog-single-details">
											<p>'.$a['content'].'</p><br>
											
												<div class="fb-share-button" data-href="'.root.'artikel/read/'.$a['id'].'" data-layout="button" data-size="large" data-mobile-iframe="true">
												<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share This Artticle</a>
												</div>
										</div>
										
									</article>

									<div class="leave-comment-box">
										<h4 class="title-heading">TINGGALKAN KOMENTAR</h4>
										<div class="fb-comments" data-href="'.root.'artikel/read/'.$a['id'].'" data-numposts="5" data-width="100%" data-order-by="reverse_time"></div>
									</div>
								</div>
								<div class="col-md-2"></div>             
							</div>
						</div>
					</div>
				</div>
			</div>  
		</section>


		';

	}





	?>