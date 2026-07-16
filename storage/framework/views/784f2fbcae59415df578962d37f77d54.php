<?php $__env->startSection('title', 'Daftar Jadwal Yoga - Yoga From Home'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-calendar-days text-primary me-2"></i>Jadwal Yoga</h3>
            <p class="text-muted mb-0">Kelola jadwal latihan yoga harian untuk kelas Anda.</p>
        </div>
        <a href="<?php echo e(route('schedules.create')); ?>" class="btn btn-gradient-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Jadwal
        </a>
    </div>

    <!-- Search & Filter Card -->
    <div class="card card-custom border-0 p-3 mb-4">
        <form action="<?php echo e(route('schedules.index')); ?>" method="GET" class="row g-3">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 rounded-start-3" style="border-color: rgba(124, 58, 237, 0.15);"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control form-control-custom rounded-start-0" placeholder="Cari berdasarkan nama kelas, hari, jam, status..." value="<?php echo e($search); ?>">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-gradient w-100 py-2">Cari</button>
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="card card-custom border-0 p-4">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead>
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Kelas</th>
                        <th>Instruktur</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th width="200" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sched): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($schedules->firstItem() + $key); ?></td>
                            <td>
                                <span class="fw-bold"><?php echo e($sched->yogaClass->nama_kelas ?? 'Tidak Ada Kelas'); ?></span>
                            </td>
                            <td>
                                <small class="text-muted"><i class="fa-solid fa-user-tie me-1"></i> <?php echo e($sched->yogaClass->instructor->nama ?? 'Tidak Ada'); ?></small>
                            </td>
                            <td><strong><?php echo e($sched->hari); ?></strong></td>
                            <td>
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-3"><i class="fa-regular fa-clock me-1 text-primary"></i> <?php echo e($sched->jam); ?></span>
                            </td>
                            <td>
                                <?php if($sched->status == 'Aktif'): ?>
                                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-3"><i class="fa-solid fa-circle-check me-1"></i> Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-3"><i class="fa-solid fa-circle-minus me-1"></i> Nonaktif</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="<?php echo e(route('schedules.edit', $sched->id)); ?>" class="btn btn-sm btn-light border text-primary rounded-3 px-3 py-2" title="Edit Jadwal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-light border text-danger rounded-3 px-3 py-2" title="Hapus Jadwal" onclick="deleteSchedule('<?php echo e($sched->id); ?>', '<?php echo e($sched->yogaClass->nama_kelas ?? ''); ?>', '<?php echo e($sched->hari); ?>')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <form action="<?php echo e(route('schedules.destroy', $sched->id)); ?>" method="POST" id="delete-form-<?php echo e($sched->id); ?>" class="d-none">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-calendar-xmark d-block mb-3" style="font-size: 3rem; color: #cbd5e1;"></i>
                                Tidak ada jadwal yoga ditemukan.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <small class="text-muted">Menampilkan <?php echo e($schedules->firstItem() ?? 0); ?> sampai <?php echo e($schedules->lastItem() ?? 0); ?> dari <?php echo e($schedules->total()); ?> data</small>
            </div>
            <div>
                <?php echo e($schedules->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function deleteSchedule(id, className, day) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Jadwal kelas "${className}" pada hari ${day} akan dihapus permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#cbd5e1',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            background: '#ffffff',
            color: '#1e1b4b',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SOLIT\Documents\2410020046_Shofi Qolbia_UAS_WEB_2\resources\views/schedules/index.blade.php ENDPATH**/ ?>