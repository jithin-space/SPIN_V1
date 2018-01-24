
<form method="POST" action="<?php echo e(route('assign.update',$data['student']->_id )); ?>" >
  <input type="hidden" name="_method" value="put">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
     <div class="checkbox">
          <label><input type="checkbox" value="<?php echo e($user->id); ?>" name="id[]"> <?php echo e($user->fname); ?></label>
      </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  <input type="submit" value="assign" />
</form>
