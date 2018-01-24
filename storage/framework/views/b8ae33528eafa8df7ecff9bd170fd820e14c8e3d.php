<?php $__env->startSection('page_heading','Student Guardian Info'); ?>
<?php
$json=json_decode($student);
?>
<?php $__env->startSection('section'); ?>

<?php

if(!(isset($json->guardian_info) && !empty($json->guardian_info)))
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No Guardian Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.guardian_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  $data=$json->guardian_info;
  ?>

<!--  -->
<div class="container">
  <div class="row">


    <div class="container col-md-8 col-md-offset-2" >
      <div class="model--actions pull-right">
          <a class="btn btn-labeled btn-primary" href="<?php echo e(route('students.guardian_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New'); ?></a>
      </div>
    </div>
    <div class="container col-md-8 col-md-offset-2" >

      <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Guardian Information</h3>
        </div>


        <div class="panel-body">

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guardian): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="panel panel-default">
                           <div class="panel-body">
                             <div class="row">

                                   <div class=" col-md-6">

                                           <table class="table table-user-information">

                                               <tr><td>Name</td><td><?php echo e($guardian->first_name); ?> &nbsp;<?php echo e($guardian->last_name); ?></td><tr>
                                               <tr><td>Occupation</td><td><?php echo e($guardian->occupation); ?></td><tr>
                                               <tr><td>Relationship</td><td><?php echo e($guardian->relationship); ?></td><tr>
                                               <tr><td>Status</td><td><?php echo e($guardian->status); ?></td><tr>
                                               <tr><td>Email</td><td><?php echo e($guardian->email); ?></td><tr>

                                           </table>

                                   </div>
                                   <div class="col-md-6">
                                         <div class="panel panel-default">
                                           <div class="panel-heading">Address</div>
                                           <div class="panel-body">
                                             <address>
                                               <strong><?php echo e($guardian->Address->Line1); ?></strong><br>
                                               <?php echo e($guardian->Address->Line2); ?><br>
                                               <?php echo e($guardian->Address->City); ?><br>
                                               <?php echo e($guardian->Address->State); ?>,<?php echo e($guardian->Address->Country); ?><br>
                                               <abbr title="Phone">Ph:</abbr> <?php echo e($guardian->Address->Land_Phone); ?><br/>
                                               <abbr title="Mob">Mob:</abbr><?php echo e($guardian->Address->Mobile_Number); ?>

                                             </address>
                                           </div>
                                         </div>
                                   </div>
                                 </div>
                           </div>
                           <div class="panel-footer">
                             <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.guardian_info.edit',[$student->_id,$loop->index])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                             <span class="pull-right">
                               <form action="<?php echo e(route('students.guardian_info.destroy', [$student->_id,$loop->index])); ?>" method="post" class="delete">
                                 <input type="hidden" name="_method" value="DELETE" />
                                 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                 <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
                                </form>
                             </span>
                           </div>
                         </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </div>
        </div>

    </div>
  </div>
  </div>


</div>

<!--  -->
<?php

}
?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout1',['student',$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>