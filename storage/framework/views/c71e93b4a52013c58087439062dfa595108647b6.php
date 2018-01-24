
        <li class="<?php echo e((Request::is('*users*') ? 'active': '')); ?>"><a href="<?php echo e(route('users.index')); ?>">users</a></li>
        <li class="<?php echo e((Request::is('*roles*') ? 'active': '')); ?>"><a href="<?php echo e(route('roles.index')); ?>">roles</a></li>
        <li class="<?php echo e((Request::is('*permissions*') ? 'active': '')); ?>"><a href="<?php echo e(route('permissions.index')); ?>">permissions</a></li>
