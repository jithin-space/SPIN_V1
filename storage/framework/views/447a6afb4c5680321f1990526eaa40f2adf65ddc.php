<?php $__env->startSection('page_heading', 'Create Student'); ?>


<?php $__env->startSection('section'); ?>

<!-- general information section -->
        <?php echo form_start($form); ?>

        <?php echo form_row($form->fname,$formOptions = ['label'=>"First Name"]); ?>

        <?php echo form_row($form->lname, $formOptions = ['label'=>"Last Name"]); ?>

        <?php echo form_row($form->student_id, $formOptions = ['label' => "Student ID"]); ?>

        <?php echo form_row($form->profile,$options = ['attr' => ['class' => 'filestyle'],'label'=>'Profile Image']); ?>


        <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Create'); ?></button>
        <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('Reset'); ?></a>
        <?php echo form_end($form, $renderRest = true); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('userform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>