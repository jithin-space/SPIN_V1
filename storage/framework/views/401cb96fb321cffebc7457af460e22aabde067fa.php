<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->


    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('css/jasny-bootstrap.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('css/select2.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(URL::asset('css/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/bootstrap-filestyle.min.js')); ?>"></script>
      <!-- <link href="/css/app.css" rel="stylesheet"> -->

      <style>
        body {
          margin-top: 60px;
        }
        form {
          margin-bottom: 0;
        }
        .models--actions {
          margin-bottom: 15px;
        }
      </style>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    <?php echo $__env->yieldContent('navbar'); ?>
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(url('/logout')); ?>"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1><?php echo $__env->yieldContent('heading'); ?></h1>
            <?php echo $__env->make('partials.notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
