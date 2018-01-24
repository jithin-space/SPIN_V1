<?php if(isset($errors) && count($errors->all()) > 0): ?>
<div class="row">
  <div class="col-xs-12">
		<div class="alert alert-danger alert-dissmissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Error</h4>
			The following error has occured:
			<ul>
				<?php echo implode('', $errors->all('<li class="error">:message</li>')); ?>

			</ul>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if($message = Session::get('success')): ?>
<div class="row">
  <div class="col-xs-12">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><?php echo e('Success:'); ?></strong> <?php echo e($message); ?>

		</div>
		<?php echo e(Session::forget('success')); ?>

	</div>
</div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
<div class="row">
  <div class="col-xs-12">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><?php echo e(trans('entrust-gui::flash.error')); ?></strong> <?php echo e($message); ?>

		</div>
		<?php echo e(Session::forget('error')); ?>

	</div>
</div>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<div class="row">
  <div class="col-xs-12">
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><?php echo e(trans('entrust-gui::flash.warning')); ?></strong> <?php echo e($message); ?>

		</div>
		<?php echo e(Session::forget('warning')); ?>

	</div>
</div>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
<div class="row">
  <div class="col-xs-12">
		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><?php echo e(trans('entrust-gui::flash.info')); ?></strong> <?php echo e($message); ?>

		</div>
		<?php echo e(Session::forget('info')); ?>

	</div>
</div>
<?php endif; ?>
