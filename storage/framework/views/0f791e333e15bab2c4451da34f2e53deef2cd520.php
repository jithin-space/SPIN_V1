<?php $__env->startSection('page_heading', 'Edit Information'); ?>

<?php $__env->startSection('section'); ?>
  <?php echo form_start($form); ?>

    <?php echo form_row($form->school_name); ?>

    <?php echo form_row($form->school_type); ?>

    <?php echo form_row($form->status); ?>

    <?php echo form_row($form->Year_Of_Joining); ?>

    <?php echo form_row($form->Year_Of_Completion); ?>

    <?php echo form_row($form->Address); ?>

    <?php echo form_row($form->email); ?>

  <input type="hidden" name="_method" value="put" />
    <button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('update'); ?></button>
  <?php echo form_end($form); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>