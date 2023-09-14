<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('template_title'); ?>
    Answer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="<?php echo e(route('answers.index')); ?>" method="GET">
                                        <div class="mb-3 input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Answer')); ?>

                            </span>
                            <div class="float-right">
                                <a href="<?php echo e(route('questions.index')); ?>" class="float-right btn btn-secondary btn-sm" data-placement="left">
                                    <?php echo e(__(' ListQuestions')); ?>

                                </a>
                            </div>

                            <div class="float-right">
                                <a href="<?php echo e(route('questions.create')); ?>" class="float-right btn btn-info btn-sm" data-placement="left">
                                    <?php echo e(__('Create New Question')); ?>

                                </a>
                            </div>
                             <div class="float-right">
                                <a href="<?php echo e(route('answers.create')); ?>" class="float-right btn btn-primary btn-sm"  data-placement="left">
                                  <?php echo e(__('Create answers ')); ?>

                                </a>
                              </div>


                              <a href="<?php echo e(route('answers.pdf', ['search' => request('search')])); ?>" class="btn btn-success" target="_blank">PDF</a>
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

										<th>Data</th>
										<th>Percentage</th>
										<th>Result</th>
										<th>Question Id</th>
										<th>User Id</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>

											<td><?php echo e($answer->data); ?></td>
											<td><?php echo e($answer->percentage); ?></td>
											<td><?php echo e($answer->result); ?></td>
											<td><?php echo e($answer->question_id); ?></td>
                                            <td><?php echo e($answer->question_id? ($answer->question? $answer->question->statement: 'N/A') : 'N/A'); ?></td>
											<td><?php echo e($answer->user_id ? ($answer->user? $answer->user->name: 'N/A') : 'N/A'); ?></td>

											<td>
                                                <?php if($answer->imageUrl): ?>
                                                <img src="<?php echo e(asset('images/answersimg/' . $answer->imageUrl)); ?>" alt="Answer Image" width="150">
                                                <?php endif; ?>

                                             </td>

                                            <td>

                                                <a class="nav-link dropdown" href=""  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left; padding:5px;">
                                                <form action="<?php echo e(route('answers.destroy',$answer->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('answers.show',$answer->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('')); ?></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('answers.edit',$answer->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('')); ?></a>
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
                <?php echo $answers->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/answer/index.blade.php ENDPATH**/ ?>