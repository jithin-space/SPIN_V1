<?php $__env->startSection('page_heading', 'Edit General Information'); ?>



<?php $__env->startSection('section'); ?>


<form method="post" action="<?php echo e(route('students.general_info.update',[$data['sid'],1])); ?>">
    <input type="hidden" name="_method" value="put" />
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
  <div class="form-group">
      <label for="First_Name" class="control-label">First_Name</label>
      <input type="text" name="fname" class="form-control" value="<?php echo e($data['info']['fname']); ?>" disabled />

  </div>
  <div class="form-group">
      <label for="Last_Name" class="control-label">Last_Name</label>
      <input type="text" name="fname" class="form-control" value="<?php echo e($data['info']['lname']); ?>" disabled />

  </div>
  <div class="form-group">
    <label for="Date_Of_Birth">Date Of Birth</label>
                  <div class='input-group date'>
                      <input type='text' id='datetimepicker1' class="form-control" name="date_of_birth" value="<?php echo e($data['info']['date_of_birth']); ?>" required/>
                      <span class="input-group-addon" id="btn1">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
  </div>
  <div class="form-group">
    <label for="Gender">Gender</label><br/>
    <?php $__currentLoopData = ['male','female','other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

      <?php if($data['info']['gender']==$gender): ?>
    <label class="radio-inline">  <input type="radio" name="gender" value="<?php echo e($gender); ?>" checked> <?php echo e($gender); ?></label>
      <?php else: ?>
    <label class="radio-inline">  <input type="radio" name="gender" value="<?php echo e($gender); ?>"> <?php echo e($gender); ?></label>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  </div>
  <div class="form-group">
    <label for="Date_Of_Birth">Date Of Joining</label>
                  <div class='input-group date' >
                      <input type='text' id='datetimepicker2' class="form-control" name="date_of_joining" value="<?php echo e($data['info']['date_of_joining']); ?>" required/>
                      <span class="input-group-addon" id="btn2">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
  </div>

  <div class="form-group"  >

      <label for="Disabilities[]" class="control-label">Disabilities</label>

          <select class="selectpicker" multiple="multiple" id="Disabilities[]" name="Disabilities[]">

            <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               <?php
               echo $key."hello";
               print_r($data['selected']);
               if(in_array($key,$data['selected']))
               {
                 echo "<option value='{$key}' selected >{$value}</option>";
               }
               else {
                 echo "not working";
                 echo "<option value='{$key}'>{$value}</option>";
               }
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </select>

          &nbsp;<a href="#myModal4" data-toggle="modal"  class="eee btn btn-primary">Add New Disability Type</a>
  </div>

  <button type="submit" id="create" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('update'); ?></button>
  <a class="btn btn-labeled btn-default" href=" <?php echo e(URL::previous()); ?>"><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e('cancel'); ?></a>
</form>

<!-- this is for the modal -->
<div class="container">
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Permission</h4>
        </div>
        <div class="modal-body" id="out3">
          <p>Some text in the modal.</p>
            <input type="text" name="bookId" id="bookId" value=""/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
<!-- end of modal -->

<script>

$(document).ready(function(){
  $.when(
      $.getScript('<?php echo e(URL::asset("js/jquery.js")); ?>'),
    $.getScript('<?php echo e(URL::asset("js/jquery-ui.js")); ?>'),
      $.Deferred(function( deferred ){
          $( deferred.resolve );
      })
  ).done(function(){


     $('#btn1').click(function(){
       $('#datetimepicker1').datepicker({
         dateFormat:'dd/mm/yy'
       }).focus();
     });


     $('#btn2').click(function(){
       $('#datetimepicker2').datepicker({
         dateFormat:'dd/mm/yy'
       }).focus();
     });

  });

});

</script>

<script>
$(document).on("click", ".eee", function () {
 var xhttp;
//  hard coded value..careful in changing that value...........
 var id = 4;
 var ajaxurl = '<?php echo e(route("terms.create")); ?>';
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("out3").innerHTML = xhttp.responseText;
      $("#dummy").attr("value",id);

    }
  };
  xhttp.open("GET",ajaxurl, true);
  xhttp.send();

});

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('studentform',['student'=>$data['student']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>