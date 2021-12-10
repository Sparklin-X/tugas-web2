<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/form.css" type="text/css">
</head>
        <?php echo form_open('crud/ubah_data_Bio')?>
            <a class="close" href="<?php echo base_url('crud')?>">&times;</a> 
            <div class="title">EDIT</div>
            <div class="subtitle" style="<?php echo $nama == "" ? "color: red;" : null?>">NAMA PENGGUNA <?=$nama == "" ? "KOSONG" : "\"".strtoupper($nama)."\""; ?></div>
            <div class="input-container ic2">
                <input id="name" class="input" name="nama"type="text" placeholder=" " value="<?=$nama;?>"/>
                <div class="saparator"></div>
                <label for="name" class="placeholder"><?=$nama;?></label>
            </div>
           
            <div class="input-container ic2">
                <input id="tanggal_lahir" class="input" name="tanggal_lahir" type="date" placeholder=" " value="<?=$tanggal_lahir;?>" />
                <div class="saparator cut-short"></div>
                <label for="tanggal_lahir" class="placeholder"><?=$tanggal_lahir;?></label>
            </div>
            <div class="input-container ic2">
                <input id="umur" class="input" name="umur" type="text" placeholder=" " value="<?=$umur;?>" />
                <div class="saparator cut-short"></div>
                <label for="umur" class="placeholder"><?=$umur;?></label>
            </div>
            <button type="text" class="submit">submit<input name="id" type="hidden" value="<?=$id;?>"/></button>
</html>