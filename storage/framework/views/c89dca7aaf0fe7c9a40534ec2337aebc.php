<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Update')); ?> Competency
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content_header'); ?>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><?php echo e(__('Update')); ?> Competency</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('competencies.update', $competency->id)); ?>" role="form" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('competency.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if(session('success')): ?>
    <script>
        window.onload = function() {
            var confirmFaculty = window.confirm("<?php echo e(session('success')); ?>");

            if (confirmFaculty) {
                window.location.href = "<?php echo e(route('competencies.edit', $competency->id)); ?>";
            } else {
                window.location.href = "<?php echo e(route('competencies.index')); ?>";
            }
        };
    </script>


<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/competency/edit.blade.php ENDPATH**/ ?>