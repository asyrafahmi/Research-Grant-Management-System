

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Research Grant Details</h1>
    <div class="card mb-4">
        <div class="card-header">
            <?php echo e($researchGrant->project_title); ?>

        </div>
        <div class="card-body">
            <p><strong>Project Leader:</strong> <?php echo e($researchGrant->projectLeader->name); ?></p>
            <p><strong>Grant Amount:</strong> RM<?php echo e(number_format($researchGrant->grant_amount, 2)); ?></p>
            <p><strong>Grant Provider:</strong> <?php echo e($researchGrant->grant_provider); ?></p>
            <p><strong>Start Date:</strong> <?php echo e($researchGrant->start_date); ?></p>
            <p><strong>Duration (Months):</strong> <?php echo e($researchGrant->duration_in_months); ?></p>
        </div>
    </div>

    <!-- Project Members Section -->
    <div class="card mb-4">
        <div class="card-header">
            Project Members
        </div>
        <div class="card-body">
            <!-- Current Members List -->
            <h5>Current Members</h5>
            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $researchGrant->projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($member->name); ?></td>
                            <td><?php echo e($member->department); ?></td>
                            <td>
                                <form action="<?php echo e(route('research_grants.remove_member', [$researchGrant, $member])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Add New Member Form -->
            <h5>Add New Member</h5>
            <form action="<?php echo e(route('research_grants.add_member', $researchGrant)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <select name="academician_id" class="form-control" required>
                        <option value="">Select Academician</option>
                        <?php $__currentLoopData = $academicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academician): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($academician->id); ?>">
                            <?php echo e($academician->name); ?> - <?php echo e($academician->department); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add Member</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\mysql\data\rgms3\resources\views/research_grants/show.blade.php ENDPATH**/ ?>