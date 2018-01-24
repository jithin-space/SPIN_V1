<?php $__env->startSection('page_heading','Strength & Weakness Info'); ?>
<?php
$json=json_decode($student);
?>

<?php $__env->startSection('section'); ?>


<div class="container-fluid">
  <div class="row">
  <div class="models--actions pull-right">
      <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.strength_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
  </div>
</div>
  <br/>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">strength Information</h3>
        </div>
        <?php
        if(!(isset($json->strength_info) && !(empty($json->strength_info->strength))))
        { ?>

          <div class="panel-body">
              <p>No Strength Information has been added to the student.</p>
              <div class="models--actions">
                  <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.strength_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
              </div>
          </div>


        <?php }
        else {

          $da=$json->strength_info;
          if((isset($da->strength) && !empty($da->strength)))
          { ?>
            <!--  -->
            <div class="panel-body">
              <?php $__currentLoopData = $da->strength; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $strength): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                  <div class="panel panel-default">
                    <div class="panel-body">

                      <a href="#" data-toggle="popover" title="Remarks" data-content="<?php echo e($strength->remarks); ?>"><?php echo e($strength->description); ?></a>
                    </div>
                    <div class="panel-footer">
                      <a><?php echo e($strength->strength_type); ?></a>
                      <span class="pull-right">
                        <form action="<?php echo e(route('students.strength_info.destroy', [$student->_id,$loop->index.'.1'])); ?>" method="post">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <a href="<?php echo e(route('students.strength_info.edit',[$student->_id,$loop->index.'.1'])); ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                        </form>
                      </span>
                    </div>
                  </div>


              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </div>
<!--  -->
            <?php }
          } ?>

      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">weakness Information</h3>
        </div>
        <?php
        if(!(isset($json->strength_info) && !(empty($json->strength_info->weakness))))
        { ?>

          <div class="panel-body">
              <p>No Weakness Information has been added to the student.</p>
              <div class="models--actions">
                  <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.strength_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
              </div>
          </div>


        <?php }
        else {

          $da=$json->strength_info;
          if((isset($da->weakness) && !empty($da->weakness)))
          { ?>
            <!--  -->
            <div class="panel-body">
              <?php $__currentLoopData = $da->weakness; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $strength): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                  <div class="panel panel-default">
                    <div class="panel-body">

                      <a href="#" data-toggle="popover" title="Remarks" data-content="<?php echo e($strength->remarks); ?>"><?php echo e($strength->description); ?></a>
                    </div>
                    <div class="panel-footer">
                      <a><?php echo e($strength->weakness_type); ?></a>
                      <span class="pull-right">
                        <form action="<?php echo e(route('students.strength_info.destroy', [$student->_id,$loop->index.'.2'])); ?>" method="post">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <a href="<?php echo e(route('students.strength_info.edit',[$student->_id,$loop->index.'.2'])); ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                        </form>
                      </span>
                    </div>
                  </div>


              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </div>
<!--  -->
            <?php }
          } ?>

      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">special interests</h3>
        </div>
        <?php
        if(!(isset($json->strength_info) && !(empty($json->strength_info->special_interests))))
        { ?>

          <div class="panel-body">
              <p>No Special Interests has been added to the student.</p>
              <div class="models--actions">
                  <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.strength_info.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
              </div>

          </div>


        <?php }
        else {

          $da=$json->strength_info;
          if((isset($da->special_interests) && !empty($da->special_interests)))
          { ?>
            <!--  -->
            <div class="panel-body">
              <?php $__currentLoopData = $da->special_interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $strength): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                  <div class="panel panel-default">
                    <div class="panel-body">

                      <a href="#" data-toggle="popover" title="Remarks" data-content="<?php echo e($strength->remarks); ?>"><?php echo e($strength->description); ?></a>
                    </div>
                    <div class="panel-footer">
                      <a><?php echo e($strength->interest_type); ?></a>
                      <span class="pull-right">
                        <form action="<?php echo e(route('students.strength_info.destroy', [$student->_id,$loop->index.'.3'])); ?>" method="post">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <a href="<?php echo e(route('students.strength_info.edit',[$student->_id,$loop->index.'.3'])); ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                        </form>
                      </span>
                    </div>
                  </div>


              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </div>
        <!--  -->
            <?php }
          }
         ?>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout1',['student',$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>