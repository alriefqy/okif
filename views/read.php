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
										  <p>By <a class="blog-author" href="#">'.$a['author'].'</a> <span class="blog-date">|'.$a['time_record'].'</span></p>
										</div>
										<div class="blog-news-details blog-single-details">
										<p>'.$a['content'].'</p>
									</div>
								</article>
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