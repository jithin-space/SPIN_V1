<?php $__env->startSection('page_heading', 'Edit Information'); ?>

<?php $__env->startSection('section'); ?>
    <?php echo form_start($form); ?>

    <?php echo form_row($form->MedicationName); ?>

    <?php echo form_row($form->DoctorName); ?>

    <?php echo form_row($form->status); ?>

    <?php echo form_row($form->remarks); ?>

    <div class="form-group">
      <label for="Start_Date">Start Date</label>
                    <div class='input-group date' >
                        <input type='text' id='datetimepicker1' class="form-control" name="start_date" value="<?php echo e($data['start_date']); ?>" required/>
                        <span class="input-group-addon" id="btn1">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
    </div>
    <div class="form-group">
      <label for="End_Date">End Date</label>
                    <div class='input-group date' >
                        <input type='text' id='datetimepicker2' class="form-control" name="end_date" value="<?php echo e($data['start_date']); ?>" required/>
                        <span class="input-group-addon" id="btn2">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
    </div>
  <input type="hidden" name="_method" value="put" />
    <button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('update'); ?></button>
  <?php echo form_end($form); ?>


  <script>
  $(document).ready(function(){
    $.when(
        $.getScript('<?php echo e(URL::asset("js/jquery.js")); ?>'),
      $.getScript('<?php echo e(URL::asset("js/jquery-ui.js")); ?>'),
        $.Deferred(function( deferred ){
            $( deferred.resolve );
        })
    ).done(function(){


       $('#btn1').click(function(){
         $('#datetimepicker1').datepicker({
           dateFormat:'dd/mm/yy'
         }).focus();
       });


       $('#btn2').click(function(){
         $('#datetimepicker2').datepicker({
           dateFormat:'dd/mm/yy'
         }).focus();
       });

    });

  });

  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>