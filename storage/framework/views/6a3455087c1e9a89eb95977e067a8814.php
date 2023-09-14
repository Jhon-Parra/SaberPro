<?php $__env->startSection('content_header'); ?>
    <div class="container">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Galería</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Audios</h2>
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php $__currentLoopData = $multimedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($media->type === 'audio'): ?>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div style="position: relative;">
                                        <audio controls style="width: 100%;">
                                            <source src="<?php echo e($media->url); ?>" type="audio/mpeg">
                                            Tu navegador no soporta el elemento de audio.
                                        </audio>
                                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: #f1f1f1; height: 2px;"></div>
                                    </div>
                                    <p>Name: <?php echo e($media->name); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="mt-4 col-md-12">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Image</h2>
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php $__currentLoopData = $multimedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($media->type === 'image'): ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="<?php echo e($media->url); ?>" alt="Imagen" class="img-fluid" title="<?php echo e($media->name); ?>">
                                        <p>Name:<?php echo e($media->name); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <?php echo e($multimedia->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/layout/galeria.blade.php ENDPATH**/ ?>