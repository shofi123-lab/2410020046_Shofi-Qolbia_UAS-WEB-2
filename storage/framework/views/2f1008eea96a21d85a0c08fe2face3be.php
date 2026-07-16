<?php $__env->startSection('title', 'Tambah Jadwal - Yoga From Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Jadwal Yoga</h3>
                    <p class="text-muted mb-0">Atur hari dan jam latihan untuk kelas yoga yang sudah dibuat.</p>
                </div>
                <a href="<?php echo e(route('schedules.index')); ?>" class="btn btn-outline-gradient">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <?php if($classes->isEmpty()): ?>
                <div class="card card-custom border-0 p-4 text-center mb-4">
                    <div class="py-3">
                        <i class="fa-solid fa-circle-exclamation text-warning mb-3 animate__animated animate__pulse animate__infinite" style="font-size: 3rem;"></i>
                        <h5 class="fw-bold">Belum Ada Kelas Yoga Terdaftar</h5>
                        <p class="text-muted">Anda harus membuat kelas yoga terlebih dahulu sebelum dapat menambahkan jadwal latihan.</p>
                        <a href="<?php echo e(route('yoga-classes.create')); ?>" class="btn btn-gradient-primary mt-2">
                            <i class="fa-solid fa-plus me-1"></i> Buat Kelas Yoga Sekarang
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Form Card -->
                <div class="card card-custom border-0 p-4">
                    <form action="<?php echo e(route('schedules.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Kelas Yoga -->
                        <div class="mb-3">
                            <label for="yoga_class_id" class="form-label form-label-custom">Kelas Yoga</label>
                            <select name="yoga_class_id" id="yoga_class_id" class="form-select form-control-custom <?php $__errorArgs = ['yoga_class_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="" disabled selected>Pilih Kelas Yoga...</option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>" <?php echo e(old('yoga_class_id') == $class->id ? 'selected' : ''); ?>>
                                        <?php echo e($class->nama_kelas); ?> (Level: <?php echo e($class->level); ?> | Instruktur: <?php echo e($class->instructor->nama ?? 'Tidak Ada'); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['yoga_class_id'];
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
                            <!-- Hari -->
                            <div class="col-md-6 mb-3">
                                <label for="hari" class="form-label form-label-custom">Hari</label>
                                <select name="hari" id="hari" class="form-select form-control-custom <?php $__errorArgs = ['hari'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="" disabled selected>Pilih Hari...</option>
                                    <option value="Senin" <?php echo e(old('hari') == 'Senin' ? 'selected' : ''); ?>>Senin</option>
                                    <option value="Selasa" <?php echo e(old('hari') == 'Selasa' ? 'selected' : ''); ?>>Selasa</option>
                                    <option value="Rabu" <?php echo e(old('hari') == 'Rabu' ? 'selected' : ''); ?>>Rabu</option>
                                    <option value="Kamis" <?php echo e(old('hari') == 'Kamis' ? 'selected' : ''); ?>>Kamis</option>
                                    <option value="Jumat" <?php echo e(old('hari') == 'Jumat' ? 'selected' : ''); ?>>Jumat</option>
                                    <option value="Sabtu" <?php echo e(old('hari') == 'Sabtu' ? 'selected' : ''); ?>>Sabtu</option>
                                    <option value="Minggu" <?php echo e(old('hari') == 'Minggu' ? 'selected' : ''); ?>>Minggu</option>
                                </select>
                                <?php $__errorArgs = ['hari'];
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

                            <!-- Jam -->
                            <div class="col-md-6 mb-3">
                                <label for="jam" class="form-label form-label-custom">Jam Mulai</label>
                                <input type="time" name="jam" id="jam" class="form-control form-control-custom <?php $__errorArgs = ['jam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('jam')); ?>" required>
                                <?php $__errorArgs = ['jam'];
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
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="form-label form-label-custom">Status Jadwal</label>
                            <select name="status" id="status" class="form-select form-control-custom <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="Aktif" <?php echo e(old('status') == 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                                <option value="Nonaktif" <?php echo e(old('status') == 'Nonaktif' ? 'selected' : ''); ?>>Nonaktif</option>
                            </select>
                            <?php $__errorArgs = ['status'];
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
                                <i class="fa-solid fa-save me-1"></i> Simpan Jadwal
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SOLIT\Documents\2410020046_Shofi Qolbia_UAS_WEB_2\resources\views/schedules/create.blade.php ENDPATH**/ ?>