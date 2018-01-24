<?php $__env->startSection('page_heading','Student Medication Info'); ?>
<?php
$json=json_decode($student);
?>

<?php $__env->startSection('section'); ?>
<?php
if(!(isset($json->medication_info) && !empty($json->medication_info)))
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No Medication Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.med_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php }
  else {
    $data=$json->medication_info;
    ?>

    <div class="container">
      <div class="row">

        <div class="container col-md-8 col-md-offset-2" >
          <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Medication Information</h3>
            </div>
            <div class="panel-body">
              <div class="models--actions pull-right">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.med_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
              </div>
              <table class="table table-striped">
                <tr>
                  <th>Name</th>
                  <th>Doctor</th>
                  <th>Start Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medinfo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                <td><a href="#" data-toggle="popover" title="Remarks" data-content="<?php echo e($medinfo->remarks); ?>"><?php echo e($medinfo->MedicationName); ?></a></td>
                <td><?php echo e($medinfo->DoctorName); ?></td>
                <td><?php echo e($medinfo->start_date); ?></td>
                <td><?php echo e($medinfo->status); ?></td>
                <td class="col-xs-4">
                  <form action="<?php echo e(route('students.med_info.destroy', [$student->_id,$loop->index])); ?>" method="post" class="delete">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <a class="btn btn-labeled btn-default" href="<?php echo e(route('students.med_info.edit',[$student->_id,$loop->index])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
                  </form>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
      </div>
      </div>


    </div>
    <script>
      $(document).ready(function(){
          $('[data-toggle="popover"]').popover();
      });
   </script>

  <?php

  }
  ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout1',['student',$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>