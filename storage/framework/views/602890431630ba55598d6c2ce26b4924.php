<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Yoga From Home'); ?></title>
    <meta name="description" content="Aplikasi Yoga From Home - Sehat & Bugar dari Rumah">
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom CSS Styling -->
    <style>
        :root {
            --primary-pastel: #7c3aed; /* Pastel violet/purple */
            --primary-light: #ece9fc;
            --secondary-pastel: #0284c7; /* Pastel blue/sky */
            --secondary-light: #e0f2fe;
            --bg-gradient-start: #f5f3ff;
            --bg-gradient-end: #ecfeff;
            --text-dark: #1e1b4b;
            --card-shadow: 0 10px 30px -5px rgba(124, 58, 237, 0.08);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
            min-height: 100vh;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Premium Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.5);
        }
        ::-webkit-scrollbar-thumb {
            background: #c7d2fe;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-pastel);
        }

        /* Glassmorphism Navigation */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            transition: var(--transition-smooth);
        }

        /* Sidebar Styling */
        .sidebar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-right: 1px solid rgba(124, 58, 237, 0.08);
            min-height: calc(100vh - 70px);
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.01);
        }

        .sidebar .nav-link {
            color: #64748b;
            font-weight: 500;
            padding: 0.8rem 1.2rem;
            border-radius: 12px;
            margin: 0.2rem 0.8rem;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link:hover {
            color: var(--primary-pastel);
            background: var(--primary-light);
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, var(--primary-pastel) 0%, var(--secondary-pastel) 100%);
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.25);
        }

        /* Premium Buttons */
        .btn-gradient-primary {
            background: linear-gradient(135deg, var(--primary-pastel) 0%, var(--secondary-pastel) 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.2);
            transition: var(--transition-smooth);
        }

        .btn-gradient-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.3);
            color: #ffffff;
            opacity: 0.95;
        }

        .btn-outline-gradient {
            background: transparent;
            color: var(--primary-pastel);
            border: 2px solid var(--primary-pastel);
            border-radius: 12px;
            padding: 0.5rem 1.3rem;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .btn-outline-gradient:hover {
            background: linear-gradient(135deg, var(--primary-pastel) 0%, var(--secondary-pastel) 100%);
            color: #ffffff;
            border-color: transparent;
            transform: translateY(-2px);
        }

        /* Premium Card */
        .card-custom {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: var(--transition-smooth);
        }

        .card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px -5px rgba(124, 58, 237, 0.12);
        }

        /* Tables */
        .table-custom {
            border-radius: 16px;
            overflow: hidden;
            border: none;
        }

        .table-custom thead {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary-light) 100%);
        }

        .table-custom th {
            color: var(--text-dark);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .table-custom td {
            vertical-align: middle;
            border-bottom: 1px solid rgba(124, 58, 237, 0.05);
            padding: 1rem;
        }

        /* Badges */
        .badge-beginner {
            background-color: #dcfce7;
            color: #15803d;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.4em 0.8em;
        }
        .badge-intermediate {
            background-color: #fef9c3;
            color: #a16207;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.4em 0.8em;
        }
        .badge-advanced {
            background-color: #fee2e2;
            color: #b91c1c;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.4em 0.8em;
        }

        /* Form Inputs */
        .form-control-custom {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 1.5px solid rgba(124, 58, 237, 0.15);
            background: rgba(255, 255, 255, 0.9);
            transition: var(--transition-smooth);
        }

        .form-control-custom:focus {
            border-color: var(--primary-pastel);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.15);
            background: #ffffff;
            outline: none;
        }

        .form-label-custom {
            font-weight: 600;
            font-size: 0.9rem;
            color: #4b5563;
            margin-bottom: 0.5rem;
        }

        /* Micro-interactions */
        .hover-lift {
            transition: var(--transition-smooth);
        }
        .hover-lift:hover {
            transform: translateY(-3px);
        }

        .alert-custom {
            border-radius: 12px;
            border: none;
        }
    </style>
</head>
<body>

    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-gradient" href="<?php echo e(route('dashboard')); ?>" style="font-size: 1.4rem;">
                <span style="background: linear-gradient(135deg, var(--primary-pastel), var(--secondary-pastel)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <i class="fa-solid fa-spa me-1"></i> Yoga From Home
                </span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold px-3 py-2 rounded-3 bg-light border d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user text-primary" style="font-size: 1.2rem;"></i> <?php echo e(Auth::user()->name); ?>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2" style="border-radius: 16px;">
                                <li>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST" id="logoutForm">
                                        <?php echo csrf_field(); ?>
                                        <button type="button" onclick="confirmLogout()" class="dropdown-item py-2 px-3 text-danger d-flex align-items-center gap-2" style="border-radius: 0 0 16px 16px;">
                                            <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark px-3 me-2" href="<?php echo e(route('login')); ?>">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-gradient-primary" href="<?php echo e(route('register')); ?>">Daftar Sekarang</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container-fluid">
        <div class="row">
            <?php if(auth()->guard()->check()): ?>
                <!-- Sidebar (for authenticated users) -->
                <div class="col-md-3 col-lg-2 px-0 sidebar d-none d-md-block sticky-top" style="top: 86px; z-index: 100; height: calc(100vh - 86px);">
                    <div class="pt-4 d-flex flex-column h-100 justify-content-between pb-4">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item mb-2">
                                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(Route::is('dashboard') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="<?php echo e(route('instructors.index')); ?>" class="nav-link <?php echo e(Request::is('instructors*') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-user-tie"></i> Instruktur
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="<?php echo e(route('yoga-classes.index')); ?>" class="nav-link <?php echo e(Request::is('yoga-classes*') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-circle-play"></i> Kelas Yoga
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="<?php echo e(route('schedules.index')); ?>" class="nav-link <?php echo e(Request::is('schedules*') ? 'active' : ''); ?>">
                                    <i class="fa-solid fa-calendar-days"></i> Jadwal Yoga
                                </a>
                            </li>
                        </ul>
                        
                        <div class="px-4">
                            <hr class="text-muted">
                            <div class="text-xs text-muted text-center">
                                UAS Web 2 &bull; &copy; 2410020046
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content Area with sidebar spacing -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    <!-- Mobile Navigation Quick Links (Visible on Mobile only) -->
                    <div class="d-md-none mb-3 card card-custom p-3">
                        <div class="d-flex justify-content-around text-center">
                            <a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none <?php echo e(Route::is('dashboard') ? 'text-primary fw-bold' : 'text-secondary'); ?>">
                                <i class="fa-solid fa-chart-pie d-block mb-1"></i> <small>Dashboard</small>
                            </a>
                            <a href="<?php echo e(route('instructors.index')); ?>" class="text-decoration-none <?php echo e(Request::is('instructors*') ? 'text-primary fw-bold' : 'text-secondary'); ?>">
                                <i class="fa-solid fa-user-tie d-block mb-1"></i> <small>Instruktur</small>
                            </a>
                            <a href="<?php echo e(route('yoga-classes.index')); ?>" class="text-decoration-none <?php echo e(Request::is('yoga-classes*') ? 'text-primary fw-bold' : 'text-secondary'); ?>">
                                <i class="fa-solid fa-circle-play d-block mb-1"></i> <small>Kelas</small>
                            </a>
                            <a href="<?php echo e(route('schedules.index')); ?>" class="text-decoration-none <?php echo e(Request::is('schedules*') ? 'text-primary fw-bold' : 'text-secondary'); ?>">
                                <i class="fa-solid fa-calendar-days d-block mb-1"></i> <small>Jadwal</small>
                            </a>
                        </div>
                    </div>

                    <?php echo $__env->yieldContent('content'); ?>
                </main>
            <?php else: ?>
                <!-- Main Content Area (unauthenticated) -->
                <main class="col-12 px-md-4 py-4">
                    <?php echo $__env->yieldContent('content'); ?>
                </main>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

    <!-- SweetAlert Session Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if(session('success')): ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "<?php echo e(session('success')); ?>",
                    icon: 'success',
                    background: '#ffffff',
                    color: '#1e1b4b',
                    confirmButtonColor: '#7c3aed',
                    iconColor: '#7c3aed',
                    timer: 3500,
                    showClass: {
                        popup: 'animate__animated animate__fadeInUp animate__faster'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutDown animate__faster'
                    }
                });
            <?php endif; ?>

            <?php if(session('error')): ?>
                Swal.fire({
                    title: 'Error!',
                    text: "<?php echo e(session('error')); ?>",
                    icon: 'error',
                    background: '#ffffff',
                    color: '#1e1b4b',
                    confirmButtonColor: '#7c3aed',
                    timer: 3500
                });
            <?php endif; ?>
        });

        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Keluar',
                text: 'Apakah Anda yakin ingin keluar dari aplikasi?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#7c3aed',
                cancelButtonColor: '#cbd5e1',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                color: '#1e1b4b',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }
    </script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\SOLIT\Documents\2410020046_Shofi Qolbia_UAS_WEB_2\resources\views/layouts/app.blade.php ENDPATH**/ ?>