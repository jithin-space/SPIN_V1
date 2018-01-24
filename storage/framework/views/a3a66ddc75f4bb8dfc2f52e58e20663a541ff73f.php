<?php $__env->startSection('page_heading', 'Add Feedback'); ?>

<?php $__env->startSection('section'); ?>

<?php echo form_start($form); ?>

  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php echo form_row($form->student_id); ?>

<?php echo form_row($form->created_by); ?>

<?php echo form_row($form->feedback_type); ?>

<?php echo form_row($form->content); ?>


  <button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add'); ?></button>
  <a class="btn btn-labeled btn-default" href="<?php echo e(URL::previous()); ?>"><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
<?php echo form_end($form, $renderRest = true); ?>

<script src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
<script>
$(document).ready(function() {
$.when(
  $.getScript('<?php echo e(URL::asset("js/moment.js")); ?>'),
  $.getScript( '<?php echo e(URL::asset("js/bootstrap.min.js")); ?>' ),
  $.getScript( '<?php echo e(URL::asset("js/datetimepicker.js")); ?>'),
    $.getScript( '<?php echo e(URL::asset("js/summernote.js")); ?>' ),

    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){
   $('#summernote').summernote();
   $('#datetimepicker1').datetimepicker();
});
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>