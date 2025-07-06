

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Research Grants</h1>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-all')): ?>
    <div class="mb-3">
        <a href="<?php echo e(route('research_grants.create')); ?>" class="btn btn-primary">Create New Research Grant</a>
    </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th>Project Leader</th>
                    <th>Grant Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $researchGrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($grant->project_title); ?></td>
                    <td><?php echo e($grant->projectLeader->name); ?></td>
                    <td>RM<?php echo e(number_format($grant->grant_amount, 2)); ?></td>
                    <td>
                        <a href="<?php echo e(route('research_grants.show', $grant)); ?>" class="btn btn-info btn-sm">View</a>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-all')): ?>
                        <a href="<?php echo e(route('research_grants.edit', $grant)); ?>" class="btn btn-primary btn-sm">Edit</a>
                        
                        <form action="<?php echo e(route('research_grants.destroy', $grant)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/research_grants/index.blade.php ENDPATH**/ ?>