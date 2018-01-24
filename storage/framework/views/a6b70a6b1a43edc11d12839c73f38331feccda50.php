<?php $__env->startSection('page_heading', 'My Students'); ?>
<?php $__env->startSection('section'); ?>

<?php echo form_start($form); ?>

<div class="collection-container" data-prototype="<?php echo e(form_row($form->school->prototype())); ?>">
    <?php echo form_row($form->school); ?>

</div>

<button type="button" class="btn btn-labeled btn-primary add-to-collection"><span class="btn-label"><i class="fa fa-plus"></i></span>Add Another Info</button>
<button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('create'); ?></button>
<a class="btn btn-labeled btn-default" href="<?php echo e(URL::previous()); ?>"><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>

<?php echo form_end($form); ?>



<script>
        $('.add-to-collection').on('click', function() {
            var container = $('.collection-container');
            var count = container.children().length;
            var proto = container.data('prototype').replace(/__NAME__/g, count);
            container.append(proto);
            $.when(
                $.getScript('<?php echo e(URL::asset("js/jquery.min.js")); ?>'),
              $.getScript( '<?php echo e(URL::asset("js/bootstrap.min.js")); ?>' ),
              $.getScript( '<?php echo e(URL::asset("js/bootstrap-select.js")); ?>'),
                $.getScript( '<?php echo e(URL::asset("js/bootstrap-formhelpers.js")); ?>' ),

                $.Deferred(function( deferred ){
                    $( deferred.resolve );
                })
            ).done(function(){

            });
        });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student',$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>