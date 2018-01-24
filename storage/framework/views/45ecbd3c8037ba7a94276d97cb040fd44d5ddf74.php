<?php
echo "hello";
\Debugbar::info($student->feedbacks);

\Debugbar::info(gettype($student->feedbacks));

 ?>
<div class="panel-group" id="accordion1">
   <?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
     <div class="panel panel-success">
       <div class="panel-heading">
         <h4 class="panel-title">
           <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo e($feedback->_id); ?>"><?php echo e($feedback->created_at); ?></a>
         </h4>
       </div>
       <div id="collapse<?php echo e($feedback->_id); ?>" class="panel-collapse collapse in">
         <div class="panel-body"><?php echo $feedback->content; ?></div>
         <div class="panel-footer">
           submitted by:<a><?php echo e($feedback->created_by); ?></a> on <?php echo e($feedback->created_at); ?>

           <span style="float:right">
             <form action="<?php echo e(route('mystudents.feedback.destroy',[$student->_id,$feedback->_id])); ?>" method="post">
               <input type="hidden" name="_method" value="DELETE">
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           <a class="btn btn-labeled btn-default" href="<?php echo e(route('mystudents.feedback.edit',[$student->_id,$feedback->_id])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
           <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
         </form>
         </span>
         </div>
       </div>
     </div>

   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

   <?php echo e(hello()); ?>

 </div>
