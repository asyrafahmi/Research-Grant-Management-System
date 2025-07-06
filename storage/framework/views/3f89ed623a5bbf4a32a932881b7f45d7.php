

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Create Research Grant</h1>
    <form action="<?php echo e(route('research_grants.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="project_leader_id">Project Leader</label>
            <select name="project_leader_id" id="project_leader_id" class="form-control" required>
                <option value="">Select Project Leader</option>
                <?php $__currentLoopData = $academicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academician): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($academician->id); ?>"><?php echo e($academician->name); ?> - <?php echo e($academician->department); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="project_members">Project Members</label>
            <select name="project_members[]" id="project_members" class="form-control" multiple>
                <?php $__currentLoopData = $academicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academician): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($academician->id); ?>"><?php echo e($academician->name); ?> - <?php echo e($academician->department); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <small class="form-text text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple members</small>
        </div>

        <div class="form-group">
            <label for="project_title">Project Title</label>
            <input type="text" name="project_title" id="project_title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="grant_amount">Grant Amount (RM)</label>
            <input type="number" step="0.01" name="grant_amount" id="grant_amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="grant_provider">Grant Provider</label>
            <input type="text" name="grant_provider" id="grant_provider" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="duration_in_months">Duration (in months)</label>
            <input type="number" name="duration_in_months" id="duration_in_months" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Grant</button>
        <a href="<?php echo e(route('research_grants.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/research_grants/create.blade.php ENDPATH**/ ?>