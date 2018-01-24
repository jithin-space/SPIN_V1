<?php $__env->startSection('heading', 'Students'); ?>
<?php $__env->startSection('content'); ?>
<div class="models--actions">
    <a class="btn btn-labeled btn-primary" href="<?php echo e(route('students.create')); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New'); ?></a>
</div>
<table class="table table-striped">
  <tr>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Actions</th>
  </tr>

  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <td><a href="<?php echo e(route('students.show', $student->_id)); ?>"><?php echo e($student->fname); ?></a></th>
      <td><?php echo e($student->lname); ?></td>
      <td class="col-xs-3">
        <form action="<?php echo e(route('students.destroy', $student->_id)); ?>" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <a class="btn btn-labeled btn-default" href="<?php echo e(route('students.edit',$student->_id)); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
          <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
        </form>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>