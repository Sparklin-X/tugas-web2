<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script  src="/js/Chart.js"></script>
	<title>DATABASE</title>
	<link rel="stylesheet" href="/css/style.css" type="text/css">
	<link rel="stylesheet" href="/css/table.css" type="text/css">
	<link rel="stylesheet" href="/css/popup.css" type="text/css">
	<link rel="stylesheet" href="/css/dropup.css" type="text/css">
</head>
<body>
	<div id="container">
		<div class="heading">
			<div class="left-pages"><a class="home" href="<?php echo base_url();?>crud">DATA DIRI</a></div>
			<div class="right-pages">
				<a href="<?php echo base_url('');?>uploaders#up"><i class="fa fa-upload"> Upload </i></a>
				<a href="<?php echo base_url('');?>export"><i class="fa fa-table"> Excel</i></a>
				<a href="<?php echo base_url('');?>cetak_pdf_file" target="_blank"><i class="fa fa-file"> PDF </i></a>
				<a href="<?php echo base_url('');?>lte" target="_blank"><i class="fa fa-archive"> LTE </i></a>
				<a href="/harviacode" target="_blank"><i class="fa fa-database"> Generate</i></a>
			</div>

			<a id="logout" href="<?php echo base_url('crud/logout_session');?>#out">
					<i class="fa fa-sign-out" aria-hidden="true"></i>
				</a>
		</div >
		<div id="body">
			<center>
				<table>
					<tr>
						<th>NO</th>
						<th>NAMA</th>
						<th>JENIS KELAMIN</th>
						<th>TANGGAL LAHIR</th>
						<th>UMUR</th>
						<th></th>
					</tr>
					<?php $this->Bio_model->tampil_data('bio')->result() ? $this->load->view('components/table') : $this->load->view('components/null_content')?>
				</table>
				<a id="add" href="<?php echo base_url('create');?>#reg"><i class="fa fa-user-plus"></i></a>	
			</center>
			<div class="footer">
				<p class="left">Status connected : <strong><?php echo $this->session->userdata('nama'); ?></strong></p>
				<p class="right"> Source on : <a href="https://github.com/Sparklin-X/tugas-web2.git" target="_blank" style="text-decoration: none;">Gitub <i class="fa fa-github" style="font-size: 15px; color: #000;">&nbsp;&nbsp;&nbsp;&nbsp;</i></a><?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version : <strong>' . CI_VERSION . '</strong>' : '' ?></p>
			</div>
		</div>
		<div id="<?php echo $get_ref; ?>" class="overlay">
			<div class="popup">
			<?php $popups == "" ? "" : $this->load->view($popups, $user);?>
			</div>
		</div>
	</div>
	<?php $datafl ? $datafl : "";?>
	<script type="text/javascript"">
		var ctx = document.getElementById('chart').getContext('2d');
			var chart = new Chart(ctx, {
				// The type of chart we want to create
				type: 'bar',
				// The data for our dataset
				data: {
					labels: [<?php 
									if($graph>0) {
										foreach ($graph as $get) {
											echo "'$get->jenis_kelamin'".", ";     
										}
									}
						?>],
					datasets: [{
						label:'Data berdasarkan jenis kelamin',
						backgroundColor: ['rgba(56, 86, 255, 0.87)', 'rgba(255, 99, 132, 0.7)'],
						borderColor: ['rgba(56, 86, 255, 0.87)'],
						data: [<?php 
							if($graph > 0) {
								foreach ($graph as $get) {
									echo "'$get->total'".", ";
								}
							}
						?>]
					}]
				},
				// Configuration options go here
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
		setTimeout(() => {
			document.getElementById('close').checked = true;
		}, 5000);
		</script>
</body>
</html>