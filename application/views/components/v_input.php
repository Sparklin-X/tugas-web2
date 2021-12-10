<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/form.css" type="text/css">
    <link rel="stylesheet" href="/css/popup.css" type="text/css">
    <link rel="stylesheet" href="/css/marquee.css" type="text/css">
    <link rel="stylesheet" href="/css/snackbar.css" type="text/css">
</head>
        <?php echo form_open('create#reg')?>
            <a class="close" href="<?php echo base_url('crud')?>">&times;</a> 
            <div class="subtitle">REGISTRATION</div>
            <?php echo $success;?>
            <script type="text/javascript">
            var s = document.getElementById("success");
            s.className = "show";
            setTimeout(function(){ s.className = s.className.replace("show", ""); }, 5000);
            </script>
            <!-- NAMA input -->
            <div class="input-container ic2">
                <input id="nama" class="input" name="nama" value="<?php echo validation_errors() != NULL && form_error('nama') == FALSE ? set_value('nama') : '';?>" type="text" placeholder=" " />
                <div class="saparator"></div>
                <label for="nama" class="placeholder">Nama</label>
            </div>
            <!-- ERROR status nama pengguna -->
            <div class="<?php echo form_error('nama') == TRUE ? 'status' : '';?>">
                <?php echo form_error('nama');?>
            </div>
            <!-- GENDER choosen -->
            <div class="radio-container ic2">
                <input id="option-1" class="input" name="jenis_kelamin" type="radio" value="laki-laki" <?php echo validation_errors() != NULL && form_error('jenis_kelamin') == FALSE ? set_radio("jenis_kelamin", "laki-laki") : '';?>/>
                <input id="option-2" class="input" name="jenis_kelamin" type="radio" value="perempuan"  <?php echo validation_errors() != NULL && form_error('jenis_kelamin') == FALSE ? set_radio("jenis_kelamin", "perempuan") : '';?>/>
                <label for="jenis_kelamin" class="placeholder">Gender</label>
            
                <label for="option-1" class="option option-1">
                    <div class="dot"></div>
                    <span>Pria</span>
                </label>
                <label for="option-2" class="option option-2">
                    <div class="dot"></div>
                    <span>Wanita</span>
                </label>
            </div>
            <div class="<?php echo form_error('jenis_kelamin') == TRUE ? 'status' : ''; ?>">
                <?php echo form_error('jenis_kelamin'); ?>
           </div>
            <!-- TANGGAL LAHIR input -->
            <div class="input-container ic2">
                <input id="tanggal_lahir" class="input" name="tanggal_lahir" value="<?php echo validation_errors() != NULL && form_error('tanggal_lahir') == FALSE ? set_value('tanggal_lahir') : ''; ?>" type="date" placeholder=" " />
                <div class="sparator cut-short"></div>
                <label for="tanggal_lahir" class="placeholder">Tanggal Lahir</label>
            </div>
            <!-- ERROR status tanggal lahir -->
           <div class="<?php echo form_error('tanggal_lahir') == TRUE ? 'status' : ''; ?>">
                <?php echo form_error('tanggal_lahir'); ?>
           </div>
           <!-- UMUR input -->
            <div class="input-container ic2">
                <input id="umur" class="input" name="umur" value="<?php echo validation_errors() != NULL && form_error('umur') == FALSE ? set_value('umur') : '';?>" type="text" placeholder=" " />
                <div class="cut-short"></div>
                <label for="umur" class="placeholder">Umur</label>
            </div>
            <!-- ERROR status umur  -->
            <div class="<?php echo form_error('umur') == TRUE ? 'status' : ''; ?>">
                <?php echo form_error('umur'); ?>
           </div>
            <button type="text" class="submit">submit</button>
</html>