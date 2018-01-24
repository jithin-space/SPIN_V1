<?php $__env->startSection('page_heading','Student Dashboard'); ?>
<?php $__env->startSection('section'); ?>
<?php
$links=array();
$json=json_decode($student);
foreach($json as $key=>$value){
 if(gettype($value)=="array"){
   array_push($links,$key);
 }
}

$myDateSort = function($obj1, $obj2) {
  $date1 = strtotime($obj1->created_at);
  $date2 = strtotime($obj2->created_at);
  return $date2 - $date1;
};
$sorted=array();
$active=array();
foreach($student->feedbacks as $feedback)
{
  array_push($sorted,$feedback);
}
usort($sorted,$myDateSort);

$top=array_slice($sorted,0,3);

\Debugbar::info($top);

foreach($student->ieps as $iep)
{
  if($iep->status=="Active")
  {
    array_push($active,$iep);
  }
}

\Debugbar::info(count($active));
?>

<?php $__env->startSection('sidebar'); ?>
<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <div class="profile-sidebar">
    				<!-- SIDEBAR USERPIC -->
    				<div class="profile-userpic">
    					<img src="<?php echo e($student->firstMedia('profile')->getUrl()); ?>" class="img-responsive" alt="">
    				</div>
    				<!-- END SIDEBAR USERPIC -->
    				<!-- SIDEBAR USER TITLE -->
    				<div class="profile-usertitle">
    					<div class="profile-usertitle-name">
    						<?php echo e($student->fname); ?> <?php echo e($student->lname); ?>

    					</div>
    					<!-- <div class="profile-usertitle-job">
    						ID:<?php echo e($student->_id); ?>

    					</div> -->
    				</div>
    				<!-- END SIDEBAR USER TITLE -->
    				<!-- SIDEBAR BUTTONS -->
            <div class="models--actions">
                            </div>
    				<div class="profile-userbuttons">
              <a class="btn btn-labeled btn-success btn-sm" href="<?php echo e(route('mystudents.feedback.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Feedback'); ?></a>
    					<a class="btn btn-labeled btn-danger btn-sm"><span class="btn-label"><i class="fa fa-plus"></i></span>Attendance</a>
    				</div>
      </div>
    <ul class="nav" id="side-menu">

      <li class="sidebar-search">
          <div class="input-group custom-search-form">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                  <i class="fa fa-search"></i>
              </button>
              </span>
          </div>
      </li>
      <li class="active"><a data-toggle="tab" href="#home" target="studentframe"><i class="fa fa-home fa-fw"></i>Home</a></li>
        <li><a data-toggle="tab" href="#ieps" ><i class="fa fa-italic fa-fw"></i>IEP </a></li>
        <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-info fa-fw"></i>Student Info<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level sub-menu collapse" id="service">
                    <li><a data-toggle="tab" href="#general_information"> General Information </a></li>
                    <li><a data-toggle="tab" href="#background_information"> Background Information </a></li>
                    <li><a data-toggle="tab" href="#guardian_information"> Guardian Information </a></li>
                    <li><a data-toggle="tab" href="#medication_information"> Medication Information </a></li>
                    <li><a data-toggle="tab" href="#school_information"> School Information </a></li>
                  </ul>

        </li>

        <li><a data-toggle="tab" href="#feedbacks"><i class="fa fa-comment fa-fw"></i> Feedbacks </a></li>
         <li><a data-toggle="tab" href="#status_report"><i class="fa fa-file fa-fw"></i> Status Report </a></li>
          <li><a data-toggle="tab" href="#strength_information"><i class="fa fa-life-saver fa-fw"></i> Strength & Needs </a></li>
          <li><a data-toggle="tab" href="#other_services"><i class="fa fa-exchange fa-fw"></i> Other Services </a></li>
          <li><a data-toggle="tab" href="#media_gallery"><i class="fa fa-file-image-o fa-fw"></i> Media Gallery </a></li>

      </ul>
    </div>
  </div>

<?php $__env->stopSection(); ?>
   <div class="tab-content">
     <div id="home" class="tab-pane fade in active">
        <?php echo $__env->make('partials.students.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
     </div>

      <div id="general_information" class="tab-pane fade">
        <?php echo $__env->make("partials.students.general_info", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="background_information" class="tab-pane fade">
        <?php echo $__env->make("partials.students.background_info", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="guardian_information" class="tab-pane fade">
        <?php echo $__env->make("partials.students.guardian_info", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="ieps" class="tab-pane fade">
        <?php echo $__env->make("partials.students.ieps", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="school_information" class="tab-pane fade">
        <?php echo $__env->make("partials.students.school_info", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="status_report" class="tab-pane fade">
        <?php echo $__env->make("partials.students.status_report", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="medication_information" class="tab-pane fade">
        <?php echo $__env->make("partials.students.med_info", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="strength_information" class="tab-pane fade">
        <?php echo $__env->make("partials.students.strength_info", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="other_services" class="tab-pane fade">
        <?php echo $__env->make("partials.students.other_services", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="media_gallery" class="tab-pane fade">
        <?php echo $__env->make("partials.students.media_gallery", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
      <div id="feedbacks" class="tab-pane fade">
        <?php echo $__env->make("partials.students.feedbacks", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>