
<!--  used for subrole creation-->
<div class="">
<?php echo form_start($form); ?>

<input type="hidden" name="_method" value="put" >
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php echo form_row($form->name); ?>

<?php echo form_row($form->description); ?>

  <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('update'); ?></button>
<?php echo form_end($form, $renderRest = true); ?>

</div>
<div><br/>
<form action="<?php echo e(route('roles.subrole.destroy', [\Auth::user()->roles()->first()->name,$rid,$sid])); ?>" method="post">
  <input type="hidden" name="_method" value="DELETE">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

  <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
</form>
</div>
