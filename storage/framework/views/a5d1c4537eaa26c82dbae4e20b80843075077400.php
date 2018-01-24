<?php $__env->startSection('page_heading', 'Students'); ?>
<?php $__env->startSection('section'); ?>


<div class="models--actions">
    <a class="btn btn-labeled btn-primary" href="<?php echo e(route('students.create',\Auth::user()->roles()->first()->name)); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e('Add New'); ?></a>
</div>


<form class="typeahead" role="search">
  <div class="form-group" style="text-align:center;">
    <input type="search" name="q" class="form-control search-input mySearch" placeholder="Type to start searching..." autocomplete="off">
  </div>
</form>


<table class="table table-striped">
  <tr>
    <th>Student Id</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Actions</th>
  </tr>
<tbody>
  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <tr>
      <td><?php echo e($student->student_id); ?></td>
      <td><a href="<?php echo e(route('students.show',[\Auth::user()->roles()->first()->name,$student->_id])); ?>"><?php echo e($student->fname); ?></a></th>
      <td><?php echo e($student->lname); ?></td>
      <td class="col-xs-3">
        <form action="<?php echo e(route('students.destroy', [\Auth::user()->roles()->first()->name,$student->_id])); ?>" method="post" class="delete">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <a class="btn btn-labeled btn-default" href="<?php echo e(route('students.edit',[\Auth::user()->roles()->first()->name,$student->_id])); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span><?php echo e('edit'); ?></a>
          <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e('delete'); ?></button>
        </form>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</tbody>
</table>
<?php echo e($students->links()); ?>



<script src="<?php echo e(URL::asset('js/typeahead_bundle.js')); ?>"></script>
<!-- Typeahead Initialization -->
<script>
    jQuery(document).ready(function($) {
        // Set the Options for "Bloodhound" suggestion engine
        var engine = new Bloodhound({
            remote: {
                url: '/find?q=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $(".search-input").typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            source: engine.ttAdapter(),

            // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
            name: 'usersList',
            display: 'fname',

            // the key from the array we want to display (name,id,email,etc...)
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    var url = "<?php echo e(route('students.show',[\Auth::user()->roles()->first()->name,':data._id'])); ?>";
                    url = url.replace(':data._id', data._id);
                    return '<a href="'+ url +'" class="list-group-item">' + data.fname + ' - @' + data.lname + '</a>'
          }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>