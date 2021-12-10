<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/css/table.css" type="text/css">
    
    <style>
        body {
            align-items: center;
            background-color: #7D63F7;
            display: relative;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <center>
    <table style="position: relative">
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>USERNAME</th>
			<th>PASWORD</th>
		</tr>
		<?php $no = 1;?>
		<?php foreach ($this->Bio_model->tampil_data('admin')->result() as $row): ?>
			<tr>
				<td><?php echo $no++?></td>
				<td><?php echo $row->nama?></td>
				<td><?php echo $row->username?></td>
				<td><?php echo $row->password?></td>
			</tr>
		<?php endforeach; ?>
	</table>
    </center>
    <br><br><br>
    <?php echo $status; ?>
    <br><code style="line-height: 28px; background-color: #CE63F7; font-size:16px;color: #ffffff;">
        <?php echo $log_error;?><br><br>
    </code>
    <?php echo anchor(base_url("login"), 'coba login lagi!');?>
<body>
</html>