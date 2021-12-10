<?php $no = 1;?>
<?php foreach ($this->Bio_model->tampil_data('bio')->result() as $row): ?>	
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $row->nama?></td>
		<td><?php echo $row->jenis_kelamin?></td>
		<td><?php echo $row->tanggal_lahir?></td>
		<td><?php echo $row->umur?></td>
		<td>
			<a class="move" href="<?php echo base_url('ubah?id=').str_replace('=','',$this->encrypt->encode($row->id));?>#ch"><i class="fa fa-edit"></i></a>
			<a class="remove" href="<?php echo base_url('crud/hapus?id=').$row->id;?>" onclick="return confirm('Are you sure you want to remove this?')"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php endforeach; ?>