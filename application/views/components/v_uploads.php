<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/form.css" type="text/css">
</head>

<?php echo form_open_multipart('crud/do_upload#up')?>
    <a class="close" href="<?php echo base_url('crud')?>">&times;</a> 
    <div class="title">UPLOADS</div>
    <br />
    <div style="font-size:16px; color: red; font-weight: 500;"><?php echo $error;?></div>
    <br/>
    <input id="userfile" style="font-size: 15px;" class="input" name="userfile" type="file" placeholder=" "/>
    <button type="text" class="submit">upload</button>
</html>