<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <?php echo e(Form::label('name')); ?>

            <?php echo e(Form::text('name', $competency->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name'])); ?>

            <?php echo $errors->first('name', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('description')); ?>

            <?php echo e(Form::text('description', $competency->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description'])); ?>

            <?php echo $errors->first('description', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <?php if($competency->id): ?>
            <div class="form-group">
                <label for="faculty_id">Faculty</label>
                <select name="faculty_id" id="faculty_id" class="form-control">
                        <option value="">-- Selecciona una facultad--</option>
                    <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($faculty->id); ?>" <?php echo e($competency->faculty_id == $faculty->id ? 'selected' : ''); ?>><?php echo e($faculty->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
        <a href="<?php echo e(route('competencies.index')); ?>" class="btn btn-secondary">Cancel</a>

    </div>
</div>
<?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/competency/form.blade.php ENDPATH**/ ?>