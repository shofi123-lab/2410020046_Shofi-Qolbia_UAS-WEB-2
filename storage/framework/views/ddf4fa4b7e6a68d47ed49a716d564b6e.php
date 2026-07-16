<?php $__env->startSection('title', 'Tambah Kelas - Yoga From Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Kelas Yoga</h3>
                    <p class="text-muted mb-0">Isi data di bawah untuk membuat kelas yoga baru.</p>
                </div>
                <a href="<?php echo e(route('yoga-classes.index')); ?>" class="btn btn-outline-gradient">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <?php if($instructors->isEmpty()): ?>
                <div class="card card-custom border-0 p-4 text-center mb-4">
                    <div class="py-3">
                        <i class="fa-solid fa-circle-exclamation text-warning mb-3 animate__animated animate__pulse animate__infinite" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold">Belum Ada Instruktur Terdaftar</h5>
                        <p class="text-muted">Anda harus menambahkan data instruktur terlebih dahulu sebelum dapat membuat kelas yoga baru.</p>
                        <a href="<?php echo e(route('instructors.create')); ?>" class="btn btn-gradient-primary mt-2">
                            <i class="fa-solid fa-user-plus me-1"></i> Tambah Instruktur Sekarang
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Form Card -->
                <div class="card card-custom border-0 p-4">
                    <form action="<?php echo e(route('yoga-classes.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Nama Kelas -->
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label form-label-custom">Nama Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control form-control-custom <?php $__errorArgs = ['nama_kelas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contoh: Morning Vinyasa Flow" value="<?php echo e(old('nama_kelas')); ?>" required>
                            <?php $__errorArgs = ['nama_kelas'];
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

                        <div class="row">
                            <!-- Level -->
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label form-label-custom">Level Kelas</label>
                                <select name="level" id="level" class="form-select form-control-custom <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="" disabled selected>Pilih Level...</option>
                                    <option value="Beginner" <?php echo e(old('level') == 'Beginner' ? 'selected' : ''); ?>>Beginner</option>
                                    <option value="Intermediate" <?php echo e(old('level') == 'Intermediate' ? 'selected' : ''); ?>>Intermediate</option>
                                    <option value="Advanced" <?php echo e(old('level') == 'Advanced' ? 'selected' : ''); ?>>Advanced</option>
                                </select>
                                <?php $__errorArgs = ['level'];
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

                            <!-- Durasi -->
                            <div class="col-md-6 mb-3">
                                <label for="durasi" class="form-label form-label-custom">Durasi Latihan (Menit)</label>
                                <div class="input-group">
                                    <input type="number" name="durasi" id="durasi" class="form-control form-control-custom <?php $__errorArgs = ['durasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contoh: 60" value="<?php echo e(old('durasi')); ?>" min="1" required>
                                    <span class="input-group-text bg-white border-start-0 rounded-end-3" style="border-color: rgba(124, 58, 237, 0.15);">Menit</span>
                                </div>
                                <?php $__errorArgs = ['durasi'];
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
                        </div>

                        <!-- Instruktur -->
                        <div class="mb-3">
                            <label for="instructor_id" class="form-label form-label-custom">Instruktur Pengajar</label>
                            <select name="instructor_id" id="instructor_id" class="form-select form-control-custom <?php $__errorArgs = ['instructor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="" disabled selected>Pilih Instruktur...</option>
                                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($inst->id); ?>" <?php echo e(old('instructor_id') == $inst->id ? 'selected' : ''); ?>><?php echo e($inst->nama); ?> (<?php echo e($inst->jenis_kelamin); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['instructor_id'];
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

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label form-label-custom">Deskripsi Kelas</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control form-control-custom <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan deskripsi mengenai materi, persiapan, atau tujuan dari kelas yoga ini..."><?php echo e(old('deskripsi')); ?></textarea>
                            <?php $__errorArgs = ['deskripsi'];
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

                        <!-- Submit -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-gradient-primary py-2 px-4">
                                <i class="fa-solid fa-save me-1"></i> Simpan Kelas
                            </button>
                            <button type="reset" class="btn btn-light border py-2 px-4">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SOLIT\Documents\2410020046_Shofi Qolbia_UAS_WEB_2\resources\views/yoga_classes/create.blade.php ENDPATH**/ ?>