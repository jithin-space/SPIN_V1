<?php echo form_start($form); ?>

  <input type="hidden" name="_method" value="put">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php echo form_row($form->name); ?>

<?php echo form_row($form->display_name); ?>

<?php echo form_row($form->description); ?>

  <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('edit'); ?></button>
  <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
<?php echo form_end($form, $renderRest = true); ?>

