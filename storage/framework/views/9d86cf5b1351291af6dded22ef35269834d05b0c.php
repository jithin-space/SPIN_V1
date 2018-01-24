<?php $__env->startSection('page_heading','Student General Info'); ?>
<?php $__env->startSection('section'); ?>
<?php
$json=json_decode($student);
?>

<?php $__env->startSection('section'); ?>
<?php

if(!(isset($json->general_info) && !empty($json->general_info)) )
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No General Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-primary" href="<?php echo e(route('students.general_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  $data=$json->general_info;
  \Debugbar::info(Carbon\Carbon::parse($student->created_at)->format('F j, Y'));
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="<?php echo e(route('students.general_info.edit',[$student->_id,1])); ?>" >Edit General Information</A><br/>
           <p class=" text-info">Last Updated:<?php echo e(Carbon\Carbon::parse($student->updated_at)->format('F j, Y')); ?></p>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-info">
          <div class="panel-heading">
              <h3 class="panel-title">General Information</h3>
          </div>
          <div class="panel-body">
            <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo e($student->firstMedia('profile')->getUrl()); ?>" class="img-circle img-responsive"> </div>

                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr><td>Name</td><td><?php echo e($student->fname); ?> &nbsp; <?php echo e($student->lname); ?></td></tr>
                        <tr><td>Date Of Birth</td><td><?php echo e($data->date_of_birth); ?></td></tr>
                        <tr><td>Age</td><td>
                          <?php
                          $value = str_replace('/', '-', $data->date_of_birth);
                          $from = new DateTime(date("Y-m-d", strtotime($value)));
                          $to   = new DateTime();
                          $interval=$from->diff($to);
                          echo $interval->format("%Y Years, %M Months and %d Days");
                           ?>
                        </td></tr>
                        <tr><td>Date Of Joining</td><td><?php echo e($data->date_of_joining); ?></td></tr>
                        <tr><td>Gender</td><td><?php echo e($data->gender); ?></td></tr>
                        <tr><td>Disablity Tags:</td><td>
                          <?php $__currentLoopData = $student->disabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <a href="#" class="btn btn-default"><?php echo e($dis->name); ?></a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </td>
                      </tbody>

                    </table>

                  </div>
                </div>
          </div>
          <div class="panel-footer">
                 <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.general_info.edit',[$student->_id,1])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                 <span class="pull-right">
                   <form action="<?php echo e(route('students.general_info.destroy', [$student->_id,1])); ?>" method="post" class="delete">
                     <input type="hidden" name="_method" value="DELETE" />
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                     <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
                    </form>
                 </span>
          </div>
      </div>
    </div>
    </div>
  </div>

<?php

}
?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout1',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>