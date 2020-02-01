<?php $__env->startSection('content'); ?>
		<?php if(session('sukses')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo e(session('sukses')); ?>

		</div>
		
		<?php endif; ?>
		<br>
		<br>
		<div class="row">
			<div class="col-6">
				<h1>Data Pegawai</h1>
			</div>

				<div class="col-6">
					<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Tambah Data
					</button>
				</div>
		
		<table class="table table-hover table-striped">
	<tr style="text-align: center;">
		<th>NAMA DEPAN</th>
		<th>NAMA BELAKANG</th>
		<th>JENIS KELAMIN</th>
		<th>AGAMA</th>
		<th>ALAMAT</th>
		<th>AKSI</th>
	</tr>
	<?php $__currentLoopData = $data_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr style="text-align: center;">
		<td><?php echo e($pegawai->nama_depan); ?></td>
		<td><?php echo e($pegawai->nama_belakang); ?></td>
		<td><?php echo e($pegawai->jenis_kelamin); ?></td>
		<td><?php echo e($pegawai->agama); ?></td>
		<td><?php echo e($pegawai->alamat); ?></td>
		<td>
			<a href="/pegawai/<?php echo e($pegawai->id); ?>/edit" class="btn btn-warning btn-sm">Edit</a>
			<a href="/pegawai/<?php echo e($pegawai->id); ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data ini ingin dihapus ?')">Hapus</a>
			<a href="/pegawai/<?php echo e($pegawai->id); ?>/detail" class="btn btn-info btn-sm">Detail</a>
		</td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
			        <form action="/pegawai/create" method="POST">
		        		<?php echo e(csrf_field()); ?>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Depan</label>
					    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama depan">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama belakang">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
					    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
					      <option value="L">Laki-laki</option>
					      <option value="P">Perempuan</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Agama</label>
					    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan agama">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Alamat</label>
					    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					

					</div>
			      	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-info">Submit</button>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lat2crud\resources\views/pegawai/index.blade.php ENDPATH**/ ?>