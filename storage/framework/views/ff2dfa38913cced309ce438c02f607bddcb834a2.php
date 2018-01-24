<?php $__env->startSection('body'); ?>

<div id="wrapper">

       <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">SPIN-IEP v1.0 | Laravel 5</a>
           </div>


           <ul class="nav navbar-top-links navbar-right">
             <?php if(0): ?>
             <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-messages">
                 <li> task 1 </li>
                 <li> task 1 </li>
                 <li> task 1 </li>

               </ul>
             </li>
             <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-tasks">
                 <li> task 1 </li>
                 <li> task 1 </li>
                 <li> task 1 </li>
               </ul>

             </li>
             <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-alerts">
                 <li> on progress </li>
                 <li> task 1 </li>
                 <li> task 1 </li>
               </ul>
             </li>
             <?php endif; ?>
             <li><a href="<?php echo e(url ('/home')); ?>"><i class="fa fa-home fa-fw"></i> <?php echo e(Auth::user()->name); ?></a></li>
             <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
               </a>
               <ul class="dropdown-menu dropdown-user">
                 <li class="dropdown">
                     <a href="#" >
                         <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                     </a>
                  </li>
                 <li><a href="<?php echo e(route('profile.show', Auth::user()->id)); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                 </li>
                 <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> -->
                 </li>
                 <li class="divider"></li>
                 <li>
                   <?php if(Auth::guest()): ?>
                       <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                       <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                   <?php else: ?>

                     <a href="<?php echo e(url('/logout')); ?>"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                         <i class="fa fa-sign-out fa-fw"></i>Logout
                     </a>

                     <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                         <?php echo e(csrf_field()); ?>

                     </form>
                    <?php endif; ?>
                 </li>
               </ul>

             </li>
           </ul>

           <!-- side bar -->
            <?php echo $__env->yieldContent('sidebar'); ?>
         </nav>

         <?php echo $__env->yieldContent('page'); ?>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>