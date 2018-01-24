<li class="<?php echo e((Request::is('*students*') ? 'active': '')); ?>"><a href="<?php echo e(route('students.index')); ?>">students</a></li>
<li class="<?php echo e((Request::is('*assign*') ? 'active': '')); ?>"><a href="<?php echo e(route('assign.index')); ?>">assign</a></li>
<li class=""><a href="">Manage</a></li>
