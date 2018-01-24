<?php $__env->startSection('sidebar'); ?>


<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">

    <ul class="nav" id="side-menu">
      <div class="profile-sidebar">
              <!-- SIDEBAR USERPIC -->
              <div class="profile-userpic">
                <br/><img src="<?php echo e($student->firstMedia('profile')->getUrl()); ?>" class="img-responsive" alt="">
              </div>

              <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                  <?php echo e($student->fname); ?> <?php echo e($student->lname); ?>

                </div>
              </div>

              <div class="profile-userbuttons">
                <a class="btn btn-labeled btn-success btn-sm" href="<?php echo e(route('students.feedback.create',[\Auth::user()->roles()->first()->name,$student->_id])); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Feedback'); ?></a>
                <!-- <a class="attendance btn btn-labeled btn-danger btn-sm" data-toggle="modal" href="#myModal1" ><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Attendance'); ?></a> -->
                <a class="btn btn-labeled btn-danger btn-sm" href="<?php echo e(route('students.attendance.index',[\Auth::user()->roles()->first()->name,$student->_id])); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Attendance'); ?></a>
              </div>
        </div>

      <br/><li></li>
      <li <?php echo e((Request::is('/home') ? 'class="active"' : '')); ?>>
          <a href="<?php echo e(url ('/home')); ?>"><i class="fa fa-home fa-fw"></i> Home</a>
      </li>
      <li>
          <a href="<?php echo e(route('students.show', [\Auth::user()->roles()->first()->name,$student->_id])); ?>"><i class="fa fa-dashboard fa-fw"></i><?php echo e($student->fname); ?>'s Dashboard</a>
      </li>
      <li><a href="<?php echo e(route('students.iep.index',[\Auth::user()->roles()->first()->name,$student->_id])); ?>"><i class="fa fa-info fa-fw"></i>IEP</a></li>
      <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fa fa-graduation-cap fa-fw"></i>Student Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level sub-menu collapse" id="service">
                  <li><a  href="<?php echo e(route('students.general_info.index',$student->_id)); ?>"> General Information </a></li>
                  <li><a  href="<?php echo e(route('students.background_info.index',$student->_id)); ?>"> Background Information </a></li>
                  <li><a  href="<?php echo e(route('students.guardian_info.index',$student->_id)); ?>"> Guardian Information </a></li>
                  <li><a  href="<?php echo e(route('students.med_info.index',$student->_id)); ?>"> Medication Information </a></li>
                  <li><a  href="<?php echo e(route('students.school_info.index',$student->_id)); ?>"> School Information </a></li>
                </ul>

      </li>



      <li><a  href="<?php echo e(route('students.feedback.index',[\Auth::user()->roles()->first()->name,$student->_id])); ?>"><i class="fa fa-comment fa-fw"></i> Feedbacks </a></li>
       <li><a  href="<?php echo e(route('students.status_report.index',$student->_id)); ?>"><i class="fa fa-file fa-fw"></i> Status Report </a></li>
        <li><a  href="<?php echo e(route('students.strength_info.index',$student->_id)); ?>"><i class="fa fa-life-saver fa-fw"></i> Strength & Needs </a></li>
        <li><a  href="<?php echo e(route('students.other_services.index',$student->_id)); ?>"><i class="fa fa-exchange fa-fw"></i> Other Services </a></li>
        <?php if(0): ?>
        <li><a  href="<?php echo e(route('students.media_gallery.index',$student->_id)); ?>"><i class="fa fa-file-image-o fa-fw"></i> Media Gallery </a></li>
        <?php endif; ?>


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
     <?php echo $__env->make('partials.notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->yieldContent('section'); ?>
   </div>


</div>


<!--for Attendance Modal  -->
<div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mark Attendance</h4>
        </div>
        <div class="modal-body" id="out1">
          <h4> You Do Not Have the Permission For this Action </h4>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
<!-- endof Attendance Modal -->

<script>
$(document).on("click", ".attendance", function () {
  var xhttp;
  var ajaxurl = '<?php echo e(route("students.attendance.create",[\Auth::user()->roles()->first()->name,$student->_id])); ?>';
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("out1").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET",ajaxurl, true);
  xhttp.send();
});

$('.delete').submit(function() {
    var c = confirm("Click OK to continue?");
    return c;

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>