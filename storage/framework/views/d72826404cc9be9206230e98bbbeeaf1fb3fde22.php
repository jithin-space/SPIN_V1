
  <div class="panel panel-default">
    <div class="panel-heading"><h4>Attendance Details</h4></div>
    <div class="panel-body">
      Type:<?php echo e($attendance->type); ?><br/>
      Slot:<?php echo e($attendance->slot); ?><br/>
      On: <?php echo e($attendance->attendance_on); ?><br/>
      Marked By:<?php echo e($attendance->marked_by); ?><br/>
    </div>
     <div class="panel-footer">
       <a class="btn btn-labeled btn-success" href="<?php echo e(route('students.attendance.edit',[\Auth::user()->roles()->first()->name,$student->_id,$attendance->_id])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
       <span class="pull-right">
         <form action="<?php echo e(route('students.attendance.destroy',[\Auth::user()->roles()->first()->name,$student->_id,$attendance->_id])); ?>" method="post" class="delete">
           <input type="hidden" name="_method" value="DELETE" />
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
           <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
          </form>
       </span>
     </div>
  </div>
