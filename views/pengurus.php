<?php
$a = $pengurus->getPengurus();
foreach ($a as $a) 
{
	echo '
		<table>

			<th>Nama</th>
			<th>Jabatan</th>
			<th>Periode</th>
			<th>Foto</th>


			<tr>
					<td>'.$a['name'].'</td>
					<td>'.$a['jabatan'].'</td>
					<td>'.$a['periode'].'</td>
					<td><img src="'.root.'asset/pengurus/'.$a['foto'].'" width="300" height="400"></td>
			</tr>
		</table>


	 ';
}


?>