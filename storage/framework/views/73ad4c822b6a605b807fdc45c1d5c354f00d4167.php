<!--
<div class="container">
  <div class="models--actions">
      <a class="btn btn-labeled btn-success" href=""><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New Goal Area'); ?></a>
  </div>
  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
   <h3><span><i class="fa fa-play" aria-hidden="true"></i></span> <?php echo e($goal->Area); ?></h3>
   <div class="models--actions">
       <a class="btn btn-labeled btn-primary" href=""><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New LTO'); ?></a>
   </div>


    <?php $__currentLoopData = $goal->Long_Term_Objectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lts): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <td>
      <h4><?php echo e($lts->description); ?></h4>
      </td>
      <td class="col-xs-5">
          <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
          <a class="btn btn-labeled btn-primary" href=" "><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e($lts->status); ?></a>
          <a class="btn btn-labeled btn-success" href=" "><span class="btn-label"><i class="fa fa-angle-down"></i></span><?php echo e('Objectives'); ?></a>
          <a class="btn btn-labeled btn-danger" href=" "><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('Delete'); ?></a>
      </td>
    </tr>
    <div>
      <div class="models--actions">
          <a class="btn btn-labeled btn-primary" href=""><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New STO'); ?></a>
      </div>
      <?php $__currentLoopData = $lts->Short_Term_Objectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </table>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div> -->

<!-- <div class="container">
  <h2>Accordion Example</h2>
  <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Collapsible Group 1</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  </div>
</div> -->

<div class="container">
  <h2>Accordion Example</h2>
  <div class="models--actions">
      <a class="goal btn btn-labeled btn-success" href=""><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New Goal Area'); ?></a>
  </div>
  <div class="panel-group" id="accordion">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo e($goal->Area); ?>"><?php echo e($goal->Area); ?></a>
          </h4>
        </div>
        <div id="<?php echo e($goal->Area); ?>" class="panel-collapse collapse in">
          <div class="panel-body">
            <div class="models--actions">
                <a class="btn btn-labeled btn-primary" href=""><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New LTO'); ?></a>
            </div>
            <div>
              <table class="table table-striped">
              <?php $__currentLoopData = $goal->Long_Term_Objectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lts): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td class="col-xs-7">
                <h4><span><i class="fa fa-play"></i></span><?php echo e($lts->description); ?></h4>
                </td>
                <td class="col-xs-5">
                    <a class="btn btn-labeled btn-default" href=" "><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
                    <a class="btn btn-labeled btn-primary" href=" "><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e($lts->status); ?></a>
                    <a class="btn btn-labeled btn-success" href=" "><span class="btn-label"><i class="fa fa-angle-down"></i></span><?php echo e('Objectives'); ?></a>
                    <a class="btn btn-labeled btn-danger" href=" "><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('Delete'); ?></a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
     <!-- <h3><span><i class="fa fa-play" aria-hidden="true"></i></span> <?php echo e($goal->Area); ?></h3>
     <div class="models--actions">
         <a class="btn btn-labeled btn-primary" href=""><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New LTO'); ?></a>
     </div> -->

</div>
<script>
$(document).on("click", ".goal", function () {
  var xhttp;
  var id = $(this).data('id');
  var ajaxurl = '<?php echo e(route("roles.edit", ':id')); ?>';
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
