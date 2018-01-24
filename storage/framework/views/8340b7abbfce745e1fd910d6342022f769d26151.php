<?php $__env->startSection('sidebar'); ?>


<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search">
            <form id="live-search" action=" " class="styled" method="post">
              <fieldset>
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control text-input" placeholder="Search..." id="filter">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </fieldset>
        </form>

      </li>
      <li <?php echo e((Request::is('/home') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(url ('/home')); ?>"><i class="fa fa-home fa-fw"></i> Home</a>
      </li>
      <?php if(Entrust::hasRole('admin')): ?>
      <li <?php echo e((Request::is('*users') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(url ('/admin/users')); ?>"><i class="fa fa-users fa-fw"></i> Manage Users</a>
          <!-- /.nav-second-level -->
      </li>
      <li <?php echo e((Request::is('*roles') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(url ('/admin/roles')); ?>"><i class="fa fa-users fa-fw"></i> Manage Roles</a>
          <!-- /.nav-second-level -->
      </li>
      <li <?php echo e((Request::is('*permissions') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(url ('/admin/permissions')); ?>"><i class="fa fa-users fa-fw"></i> Manage Permissions</a>
          <!-- /.nav-second-level -->
      </li>
      <li <?php echo e((Request::is('*students') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(url ('/admin/students')); ?>"><i class="fa fa-graduation-cap fa-fw"></i> Manage Students</a>
      </li>
      <li><a href="<?php echo e(url('/admin/tags')); ?>"><i class="fa fa-book fa-fw"></i>Manage Vocabularies</a></li>
      <?php if(0): ?>
      <li><a href=""><i class="fa fa-wrench fa-fw"></i>Administration</a></li>
      <?php endif; ?>
       <?php endif; ?>

       <?php if(Entrust::hasRole('teacher')): ?>
           <li><a href="<?php echo e(route('students.index',\Auth::user()->roles()->first()->name)); ?>"><i class="fa fa-graduation-cap fa-fw"></i>MyStudents </a></li>
       <?php endif; ?>
      <li <?php echo e((Request::is('') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>"><i class="fa fa-user-md fa-fw"></i> My Profile</a>
      </li>


      <li><a href="<?php echo e(url ('/about')); ?>"><i class="fa fa-info fa-fw"></i>About Us</a></li>


    </ul>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>

<div id="page-wrapper">
   <div class="row">
     <div class="col-lg-12">
         <h1 class="page-header"><?php echo $__env->yieldContent('page_heading'); ?></h1>
     </div>
   </div>
   <div class="row">
     <nav class="search" style="display:none" id="search">
        <h1> Search Results...</h1>
         <ul>
             <li><a href="<?php echo e(url ('/admin/users')); ?>">manage user</a></li>
             <li><a href="#">create user</a></li>
             <li><a href="<?php echo e(url ('/admin/roles')); ?>">manage role</a></li>
             <li><a href="#">create role</a></li>
             <li><a href="<?php echo e(url ('/admin/permissions')); ?>">manage permission</a></li>
             <li><a href="#">create permission</a></li>
             <li><a href="<?php echo e(url ('/admin/students')); ?>">manage students</a></li>
             <li><a href="#">create students</a></li>
             <li><a href="<?php echo e(url('/admin/tags')); ?>">vocabularies</a></li>
             <li><a href="#">Add Terms</a></li>
             <li><a href="#">Edit Vocabulary</a></li>
             <li><a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>">profile</a></li>
             <li><a href="#">Edit Profile</a></li>
             <li><a href="<?php echo e(url ('/about')); ?>">about us</a></li>
             <li><a href="<?php echo e(url ('/home')); ?>">Home</a></li>
         </ul>
     </nav>
   </div>
   <div class="row" id="content1">
     <?php echo $__env->make('partials.notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->yieldContent('section'); ?>
   </div>

</div>

<script>

$(document).ready(function(){
    $("#filter").keyup(function(){
        var filter = $(this).val(), count = 0;

        $("nav.search ul li").each(function(){
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
            } else {
                $(this).show();
            }
        });

        $('#content1').html($(search).html());

    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>