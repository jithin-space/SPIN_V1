<?php $__env->startSection('page_heading','Other Services Info'); ?>
<?php
$json=json_decode($student);
?>


<?php $__env->startSection('section'); ?>

<?php

if(!(isset($json->other_services) && !empty($json->other_services)))
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No Services  Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.other_services.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  $data=$json->other_services;
  ?>

  <div class="container">
    <div class="row">

      <div class="container col-md-8 col-md-offset-2" >
        <div class="panel panel-info">
          <div class="panel-heading">
              <h3 class="panel-title">Other Services Information</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-3   pull-right ">
                 <a href="<?php echo e(route('students.other_services.create',$student->_id)); ?>" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span>Add New </a>

            </div>

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_service): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                       <?php
                       $result_explode = explode('|', $other_service->service_category); ?>
                      <div class="col-md-10 col-md-offset-1">

                           <br/><div class="panel panel-default">
                            <span class="label label-primary"><?php echo e($loop->index+1); ?></span>
                             <div class="panel-body">
                               <div class="row">
                                 <div class="col-md-6">
                                   <div class="panel panel-default">
                                     <div class="panel-heading">Service Description</div>
                                     <div class="panel-body">
                                       <?php echo e($other_service->description); ?>

                                     </div>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                     <table class="table table-user-information">
                                       <tbody>
                                         <tr><td>Type</td><td><?php echo e($other_service->service_type); ?></td><tr>
                                         <tr><td>Status</td><td><?php echo e($other_service->service_status); ?></td><tr>
                                         <tr><td>Start Date</td><td><?php echo e($other_service->start_date); ?></td><tr>
                                         <?php $__currentLoopData = $other_service->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <?php $link_explode = explode('/', $attachment); ?>
                                             <?php if($loop->first): ?>
                                                 <tr><td rowspan="<?php echo e($loop->count); ?>">Attachments</td><td><a href="<?php echo e($attachment); ?>"><?php echo e(end($link_explode)); ?></a></td></tr>
                                             <?php else: ?>
                                                   <tr><td><a href="<?php echo e($attachment); ?>"><?php echo e(end($link_explode)); ?></a></td></tr>
                                             <?php endif; ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       </tbody>
                                     </table>
                                   </div>
                             </div>
                           </div>
                             <div class="panel-footer">
                               <a  href=""><?php echo e($result_explode[1]); ?></a>
                               <span class="pull-right">
                                 <form action="<?php echo e(route('students.other_services.destroy', [$student->_id,$loop->index])); ?>" method="post" class="delete">
                                   <input type="hidden" name="_method" value="DELETE">
                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <a href="<?php echo e(route('students.other_services.edit',[$student->_id,$loop->index])); ?>"  data-toggle="tooltip" title="edit" type="button" class="btn btn-labeled btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
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

<?php echo $__env->make('student_layout1',['student',$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>