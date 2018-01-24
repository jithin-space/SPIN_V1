<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo e((Route::currentRouteName() == 'users.create') ? old('name', '') : $user->name); ?>">
</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo e((Route::currentRouteName() == 'users.create') ? old('email', '')  : $user->email); ?>">
    <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    <?php if(Route::currentRouteName() == 'users.edit'): ?>
        <div class="alert alert-info">
          <span class="fa fa-info-circle"></span> Leave the password field blank if you wish to keep it the same.
        </div>
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
</div>
<?php endif; ?>
