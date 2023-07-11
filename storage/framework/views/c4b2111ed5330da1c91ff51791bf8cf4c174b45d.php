<?php if(Session::has('error')): ?>
<div class="alert alert-danger">
    <?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?><?php /**PATH F:\codeastro\Laravel\laravel-pos\resources\views/layouts/partials/alert/error.blade.php ENDPATH**/ ?>