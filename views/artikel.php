<?php
echo'
<ol>
	';
	if ($artikel->countDataLengkap() > 0) 
	{
					$semua = $artikel->countDataLengkap();
					$limit = 2; // jumlah query per berita 
					$pages = ceil($semua / $limit); // melihat total blok yang ada
					$page = (isset($_GET['page']))? (int)$_GET['page'] : 1; // default page
					$start = ($page - 1) * $limit; //startnya 
					$no = ($page - 1) * $limit + 1; // menentukan asending nomor tiap paging
					//$author = $author->getAuthorByUser($parameter);
					$data = $artikel->getDataLimit($start, $limit);

					foreach ($data as $a) 
						//$a = $artikel->getArtikel();
						//foreach ($a as $a)
					{
						echo'
						<li><h1>'.$a['title'].'</h1></li>
						<p>'.substr($a['content'],0,200).'</p>
						<a href="'.root.'artikel/read/'.$a['id'].'">Continue Reading</a>

						';
					}
					echo '
					<ul class="pagination">
					';
						$root = root.$model;
						$blok = 12;
						$ini = ceil($page / $blok);

						$mulai = ($blok * $ini) - ($blok - 1);
						$selesai = ($blok <= $pages)? ($ini * $blok) : $pages;

						$kurang1 = $page - 1;
						$tambah1 = $page + 1;

						if ($pages >= 1 && $page <= $pages) 
						{
							echo ($page != 1 OR empty($page))? '<li style="cursor: pointer;"> <a href="'.$root.'?page='.$kurang1.'"><<</a> </li>': '';

							for ($x = $mulai; $x <= $selesai; $x++) 
							{
								if ($x == $page) 
								{
									echo '<li style="cursor: pointer;" class="active"> <a>'.$x.'</a> </li>';
								} else 
								{
									echo '<li style="cursor: pointer;"> <a href="'.$root.'?page='.$x.'">'.$x.'</a> </li>';
								};
							}

							echo ($page != $pages)? '<li style="cursor: pointer;"> <a href="'.$root.'?page='.$tambah1.'">>></a> </li>' : '';
						}
						echo '
					</ul>
				</div>

				';
				
	}
			
			$top = $artikel->topArtikel();
			echo'</ol>
			<h3>Top Artikel</h3>
			<ol>';
				foreach ($top as $a)
				{
					echo '
					<li>'.$a['title'].'</li>
					';
				}
				echo '</ol>';
				echo '<ol>
				<h3>Last Artikel</h3>';

				$last = $artikel->lastArtikel();
				foreach ($last as $last)
				{
					echo '<li>'.$last['title'].'</li>';
				}
				echo '</ol>';


				?>