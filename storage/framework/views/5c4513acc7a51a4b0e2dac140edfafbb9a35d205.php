<?php $__env->startSection('page_heading', 'Create User'); ?>

<?php $__env->startSection('section'); ?>

<?php echo form_start($form); ?>

<?php echo form_row($form->name); ?>

<?php echo form_row($form->email); ?>

<?php echo form_row($form->Role); ?>

<?php echo form_row($form->password); ?>


  <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('create'); ?></button>
  <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
<?php echo form_end($form, $renderRest = true); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('userform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>