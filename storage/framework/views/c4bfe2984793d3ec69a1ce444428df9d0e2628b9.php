<?php $__env->startSection('page_heading', 'Manage Vocabularies'); ?>
<?php $__env->startSection('section'); ?>


<table class="table table-striped">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>No.of Terms</th>
    <th>Actions</th>

  </tr>

  <?php $__currentLoopData = $vocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


    <tr>
      <td><?php echo e($loop->index+1); ?></td>
      <td><a href="#" data-toggle="popover" data-html="true" title="Terms" data-content="<?php
        foreach($voc->terms as $term){
          echo $term->name."<br/>";
        }
       ?>"><?php echo e($voc->name); ?></a></td>
      <td><?php echo e(count($voc->terms)); ?></td>
      <td class="col-xs-3">
        <a class="add btn btn-labeled btn-default" data-toggle="modal" data-id="<?php echo e($voc->id); ?>" href="#myModal1"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add Term'); ?></a>
        <a class=" edit btn btn-labeled btn-danger" data-toggle="modal" data-id="<?php echo e($voc->id); ?>" href="#myModal1"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('Edit Voc'); ?></a>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>

<?php echo e($vocs->links()); ?>


<div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Vocabulary</h4>
        </div>
        <div class="modal-body" id="outvoc">
          <h4> You Do Not Have the Permission For this Action </h4>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

<script>
$(document).on("click", ".edit", function () {
  var xhttp;
  var id = $(this).data('id');
  var ajaxurl = '<?php echo e(route("tags.edit", ':id')); ?>';
  ajaxurl = ajaxurl.replace(':id', id);
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outvoc").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET",ajaxurl, true);
  xhttp.send();
});

$(document).on("click", ".add", function () {
  var xhttp;
  var id = $(this).data('id');
  var ajaxurl = '<?php echo e(route("vocabulary.edit", ':id')); ?>';
  ajaxurl = ajaxurl.replace(':id', id);
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outvoc").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET",ajaxurl, true);
  xhttp.send();
});


$('.delete').submit(function() {
    var c = confirm("Click OK to continue?");
    return c;

});
</script>
<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>