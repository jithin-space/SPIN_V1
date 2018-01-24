<?php $__env->startSection('page'); ?>
<div id="page-wrapper">
   <div class="row">
     <div class="col-lg-12">
         <h1 class="page-header"><?php echo $__env->yieldContent('page_heading'); ?></h1>
     </div>
   </div>
   <div class="row">
     <?php echo $__env->yieldContent('section'); ?>
   </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>