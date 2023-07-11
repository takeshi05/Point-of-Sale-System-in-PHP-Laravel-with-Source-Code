<?php if(Session::has('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('error')); ?>

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?><?php /**PATH F:\codeastro\Laravel\POS-Laravel\resources\views/layouts/partials/alert/error.blade.php ENDPATH**/ ?>