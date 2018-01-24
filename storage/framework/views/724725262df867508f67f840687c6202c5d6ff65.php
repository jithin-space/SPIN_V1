<?php $__env->startSection('page_heading', 'Users'); ?>
<?php $__env->startSection('section'); ?>
<div class="models--actions">
    <a class="btn btn-labeled btn-primary" href="<?php echo e(route('users.create',\Auth::user()->roles()->first()->name)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New'); ?></a>
</div>
<table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Role</th>
    <th>SubRole</th>
    <th>Actions</th>
  </tr>

  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <?php \Debugbar::info($user->roles[0]->name); ?>
      <td><a href="#" data-toggle="popover" title="Email" data-content="<?php echo e($user->email); ?>"><?php echo e($user->name); ?></a></td>
      <td><a href="#" data-toggle="popover" title="Role Desc" data-content="<?php echo e($user->roles[0]->description); ?>"><?php echo e($user->roles[0]->name); ?></a></td>
      <td><a href="#" data-toggle="popover" title="Role Desc" data-content="will be replaced soon"><?php echo e(($user->subroles()->count()==0)?$user->roles[0]->name:$user->subroles[0]->name); ?></a></td>
      <td class="col-xs-3">
        <form action="<?php echo e(route('users.destroy', [\Auth::user()->roles()->first()->name,$user->id])); ?>" method="post" class="delete">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <a class="btn btn-labeled btn-default" href="<?php echo e(route('users.edit',[\Auth::user()->roles()->first()->name,$user->id])); ?>" <?php
            if($user->name=="jithin") echo "disabled"; ?>><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
          <button type="submit" class="btn btn-labeled btn-danger" <?php
            if($user->name=="jithin") echo "disabled"; ?>><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
        </form>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>
<?php echo e($users->links()); ?>


<script>

  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
  });


$('.delete').submit(function() {
    var c = confirm("Click OK to continue?");
    return c;

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>