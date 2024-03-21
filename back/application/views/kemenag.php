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
		<td>Nama Surat</td>
		<td>Arti</td>
		<td>Golongan Surat</td>
		<td>Jumlah ayat</td>
		<td></td>
	</tr>

	<?php 
		foreach ($dat->data as $key => $value) {
	 ?>
	 <tr style="font-size: 20px;">
	 	<td class="font-arabic"><?php echo $value->surat_name; ?> | <?php echo $value->surat_text; ?></td>
	 	<td><?php echo $value->surat_terjemahan; ?></td>
	 	<td class="font-arabic"><?php echo $value->golongan_surah; ?></td>
	 	<td><?php echo $value->count_ayat; ?></td>
	 	<td><a href="<?php echo base_url() ?>client/kemenag_detail/<?php echo $value->id;?>/<?php echo $value->count_ayat;?>">Buka</a></td>
	 </tr>
	<?php } ?>
</table>