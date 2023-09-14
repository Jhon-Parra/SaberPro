<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('template_title'); ?>
    <?php echo e($competency->name ?? "{{ __('Show') Competency"); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content_header'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><?php echo e(__('Show')); ?> Competency</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(route('competencies.index')); ?>"> <?php echo e(__('Back')); ?></a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            <?php echo e($competency->name); ?>

                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            <?php echo e($competency->description); ?>

                        </div>
                        <div class="form-group">
                            <strong>Backgroundimageurl:</strong>
                            <?php echo e($competency->backgroundImageUrl); ?>

                        </div>
                        <div class="form-group">
                            <strong>Imageurl:</strong>
                            <?php echo e($competency->imageUrl); ?>

                        </div>
                        <div class="form-group">
                            <strong>Faculty:</strong>
                            <?php echo e($competency->faculty); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/competency/show.blade.php ENDPATH**/ ?>