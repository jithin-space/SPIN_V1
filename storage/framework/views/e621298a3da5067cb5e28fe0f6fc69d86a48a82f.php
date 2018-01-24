
<?php

if(!(isset($json->other_services) && !empty($json->other_services)))
{ ?>
  <br/><br/>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-danger">
                  <div class="panel-heading">No Information found</div>

                  <div class="panel-body">
                      <p>No Services  Information has been added to the student.</p><br/>
                      <div class="models--actions">
                          <a class="btn btn-labeled btn-primary" href="<?php echo e(route('students.other_services.create',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Info'); ?></a>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
  echo "helloooooo";
  $data=$json->other_services;
  ?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_service): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="" >Edit Background Information</A><br/>
           <p class=" text-info">Last Updated:May 05,2014,03:00 pm </p>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-info">
          <div class="panel-heading">
              <h3 class="panel-title">Other Service Information</h3>
          </div>
          <div class="panel-body">
            <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo e($student->firstMedia('profile')->getUrl()); ?>" class="img-circle img-responsive"> </div>

                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr><td>Category</td><td><?php echo e($other_service->service_category); ?></td><tr>
                        <tr><td>Type</td><td><?php echo e($other_service->service_type); ?></td><tr>
                        <tr><td>Status</td><td><?php echo e($other_service->service_status); ?></td><tr>
                        <tr><td>Start Date</td><td><?php echo e($other_service->start_date); ?></td><tr>
                        <tr><td>End Date</td><td><?php echo e($other_service->end_date); ?></td><tr>
                        <?php $__currentLoopData = $other_service->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($loop->first): ?>
                                <tr><td rowspan="<?php echo e($loop->count); ?>">Attachment</td><td><a href="<?php echo e($attachment); ?>">link</a></td></tr>
                            <?php else: ?>
                                  <tr><td><a href="<?php echo e($attachment); ?>">link</a></td></tr>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>;
                      </tbody>
                    </table>

                    <a href="<?php echo e(route('students.other_services.create',$student->_id)); ?>" class="btn btn-primary">Add New Guardian</a>

                  </div>
                </div>
          </div>
          <div class="panel-footer">
                 <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                 <span class="pull-right">
                   <form action="<?php echo e(route('students.other_services.destroy', [$student->_id,$loop->index])); ?>" method="post">
                     <input type="hidden" name="_method" value="DELETE">
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                       <a href="<?php echo e(route('students.other_services.edit',[$student->_id,$loop->index])); ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                       <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                   </form>
                 </span>
          </div>
      </div>
    </div>
    </div>


  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>;
<?php

}
?>
