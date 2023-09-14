<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('template_title'); ?>
    Model Has Role
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content_header'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Model Has Role')); ?>

                            </span>

                             <div class="float-right">
                                <a href="<?php echo e(route('model-has-roles.create')); ?>" class="float-right btn btn-primary btn-sm"  data-placement="left">
                                    <?php echo e(__('Create New')); ?>

                                  </a>

                              </div>
                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Role Id</th>
										<th>Model Type</th>
										<th>Model Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $modelHasRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelHasRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>

                                            <td><?php echo e($modelHasRole->id); ?></td>
                                            <td>  <?php echo e($modelHasRole->role ? $modelHasRole->role->name ?? 'N/A' : 'N/A'); ?></td>
                                            <td><?php echo e($modelHasRole->model_type); ?></td>
                                            <td>  <?php echo e($modelHasRole->user ? $modelHasRole->user->name ?? 'N/A' : 'N/A'); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('model-has-roles.destroy',$modelHasRole->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('model-has-roles.show',$modelHasRole->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('model-has-roles.edit',$modelHasRole->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> <?php echo e(__('Delete')); ?></button>
                                                </form>
                                            </td>


                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php echo $modelHasRoles->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/model-has-role/index.blade.php ENDPATH**/ ?>