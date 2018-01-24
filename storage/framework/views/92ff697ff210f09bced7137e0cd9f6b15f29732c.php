<?php $__env->startSection('page_heading', 'Edit User'); ?>


<?php $__env->startSection('section'); ?>

<?php echo form_start($form); ?>

<input type="hidden" name="_method" value="put">
<?php echo form_row($form->name); ?>

<?php echo form_row($form->email); ?>

<?php echo form_row($form->Role); ?>

<?php echo form_row($form->change_passwd); ?>

<?php echo form_row($form->current_password); ?>

<?php echo form_row($form->new_password); ?>

  <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('save'); ?></button>
  <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
<?php echo form_end($form, $renderRest = true); ?>


<script>
$('#change_passwd').change(function() {
  if (this.checked) {
      $('#new_password').prop('disabled',false);
      $('#new_password_confirmation').prop('disabled',false);
      $('#current_password').prop('disabled',false);

    } else {
      $('#new_password').prop('disabled',true);
      $('#new_password_confirmation').prop('disabled',true);
      $('#current_password').prop('disabled',true);
    }
});

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('userform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>