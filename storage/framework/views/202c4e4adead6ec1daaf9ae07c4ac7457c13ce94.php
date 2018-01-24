<?php $__env->startSection('page_heading', 'Edit Student'); ?>


<?php $__env->startSection('section'); ?>

<!-- general information section -->

        <?php echo form_start($form); ?>

        <input type="hidden" name="_method" value="put">
        <?php echo form_row($form->fname); ?>

        <?php echo form_row($form->lname); ?>

        <?php echo form_row($form->student_id, $formOptions = ['label' => "Student ID"]); ?>




        <input type="file" class="filestyle" name="profile" />

        <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('save'); ?></button>
        <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
        <?php echo form_end($form, $renderRest = false); ?>


<!-- end of general Information section -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('userform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>