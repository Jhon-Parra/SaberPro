<?php
    use App\Models\Module;
?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('template_title'); ?>
    Competency
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content_header'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <?php echo e(__('Competency')); ?>

                        </span>
                        <div class="float-right">
                            <a href="<?php echo e(route('competencies.create')); ?>" class="float-right btn btn-primary btn-sm" data-placement="left">
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
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Faculty</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $competencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($competency->name); ?></td>
                                        <td><?php echo e($competency->description); ?></td>
                                        <td><?php echo e($competency->faculty ? $competency->faculty->name ?? 'N/A' : 'N/A'); ?></td>
                                        <td>
                                            <a class="nav-link dropdown" href=""  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left; padding:5px;">
                                            <form action="<?php echo e(route('competencies.destroy',$competency->id)); ?>" method="POST">
                                                <?php
                                                    $modules = Module::where('competency',$competency->id)->get();
                                                ?>
                                                <?php if($modules->count() > 0): ?>
                                                Hay modulos
                                                <?php else: ?>
                                                No hay modulos
                                                <?php endif; ?>
                                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('questions.create',$competency->id)); ?>"><i class="fa fa-fw fa-plus-square"></i> <?php echo e(__('Questions')); ?></a>
                                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('competencies.show',$competency->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('')); ?></a>
                                                <a class="btn btn-sm btn-success" href="<?php echo e(route('competencies.edit',$competency->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('')); ?></a>
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" ><i class="fa fa-fw fa-trash"></i> <?php echo e(__('')); ?></button>
                                            </form>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo $competencies->links(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/competency/index.blade.php ENDPATH**/ ?>