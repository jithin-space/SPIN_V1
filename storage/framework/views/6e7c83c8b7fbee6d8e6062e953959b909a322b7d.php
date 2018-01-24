<?php $__env->startSection('page_heading', 'Permissions'); ?>
<?php $__env->startSection('section'); ?>
<div class="models--actions">
    <a class="bbb btn btn-labeled btn-success" data-toggle="modal" href="#myModal1" ><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Create New'); ?></a>
</div>

<script>
$(document).on("click", ".bbb", function () {
  var xhttp;
  var ajaxurl = '<?php echo e(route("permissions.create",\Auth::user()->roles()->first()->name)); ?>';
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("out1").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET",ajaxurl, true);
  xhttp.send();
});

$(document).on("click", ".edit", function () {
  var xhttp;
  var id = $(this).data('id');
  var ajaxurl = '<?php echo e(route("permissions.edit", [\Auth::user()->roles()->first()->name,':id'])); ?>';
  ajaxurl = ajaxurl.replace(':id', id);
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("out1").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET",ajaxurl, true);
  xhttp.send();
});
</script>

<!-- for create new permssions -->
<div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Permission</h4>
        </div>
        <div class="modal-body" id="out1">
          <h4> You Do Not Have The Permissions For This Page </h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
<!--  -->

<table class="table table-striped">
  <tr>
    <th>Permission Name</th>
    <th> Description </th>
    <th>Actions</th>
  </tr>

  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
    <td><a href=""><?php echo e($permission->name); ?></a></td>
    <td><?php echo e($permission->description); ?></td>
    <td class="col-xs-5">
      <form action="" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        <a class=" edit btn btn-labeled btn-default" data-toggle="modal" data-id="<?php echo e($permission->id); ?>" href="#myModal1"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
        <!-- <a class="btn btn-labeled btn-info" ><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Assign'); ?></a>
        <a class="ccc btn btn-labeled btn-primary" ><span class="btn-label"><i class="fa fa-angle-down"></i></span><?php echo e('view'); ?></a>
        <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button> -->

      </form>
    </td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>