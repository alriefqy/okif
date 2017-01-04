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
	//echo $method;
	echo'
	<h1>'.$a['title'].'</h1>
	<p>'.$a['content'].'</p>
	<img src="'.root.'asset/artikel/'.$a['foto'].'" width="400" height="400" >
	';	
}


?>