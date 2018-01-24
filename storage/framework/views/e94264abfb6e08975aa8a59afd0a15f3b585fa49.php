<?php $__env->startSection('heading', 'Users'); ?>
<?php $__env->startSection('content'); ?>
<div class="models--actions">
    <a class="btn btn-labeled btn-primary" href="<?php echo e(route('users.create')); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New'); ?></a>
</div>
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Actions</th>
  </tr>

  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <td><a href="<?php echo e(route('users.show', $user->id)); ?>"><?php echo e($user->name); ?></a></th>
      <td class="col-xs-3">
        <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <a class="btn btn-labeled btn-default" href="<?php echo e(route('users.edit',$user->id)); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
          <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
        </form>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>