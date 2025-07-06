

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Academician Details</h1>
    <div class="card">
        <div class="card-header">
            <?php echo e($academician->name); ?>

        </div>
        <div class="card-body">
            <p><strong>Staff Number:</strong> <?php echo e($academician->staff_number); ?></p>
            <p><strong>Email:</strong> <?php echo e($academician->email); ?></p>
            <p><strong>College:</strong> <?php echo e($academician->college); ?></p>
            <p><strong>Department:</strong> <?php echo e($academician->department); ?></p>
            <p><strong>Position:</strong> <?php echo e($academician->position); ?></p>
            <h3>Research Grants Led</h3>
            <ul>
                <?php $__currentLoopData = $researchGrantsLed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($grant->project_title); ?> (RM<?php echo e(number_format($grant->grant_amount, 2)); ?>)</li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/academicians/show.blade.php ENDPATH**/ ?>