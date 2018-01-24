<?php
$data=reset($json->$link);
?>

<div class="container">
  <div class="row">
    <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
         <A href="edit.html" >Edit General Information</A><br/>
         <p class=" text-info">Last Updated:May 05,2014,03:00 pm </p>
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
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if(gettype($value)=='object'): ?>
                            <?php $mil=$value->milliseconds;
                            $seconds = $mil / 1000;
                           ?>
                            <tr>
                              <td><?php echo e($key); ?></td>
                              <td><?php echo date("d-m-Y", $seconds); ?></td>
                            </tr>

                          <?php else: ?>
                            <tr>
                              <td><?php echo e($key); ?></td>
                              <td><?php echo e($value); ?></td>
                            </tr>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                  </table>

                  <a href="#" class="btn btn-primary">Dummy</a>
                  <a href="#" class="btn btn-primary">Dummy</a>
                </div>
              </div>
        </div>
        <div class="panel-footer">
               <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
               <span class="pull-right">
                   <a href="" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                   <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
               </span>
        </div>
    </div>
  </div>
  </div>
</div>
