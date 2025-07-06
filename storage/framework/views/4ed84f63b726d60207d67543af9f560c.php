

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Milestone</h1>
    <form action="<?php echo e(route('milestones.update', $milestone->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="research_grant_id">Research Grant</label>
            <select name="research_grant_id" id="research_grant_id" class="form-control">
                <?php $__currentLoopData = $researchGrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($grant->id); ?>" <?php echo e($milestone->research_grant_id == $grant->id ? 'selected' : ''); ?>><?php echo e($grant->project_title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="milestone_name">Milestone Name</label>
            <input type="text" name="milestone_name" id="milestone_name" class="form-control" value="<?php echo e($milestone->milestone_name); ?>">
        </div>
        <div class="form-group">
            <label for="target_completion_date">Target Completion Date</label>
            <input type="date" name="target_completion_date" id="target_completion_date" class="form-control" value="<?php echo e($milestone->target_completion_date); ?>">
        </div>
        <div class="form-group">
            <label for="deliverable">Deliverable</label>
            <input type="text" name="deliverable" id="deliverable" class="form-control" value="<?php echo e($milestone->deliverable); ?>">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" <?php echo e($milestone->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="completed" <?php echo e($milestone->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="remark">Remark</label>
            <textarea name="remark" id="remark" class="form-control"><?php echo e($milestone->remark); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Milestone</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/milestones/edit.blade.php ENDPATH**/ ?>