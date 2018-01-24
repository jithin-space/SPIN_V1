<?php $__env->startSection('page_heading', 'Edit Information'); ?>

<?php $__env->startSection('section'); ?>
  <?php echo form_start($form); ?>

    <?php echo form_row($form->name); ?>

    <?php if($a[1]=='1'){ ?>
    <?php echo form_row($form->strength_type); ?>

  <?php } elseif($a[1]=='2'){ ?>
    <?php echo form_row($form->weakness_type); ?>

  <?php }elseif($a[1]=='3'){ ?>
    <?php echo form_row($form->interest_type); ?>

    <?php } ?>
    <?php echo form_row($form->description); ?>

    <?php echo form_row($form->remarks); ?>

  <input type="hidden" name="_method" value="put" />
    <button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('update'); ?></button>
  <?php echo form_end($form); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>