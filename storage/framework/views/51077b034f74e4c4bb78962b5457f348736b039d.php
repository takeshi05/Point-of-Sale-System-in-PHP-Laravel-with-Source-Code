<?php $__env->startSection('title', 'Orders List'); ?>
<?php $__env->startSection('content-header', 'Order List'); ?>
<?php $__env->startSection('content-actions'); ?>
    <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-success">Open POS</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <!-- <div class="col-md-3"></div> -->
            <div class="col-md-12">
                <form action="<?php echo e(route('orders.index')); ?>">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>" />
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th>Remain.</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->getCustomerName()); ?></td>
                    <td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($order->formattedTotal()); ?></td>
                    <td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($order->formattedReceivedAmount()); ?></td>
                    <td>
                        <?php if($order->receivedAmount() == 0): ?>
                            <span class="badge badge-danger">Not Paid</span>
                        <?php elseif($order->receivedAmount() < $order->total()): ?>
                            <span class="badge badge-warning">Partial</span>
                        <?php elseif($order->receivedAmount() == $order->total()): ?>
                            <span class="badge badge-success">Paid</span>
                        <?php elseif($order->receivedAmount() > $order->total()): ?>
                            <span class="badge badge-info">Change</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($order->total() - $order->receivedAmount(), 2)); ?></td>
                    <td><?php echo e($order->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($total, 2)); ?></th>
                    <th><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($receivedAmount, 2)); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <?php echo e($orders->render()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\codeastro\Laravel\POS-Laravel\resources\views/orders/index.blade.php ENDPATH**/ ?>