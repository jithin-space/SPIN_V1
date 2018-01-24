<?php $__env->startSection('page_heading','Home'); ?>

<?php $__env->startSection('section'); ?>


<div class="col-sm-12">
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-graduation-cap fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo e(\App\Student::count()); ?></div>
                    <div>Students!</div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(route('students.index',\Auth::user()->roles()->first()->name)); ?>">
            <div class="panel-footer">
                <span class="pull-left">View All</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo e(\App\User::count()); ?></div>
                    <div>SPIN Users</div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(route('users.index',\Auth::user()->roles()->first()->name)); ?>">
            <div class="panel-footer">
                <span class="pull-left">View All</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo e(\App\Role::count()); ?></div>
                    <div>User Roles!</div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(route('roles.index',\Auth::user()->roles()->first()->name)); ?>">
            <div class="panel-footer">
                <span class="pull-left">View All</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-support fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo e(\App\Permission::count()); ?></div>
                    <div>Role Permissions!</div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(route('permissions.index',\Auth::user()->roles()->first()->name)); ?>">
            <div class="panel-footer">
                <span class="pull-left">View All</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
      </div>
    </div>

  </div>
  <div class="row">
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>