

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Create Milestone</h1>
    <form action="<?php echo e(route('milestones.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="research_grant_id">Research Grant</label>
            <select name="research_grant_id" id="research_grant_id" class="form-control">
                <?php $__currentLoopData = $researchGrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($grant->id); ?>"><?php echo e($grant->project_title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="milestone_name">Milestone Name</label>
            <input type="text" name="milestone_name" id="milestone_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="target_completion_date">Target Completion Date</label>
            <input type="date" name="target_completion_date" id="target_completion_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="deliverable">Deliverable</label>
            <input type="text" name="deliverable" id="deliverable" class="form-control">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="remark">Remark</label>
            <textarea name="remark" id="remark" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date_updated">Date updated</label>
            <input type="date" name="date_updated" id="date_updated" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Milestone</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/milestones/create.blade.php ENDPATH**/ ?>