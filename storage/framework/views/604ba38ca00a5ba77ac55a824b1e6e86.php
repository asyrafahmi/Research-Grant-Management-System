

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Academician</h1>
    <form action="<?php echo e(route('academicians.update', $academician->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($academician->name); ?>" required>
        </div>

        <div class="form-group">
            <label for="staff_number">Staff Number</label>
            <input type="text" class="form-control" id="staff_number" name="staff_number" value="<?php echo e($academician->staff_number); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($academician->email); ?>" required>
        </div>

        <div class="form-group">
            <label for="college">College</label>
            <input type="text" class="form-control" id="college" name="college" value="<?php echo e($academician->college); ?>" required>
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="<?php echo e($academician->department); ?>" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="<?php echo e($academician->position); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Academician</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/academicians/edit.blade.php ENDPATH**/ ?>