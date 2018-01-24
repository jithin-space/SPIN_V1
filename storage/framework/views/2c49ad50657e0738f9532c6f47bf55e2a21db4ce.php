<?php $__env->startSection('page_heading', 'Edit Information'); ?>

<?php $__env->startSection('section'); ?>
    <?php echo form_start($form); ?>

    <?php echo form_row($form->service_category); ?>

    <?php echo form_row($form->service_type); ?>

    <?php echo form_row($form->service_status); ?>

    <?php echo form_row($form->description); ?>

    <label>Uploads</label><br/>
    <?php $__currentLoopData = $data['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <?php $link_explode = explode('/', $attachment); ?>
      <?php echo e(end($link_explode)); ?>&nbsp;<a href="<?php echo e(route('students.other_services.show', [$sid,$bid.'.'.$loop->index])); ?>" class="remover" data-sid="<?php echo e($sid); ?>" data-id="<?php echo e($bid); ?>.<?php echo e($loop->index); ?>">remove</a><br/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <input type="file" class="filestyle" name="attachments[]" multiple />
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
    <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('create'); ?></button>
  <?php echo form_end($form,$renderRest = false); ?>


  <script src="<?php echo e(URL::asset('js/bootstrap.js')); ?>"></script>
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