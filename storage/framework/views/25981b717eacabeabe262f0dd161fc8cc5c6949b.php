<?php $__env->startSection('page_heading', 'Edit Background Info'); ?>

<?php $__env->startSection('section'); ?>
  <?php echo form_start($form); ?>

    <?php echo form_row($form->Info_Type); ?>

    <?php echo form_row($form->Description); ?>

  <input type="hidden" name="_method" value="put" />
    <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('update'); ?></button>
  <?php echo form_end($form); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>