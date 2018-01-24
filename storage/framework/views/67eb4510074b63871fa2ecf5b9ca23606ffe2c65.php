<?php

if(!(isset($json->general_info) && !empty($json->general_info)) )
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">No Information found</div>

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
  echo "helloooooo";
  $data=$json->general_info;
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
                            <?php if($key == 'date_of_birth'): ?>
                              <?php
                              $value = str_replace('/', '-', $value);
                              $from = new DateTime(date("Y-m-d", strtotime($value)));
                              $to   = new DateTime();
                              $interval=$from->diff($to);;
                              echo "<tr><td>Age</td><td>";
                              echo $interval->format("%Y Years, %M Months and %d Days");;
                              echo"</td></tr>";

                               ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                    <?php $__currentLoopData = $student->disabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <a href="#" class="btn btn-primary"><?php echo e($dis->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
                </div>
          </div>
          <div class="panel-footer">
                 <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                 <span class="pull-right">
                   <form action="<?php echo e(route('students.general_info.destroy', [$student->_id,1])); ?>" method="post">
                     <input type="hidden" name="_method" value="DELETE" />
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                     <a href="<?php echo e(route('students.general_info.edit',[$student->_id,1])); ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                     <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
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
