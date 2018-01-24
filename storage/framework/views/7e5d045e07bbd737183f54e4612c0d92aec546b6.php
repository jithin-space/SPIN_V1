<?php $__env->startSection('page_heading', 'Edit Profile Information'); ?>

<?php $__env->startSection('section'); ?>

<?php echo form_start($form); ?>

<input type="hidden" name="_method" value="put">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php echo form_row($form->Name); ?>

<?php echo form_row($form->email); ?>

<div class="form-group">
  <label for="Date_Of_Birth">Date Of Birth</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="date_of_birth" value="<?php echo e($user->profile_info['date_of_birth']); ?>" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
</div>

<?php $sex=$user->profile_info['gender']; ?>
<div class="form-group">
  <label for="Gender">Gender</label><br/>
  <label class="radio-inline">  <input type="radio" name="gender" value="male" <?php echo ($sex=='male')?'checked':'' ?>> Male</label>
  <label class="radio-inline">  <input type="radio" name="gender" value="female" <?php echo ($sex=='female')?'checked':'' ?> >Female</label>
  <label class="radio-inline">  <input type="radio" name="gender" value="other" <?php echo ($sex=='other')?'checked':'' ?>>Other </label>
</div>

<div class="form-group">
  <label for="Date_Of_Joining">Date Of Joining</label>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="date_of_joining" value="<?php echo e($user->profile_info['date_of_joining']); ?>" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
</div>

<?php echo form_row($form->Address); ?>



  <button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('create'); ?></button>
  <a class="btn btn-labeled btn-default" href="<?php echo e(URL::previous()); ?>"><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
<?php echo form_end($form, $renderRest = true); ?>


<script src="<?php echo e(URL::asset('js/bootstrap.js')); ?>"></script>
<script>

$.when(
  $.getScript( '<?php echo e(URL::asset("js/jquery.min.js")); ?>' ),
  $.getScript('<?php echo e(URL::asset("js/moment.js")); ?>'),
  $.getScript( '<?php echo e(URL::asset("js/bootstrap.min.js")); ?>' ),
  $.getScript( '<?php echo e(URL::asset("js/datetimepicker.js")); ?>'),
    $.getScript( '<?php echo e(URL::asset("js/summernote.js")); ?>' ),

    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){
   $('#summernote').summernote();
   $('#datetimepicker1').datetimepicker({
                 format: 'DD/MM/YYYY'
           });
   $('#datetimepicker2').datetimepicker({
            format: 'DD/MM/YYYY'
   });
});

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('userform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>