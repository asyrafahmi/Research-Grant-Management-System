<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Research Grant Management System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">RGMS</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Research Grant Management System</h1>
                <p class="lead mb-4">Streamline your research grant management process</p>
                
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/welcome.blade.php ENDPATH**/ ?>