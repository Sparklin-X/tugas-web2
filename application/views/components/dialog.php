<head>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/dialog.css" type="text/css">
</head>
<body>
    <h2><?php echo $heads?></h2>
    <div class="message" id="snackbar">
        <p class="descript"><?php echo $desc == "" ? null : $desc?></p>
        <button class="accept" type="submit" onclick="window.location.href='<?php echo base_url('login'); ?>/logout'">Iya</button>
        
        <button type="submit" onclick="window.location.href='<?php echo base_url('crud'); ?>'">Tidak</button>
      
    </div>
</body>
</html>