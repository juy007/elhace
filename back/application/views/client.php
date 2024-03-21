<table border="1">
  
    <?php
    foreach ($dat->data as $kontak){
    ?><tr>
              <td><?php echo $kontak->arti; ?></td>
              <td><?php echo $kontak->asma; ?></td>
              <td>
                <a href="<?php echo base_url() ?>client/get_buka/<?php echo $kontak->nomor; ?>">Buka</a>
              </td>
      </tr>
    <?php
    }
    ?>
</table>