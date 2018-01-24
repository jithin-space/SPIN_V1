<?php $__env->startSection('heading', 'Assignment'); ?>
<?php $__env->startSection('content'); ?>

  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <h4><a href=""> <?php echo e($student->fname); ?> </a></h4>

    <div class="models--actions">
        <a class="aaa btn btn-labeled btn-primary "  data-toggle="modal" href="#myModal" data-id="<?php echo e($student->_id); ?>" ><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Assign New'); ?></a>
    </div>

    <!--  -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body" id="out">
            <p>Some text in the modal.</p>
              <input type="text" name="bookId" id="bookId" value=""/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!--  -->
    <script>
      $(document).on("click", ".aaa", function () {
        var xhttp;
        var id = $(this).data('id');
        var ajaxurl = '<?php echo e(route("assign.edit", ':id')); ?>';
        ajaxurl = ajaxurl.replace(':id', id);
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("out").innerHTML = xhttp.responseText;
          }
        };
        xhttp.open("GET",ajaxurl, true);
        xhttp.send();

      });
    </script>

    <table class="table table-striped">
      <tr>
        <th>Trainer</th>
        <th>Assignments</th>
        <th>Actions</th>
      </tr>

      <?php $__currentLoopData = $student->support_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <td><a href=""><?php echo e($user->fname); ?></a></th>
          <td><a href=""><?php echo e(count($user->student_ids)); ?> </a></td>

          <td class="col-xs-3">
            <form action="<?php echo e(route('assign.destroy',$user->id )); ?>" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type="hidden" name="sid" value="<?php echo e($student->_id); ?>" />
              <a class="btn btn-labeled btn-default" href=""><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
              <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('student_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>