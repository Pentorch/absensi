<div class="panel panel-default">
<div class="panel-heading">
	
</div>
<div class="table-responsive table-bordered">
<table class="table">
<thead>
<tr>
<th>No</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>---Absen---</th>
<th>Keterangan</th>
</tr>
</thead>
<tbody>
	<?php if(count($records)):?>
		<?php $i=1; foreach ($records as $key ) :?>
<tr>
<td><?php echo $i++ ?></td>
<td><?php echo $key->nama;?></td>
<td><?php echo $key->kelas;?></td>
<td><?php echo $key->jurusan;?></td>
<td><select class="form-control">
				<option value="Alfa">Alfa</option>
                  <option value="Hadir">Hadir</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Izin">Izin</option>
                  <option value="Terlambat">Terlambat</option>
             </select></td>
</tr>
</tbody>
</table>
</div>
<?php endforeach;?>
<?php else:?>
  <td>Tidak Ada Data</td>
<?php endif;?>