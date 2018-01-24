
  <label for="Long_Term_Objective">Long Term Objective:</label>
  <div class="row">
    <div class="col-md-7">
        <select class="selectpicker form-control"  data-size="10" id="ltos" name="lto" required >
             <option value="">Select A Long Term Objective</option>
              <?php $__currentLoopData = $datas['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($lto->id); ?>"><?php echo e($lto->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </select>
    </div>
    <div class="col-md-1">
      <h4>OR&nbsp;</h4>
    </div>
    <div class="col-md-2" >
      <div class="models--actions">
          <a class="bbb btn btn-labeled btn-primary" data-toggle="modal" href="#myModal" data-id="<?php echo e($datas['voc_id']); ?>" ><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New LTO'); ?></a>
      </div>
    </div>
  </div>
