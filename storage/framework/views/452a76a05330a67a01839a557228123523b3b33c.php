<?php $__env->startSection('content'); ?>
		<h1>Edit Data Pegawai</h1>
		<?php if(session('sukses')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo e(session('sukses')); ?>

		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-12">

			        <form action="/pegawai/<?php echo e($pegawai->id); ?>/update" method="POST">
		        		<?php echo e(csrf_field()); ?>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Depan</label>
					    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama depan" value="<?php echo e($pegawai->nama_depan); ?>">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama belakang" value="<?php echo e($pegawai->nama_belakang); ?>">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
					    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
					      <option value="L" <?php if($pegawai->jenis_kelamin == 'L'): ?> selected <?php endif; ?>>Laki-laki</option>
					      <option value="P" <?php if($pegawai->jenis_kelamin == 'P'): ?> selected <?php endif; ?>>Perempuan</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Agama</label>
					    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan agama" value="<?php echo e($pegawai->agama); ?>">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Alamat</label>
					    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo e($pegawai->alamat); ?></textarea>
					</div>
			        <button type="submit" class="btn btn-warning">Update</button>
			        </form>
			    	</div>
			      </div>
			  	</div>
				</div>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lat2crud\resources\views/pegawai/edit.blade.php ENDPATH**/ ?>