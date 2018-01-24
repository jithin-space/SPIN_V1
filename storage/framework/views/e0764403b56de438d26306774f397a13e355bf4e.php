<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                <?php if(Entrust::hasRole('admin')): ?>
                  <li><a href='/admin/users'> Manage Users </a></li>
                  <li><a href='/admin/students'> Manage Students </a></li>
                <?php endif; ?>
                    <li><a href='/edit/profile'> Edit Profile </a></li>
                <?php if(Entrust::hasRole('teacher')): ?>
                    <li><a href='/teacher/mystudents'> MyStudents </a></li>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>