<?php $__env->startSection('title', 'Edit Instruktur - Yoga From Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-pen-to-square text-primary me-2"></i>Edit Instruktur</h3>
                    <p class="text-muted mb-0">Ubah data instruktur "<?php echo e($instructor->nama); ?>".</p>
                </div>
                <a href="<?php echo e(route('instructors.index')); ?>" class="btn btn-outline-gradient">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Form Card -->
            <div class="card card-custom border-0 p-4">
                <form action="<?php echo e(route('instructors.update', $instructor->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label form-label-custom">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-custom <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contoh: Budi Santoso" value="<?php echo e(old('nama', $instructor->nama)); ?>" required>
                        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-3">
                        <label class="form-label form-label-custom d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline mt-1">
                            <input class="form-check-input <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="jenis_kelamin" id="jk_l" value="Laki-laki" <?php echo e(old('jenis_kelamin', $instructor->jenis_kelamin) == 'Laki-laki' ? 'checked' : ''); ?> required>
                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="jenis_kelamin" id="jk_p" value="Perempuan" <?php echo e(old('jenis_kelamin', $instructor->jenis_kelamin) == 'Perempuan' ? 'checked' : ''); ?> required>
                            <label class="form-check-label" for="jk_p">Perempuan</label>
                        </div>
                        <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger mt-1" style="font-size: 0.875em;"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Pengalaman -->
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label form-label-custom">Pengalaman Kerja (Tahun)</label>
                        <div class="input-group">
                            <input type="number" name="pengalaman" id="pengalaman" class="form-control form-control-custom <?php $__errorArgs = ['pengalaman'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contoh: 5" value="<?php echo e(old('pengalaman', $instructor->pengalaman)); ?>" min="0" required>
                            <span class="input-group-text bg-white border-start-0 rounded-end-3" style="border-color: rgba(124, 58, 237, 0.15);">Tahun</span>
                        </div>
                        <?php $__errorArgs = ['pengalaman'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger mt-1" style="font-size: 0.875em;"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Nomor HP -->
                    <div class="mb-4">
                        <label for="nomor_hp" class="form-label form-label-custom">Nomor HP / WhatsApp</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control form-control-custom <?php $__errorArgs = ['nomor_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contoh: 081234567890" value="<?php echo e(old('nomor_hp', $instructor->nomor_hp)); ?>" required>
                        <?php $__errorArgs = ['nomor_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-gradient-primary py-2 px-4">
                            <i class="fa-solid fa-save me-1"></i> Perbarui Data
                        </button>
                        <a href="<?php echo e(route('instructors.index')); ?>" class="btn btn-light border py-2 px-4">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SOLIT\Documents\2410020046_Shofi Qolbia_UAS_WEB_2\resources\views/instructors/edit.blade.php ENDPATH**/ ?>