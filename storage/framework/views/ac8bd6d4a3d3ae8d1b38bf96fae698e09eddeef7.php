<?php $__env->startSection('page_heading', 'Strength Information'); ?>
<?php $__env->startSection('section'); ?>

<?php echo form_start($form); ?>

<?php echo form_row($form->type); ?>

<div class="collection-container1" data-prototype="<?php echo e(form_row($form->strength->prototype())); ?>">

   <hr/>
</div>
<div class="collection-container2" data-prototype="<?php echo e(form_row($form->weakness->prototype())); ?>">

  <hr/>
</div>
<div class="collection-container3" data-prototype="<?php echo e(form_row($form->special_interests->prototype())); ?>">

   <hr/>
</div>
<button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('create'); ?></button>
<a class="btn btn-labeled btn-default" href="<?php echo e(URL::previous()); ?>"><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
<?php echo form_end($form,$renderRest = false); ?>


<script>
      $('.selector').on('change',function(){
        $var=$(this).val();
        if($var=='Strength')
        {
            // alert('ekkjkjkj');
            var container1 = $('.collection-container1');
            var count1 = container1.children().length;
            var proto1 = container1.data('prototype').replace(/__NAME__/g, count1);
            container1.append(proto1);
        }
        else if($var=='Weakness')
        {
          var container2 = $('.collection-container2');
          var count2 = container2.children().length;
          var proto2 = container2.data('prototype').replace(/__NAME__/g, count2);
          container2.append(proto2);
        }
        else if($var=='Special_Interests'){
          var container3 = $('.collection-container3');
          var count3 = container3.children().length;
          var proto3 = container3.data('prototype').replace(/__NAME__/g, count3);
          container3.append(proto3);
        }
      });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$student], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>