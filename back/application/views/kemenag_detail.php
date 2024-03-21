<style type="text/css">
	@font-face {
    font-family: fontArab;
    src: url('http://localhost/mp3/LPMQ.ttf');
}

.font-arabic {
    font-size: x-large;
    font-family: fontArab;
    padding-right: 0px;
}
</style>
<table border="1">
	<tr style="font-size: 20px;background:yellow;">
		<td>Ayat</td>
		<td>Lafad</td>
		<td>Terjemahan</td>
		<td>teks fn</td>
		<td>Audio</td>
	</tr>

	<?php 
		foreach ($dat->data as $key => $value) {
	 ?>
	 <tr style="font-size: 20px;">
	 	<td><?php echo $value->no_ayat; ?></td>
	 	<td class="font-arabic"><?php echo $value->teks_ayat; ?></td>
	 	<td><?php echo $value->teks_terjemah; ?></td>
	 	<td><?php echo $value->teks_fn; ?></td>
	 	<td>
	 		<?php if ($value->no_ayat < 10) { $bb= '00'.$value->no_ayat; }elseif($value->no_ayat >= 10 && $value->no_ayat < 100){ $bb= '0'.$value->no_ayat; }else{$bb=$value->no_ayat;} ?>
	 		<audio controls="true">
			    <source src="https://quran.kemenag.go.id/cmsq/source/s01/<?php echo $link_mp3.''.$bb; ?>.mp3" type="audio/mpeg">
			</audio>
	 	</td>
	 	
	 </tr>
	<?php } ?>
</table>