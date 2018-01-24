<?php
$result = array();
$goal_tag=array();
$lto_tag=array();
foreach($json->$link as $data)
{
  $ga=$data->goal_area;
  $lts = $data->long_term_objective;
  if(isset($result[$ga]))
  {
    if(isset($result[$ga][$lts]))
    {
      $result[$ga][$lts][]=$data;
    }
    else{
      $result[$ga][$lts]=array($data);
      $lto_tag[$ga][$lts]=$data->lto_description;
    }
  }
  else {
    $result[$ga][$lts]=array($data);
    $goal_tag[$ga]=$data->goal_area_description;
    $lto_tag[$ga][$lts]=$data->lto_description;
  }

}

?>
<div class="panel-group" id="accordion">
  <div class="models--actions">
      <a class="goal btn btn-labeled btn-success" href="<?php echo e(route('students.iep.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New IEP'); ?></a>
  </div>
  <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ga=>$lts): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo e($ga); ?>"><?php echo e($loop->index+1); ?>.Goal Area:<?php echo e($goal_tag[$ga]); ?></a>
        </h4>
      </div>
      <div id="<?php echo e($ga); ?>" class="panel-collapse collapse in">
        <div class="panel-body">
          <?php $__currentLoopData = $lts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lto=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="panel panel-success">
                <div class="panel-heading">Long Term Objective</div>
                <div class="panel-body">
                  <p><?php echo e($lto_tag[$ga][$lto]); ?></p>
                </div>
                <table class="table table-striped" style="border-collapse:none">
                  <tr>
                    <th>ID</th>
                    <th>IEP</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>

                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iep): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                          <td><?php echo e($loop->index+1); ?></td>
                          <td><a href=""><?php echo e($iep->description); ?></a></th>
                          <td><?php echo e($iep->status); ?></td>
                          <td class="col-xs-3">

                            <form action="<?php echo e(route('students.iep.destroy',[$student->_id,$iep->_id->oid])); ?>" method="post">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                              <a class="btn btn-labeled btn-default" href="<?php echo e(route('students.iep.edit',[$student->_id,$iep->_id->oid])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                              <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
                            </form>
                          </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
      </div>

   </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
