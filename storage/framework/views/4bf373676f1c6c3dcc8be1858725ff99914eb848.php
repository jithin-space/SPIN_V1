<?php
$links=array();
$json=json_decode($student);
foreach($json as $key=>$value){
 if(gettype($value)=="array"){
   array_push($links,$key);
 }
}
?>

<div class="container">
  <h2><?php echo e($student->fname); ?></h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
       <li><a data-toggle="tab" href="#<?php echo e($link); ?>"><?php echo e($link); ?></a></li>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </ul>
   <div class="tab-content">
     <div id="home" class="tab-pane fade in active">
       <h3>HOME</h3>
      <!--  for testing-->

    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo e($student->firstMedia('profile')->getUrl()); ?>" class="img-rounded img-responsive" />
                    <br />
                    <label>Student ID</label>
                    <input type="text" class="form-control" placeholder="<?php echo e($student->_id); ?>" readonly>
                    <br>
                    <label>Student Fname</label>
                    <input type="text" class="form-control" placeholder="<?php echo e($student->fname); ?>" readonly>
                    <label>Student Lname</label>
                    <input type="text" class="form-control" placeholder="<?php echo e($student->lname); ?>" readonly>
                    <br/>
                    <a href="#" class="btn btn-success">View More</a>
                    <br /><br/>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>Latest Feedbacks: </h2>
                        <h4>Bootstrap user profile template </h4>
                    </div>
                    <div class="models--actions">
                        <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.feedback.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Feedback'); ?></a>
                    </div>

                    <div >
                        <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="#" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="#" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>

                </div>
                <div class="form-group col-md-8">
                  <div id="text-carousel" class="carousel slide" data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="row" style="min-height:200px">
                          <div class="col-xs-offset-1 col-xs-10">
                              <div class="carousel-inner">
                                  <div class="item active">
                                      <div class="carousel-content">
                                          <div>
                                            <h1>posted bby</h1>
                                            <h2>posted at</h2>
                                              <p>Sapiente, ducimus, voluptas, mollitia voluptatibus nemo explicabo sit blanditiis laborum dolore illum fuga veniam quae expedita libero accusamus quas harum ex numquam necessitatibus provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="item">
                                      <div class="carousel-content">
                                          <div>
                                            <h1>posted bby</h1>
                                            <h2>posted at </h2>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sint fuga temporibus nam saepe delectus expedita vitae magnam necessitatibus dolores tempore consequatur dicta cumque repellendus eligendi ducimus placeat! </p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="item">
                                      <div class="carousel-content">
                                          <div>
                                             <h1>posted bby</h1>
                                             <h2>posted at </h2>
                                              <p>Sapiente, ducimus, voluptas, mollitia voluptatibus nemo explicabo sit blanditiis laborum dolore illum fuga veniam quae expedita libero accusamus quas harum ex numquam necessitatibus provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</p>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                     <a class="left carousel-control" href="#text-carousel" data-slide="prev">
                      <span><i class="fa fa-2x fa-chevron-left" style="margin:80px 0px 10px -30px;"></i></span>
                    </a>
                   <a class="right carousel-control" href="#text-carousel" data-slide="next">
                      <span><i class="fa fa-2x fa-chevron-right" style="margin:80px -30px 10px 0px;"></i></span>
                    </a>

                  </div><br/>

                    <a href="#" class="btn btn-warning">View All Feedbacks</a>
                </div>
            </div>
            <!-- ROW END -->


        </section>
        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->

      <!-- end of testing -->
     </div>
      <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
       <div id="<?php echo e($link); ?>" class="tab-pane fade">
         <h3>Menu 1</h3>

         <?php echo $__env->make("partials.students.{$link}", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

       </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </div>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>