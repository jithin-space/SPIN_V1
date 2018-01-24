<?php $__env->startSection('page_heading','Student Background Info'); ?>
<?php
$json=json_decode($student);
?>
<?php $__env->startSection('section'); ?>
<?php
if(!(isset($json->background_info) && !empty($json->background_info)))
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No Background Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.background_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  $data=$json->background_info;
  ?>


<div class="container">
  <div class="row">

    <div class="container col-md-8 col-md-offset-2" >
      <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Background Information</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-5   pull-right ">
               <A href="<?php echo e(route('students.background_info.create',$student->_id)); ?>" >Add Background Information</A><br/>
               <p class=" text-info">Last Updated:<?php echo e(Carbon\Carbon::parse($student->updated_at)->format('F j, Y')); ?> </p>
          </div>

                <?php $__currentLoopData = $json->background_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                     <?php
                     $result_explode = explode('|', $data->Info_Type); ?>
                     <div class="col-md-8 col-md-offset-2">

                        <div class="panel panel-default">
                          <span class="label label-primary"><?php echo e($loop->index+1); ?></span>
                           <div class="panel-body">
                             <p><?php echo e($data->Description); ?></p>
                           </div>
                           <div class="panel-footer">
                             <a  href=""><?php echo e($result_explode[1]); ?></a>
                             <span class="pull-right">
                               <form action="<?php echo e(route('students.background_info.destroy', [$student->_id,$loop->index])); ?>" method="post" class="delete">
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                 <a href="<?php echo e(route('students.background_info.edit', [$student->_id,$loop->index])); ?>"  data-toggle="tooltip" title="edit" type="button" class="btn btn-labeled btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                 <button type="submit" data-toggle="tooltip" title="delete" class="btn btn-labeled btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                </form>
                             </span>
                           </div>
                         </div>
                       </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



          </div>
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