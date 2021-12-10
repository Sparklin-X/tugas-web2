<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width"/>
        <title>UPLOAD FORM</title>
        <link rel="stylesheet" href="" type="text/css"/>
    </head>
    <body>
        <h1> Has successfully uploaded files</h1>
        <?php foreach ($upload_data as $item => $value):?>
            <li><?php echo $item;?>: <?php echo $value;?></li>
        <?php endforeach;?>
        <p> <?php echo anchor('uploaders#up', "Upload another file!");?></p>  
</html>