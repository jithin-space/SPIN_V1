<?php $__env->startSection('page_heading','Student School Info'); ?>
<?php
$json=json_decode($student);
?>
<?php $__env->startSection('section'); ?>

<?php

if(!(isset($json->school_info) && !empty($json->school_info)))
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No School Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.school_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  $data=$json->school_info;
  ?>

<!--  -->
<div class="container">
  <div class="row">


    <div class="container col-md-8 col-md-offset-2" >
      <div class="model--actions pull-right">
          <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.school_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New'); ?></a>
      </div>
    </div>
    <div class="container col-md-8 col-md-offset-2" >

      <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">School Information</h3>
        </div>


        <div class="panel-body">

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="panel panel-default">
                          <span class="label label-primary"><?php echo e($loop->index+1); ?></span>
                           <div class="panel-body">
                             <div class="row">

                                   <div class=" col-md-6">

                                     <table class="table table-user-information">
                                       <tbody>
                                         <tr><td>School Name</td><td><?php echo e($school->school_name); ?></td><tr>
                                         <tr><td>School Type</td><td><?php echo e($school->school_type); ?></td><tr>
                                         <tr><td>Year Of Joining</td><td><?php echo e($school->Year_Of_Joining); ?></td><tr>
                                         <tr><td>Year Of Completion</td><td><?php echo e($school->Year_Of_Completion); ?></td><tr>
                                         <tr><td>Status</td><td><?php echo e($school->status); ?></td><tr>
                                         <tr><td>Email</td><td><?php echo e($school->email); ?></td><tr>
                                       </tbody>
                                     </table>

                                   </div>
                                   <div class="col-md-6">
                                         <div class="panel panel-default">
                                           <div class="panel-heading">School Address</div>
                                           <div class="panel-body">
                                             <address>
                                               <strong><?php echo e($school->Address->Line1); ?></strong><br>
                                               <?php echo e($school->Address->Line2); ?><br>
                                               <?php echo e($school->Address->City); ?><br>
                                               <?php echo e($school->Address->State); ?>,<?php echo e($school->Address->Country); ?><br>
                                               <abbr title="Phone">Ph:</abbr> <?php echo e($school->Address->Land_Phone); ?><br/>
                                               <abbr title="Mob">Mob:</abbr><?php echo e($school->Address->Mobile_Number); ?>

                                             </address>
                                           </div>
                                         </div>
                                   </div>
                                 </div>
                           </div>
                           <div class="panel-footer">
                             <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.school_info.edit',[$student->_id,$loop->index])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                             <span class="pull-right">
                               <form action="<?php echo e(route('students.school_info.destroy', [$student->_id,$loop->index])); ?>" method="post" class="delete">
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