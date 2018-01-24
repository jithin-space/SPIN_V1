<?php $__env->startSection('page_heading','My Profile'); ?>

<?php $__env->startSection('section'); ?>



<?php
$json=json_decode($user);
?>

<?php $__env->startSection('section'); ?>
<?php

if(!(isset($json->profile_info) && !empty($json->profile_info)) )
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading"><span class="glyphicon glyphicon-warning-sign">&nbsp;</span>No Information found</div>

                  <div class="panel-body">
                      <p>No Profile Information has been added to the User</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-success" href="<?php echo e(route('profile.create')); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  $data=$json->profile_info;
  \Debugbar::info(Carbon\Carbon::parse($user->created_at)->format('F j, Y'));
  ?>
  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-info">
          <div class="panel-heading">
              <h3 class="panel-title">Profile Information</h3>
          </div>
          <div class="panel-body">
            <div class="row">
                  <div class=" col-md-6 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr><td>Name</td><td><?php echo e(Auth::user()->name); ?></td></tr>
                        <tr><td>Email</td><td><?php echo e(Auth::user()->email); ?></td></tr>
                        <tr><td>Date Of Birth</td><td><?php echo e($data->date_of_birth); ?></td></tr>
                        <tr><td>Age</td><td>
                          <?php
                          $value = str_replace('/', '-', $data->date_of_birth);
                          $from = new DateTime(date("Y-m-d", strtotime($value)));
                          $to   = new DateTime();
                          $interval=$from->diff($to);
                          echo $interval->format("%Y ");
                           ?>
                        </td></tr>
                        <tr><td>Date Of Joining</td><td><?php echo e($data->date_of_joining); ?></td></tr>
                        <tr><td>Gender</td><td><?php echo e($data->gender); ?></td></tr>

                      </tbody>

                    </table>

                  </div>
                  <div class="col-md-6">

                          <div class="panel panel-default">
                            <div class="panel-heading">Address</div>
                            <div class="panel-body">
                              <address>
                                <strong><?php echo e($data->Address->Line1); ?></strong><br>
                                <?php echo e($data->Address->Line2); ?><br>
                                <?php echo e($data->Address->City); ?><br>
                                <?php echo e($data->Address->State); ?>,<?php echo e($data->Address->Country); ?><br>
                                <abbr title="Phone">Ph:</abbr> <?php echo e($data->Address->Land_Phone); ?><br/>
                                <abbr title="Mob">Mob:</abbr><?php echo e($data->Address->Mobile_Number); ?>

                              </address>
                            </div>
                          </div>

                  </div>
                </div>
          </div>
          <div class="panel-footer">
                 <a class="btn btn-labeled btn-success" href="<?php echo e(route('profile.edit',1)); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                 <span class="pull-right">
                   <form action="<?php echo e(route('profile.destroy',1)); ?>" method="post" class="delete">
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

<?php echo $__env->make('dashboard_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>