

<?php $__env->startSection('content'); ?>
<h1 class="text-center display-4" style="color: #d4af37;">Our Fleet</h1>
<p class="text-center mb-5" style="color: #9e9e9e;">Experience the ultimate drive with our premium selection of vehicles.</p>

<div class="row">
    <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white border-0 shadow-lg">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Vehicle Image">
                <div class="card-body">
                    <h5 class="card-title text-uppercase font-weight-bold"><?php echo e($vehicle->make); ?> <?php echo e($vehicle->model); ?></h5>
                    <p class="card-text">
                        Year: <?php echo e($vehicle->year); ?> <br>
                        Rental Price: <span style="color: #d4af37;">₱<?php echo e(number_format($vehicle->rental_price, 2)); ?></span>/day
                    </p>
                    <a href="<?php echo e(route('vehicles.show', $vehicle->id)); ?>" class="btn btn-main btn-block">View Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    <?php echo e($vehicles->links('pagination::bootstrap-4')); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\driveHive\resources\views/vehicles/index.blade.php ENDPATH**/ ?>