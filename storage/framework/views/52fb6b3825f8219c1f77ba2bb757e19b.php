

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Milestone Details</h1>
    <div class="card">
        <div class="card-header">
            <?php echo e($milestone->milestone_name); ?>

        </div>
        <div class="card-body">
            <p><strong>Research Grant:</strong> <?php echo e($milestone->researchGrant->project_title); ?></p>
            <p><strong>Target Completion Date:</strong> <?php echo e($milestone->target_completion_date); ?></p>
            <p><strong>Deliverable:</strong> <?php echo e($milestone->deliverable); ?></p>
            <p><strong>Status:</strong> <?php echo e($milestone->status); ?></p>
            <p><strong>Remark:</strong> <?php echo e($milestone->remark); ?></p>
            <p><strong>Date Updated:</strong> <?php echo e($milestone->updated_at ? $milestone->updated_at->format('Y-m-d') : 'N/A'); ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/milestones/show.blade.php ENDPATH**/ ?>