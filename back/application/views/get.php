
 <table border="1">
 	<tr>
 		<td>Ayat</td>
 		<td>Arab</td>
 		<td>Arti</td>
 		<td>Teuing</td>
 	</tr>
 	<?php 
 		foreach ($dat->data as $key => $value) {
 	 ?>
 	 	<tr>
	 		<td><?php echo $value->nomor ?></td>
	 		<td><?php echo $value->ar ?></td>
	 		<td><?php echo $value->id ?></td>
	 		<td><?php echo $value->tr ?></td>
	 	</tr>
	 <?php } ?>
 </table>