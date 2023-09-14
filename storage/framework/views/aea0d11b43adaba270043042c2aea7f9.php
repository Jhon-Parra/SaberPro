<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <?php echo e(Form::label('statement')); ?>

            <?php echo e(Form::textarea('statement', isset($question) ? $question->statement : '', ['class' => 'form-control ckeditor' . ($errors->has('statement') ? ' is-invalid' : ''), 'placeholder' => 'Statement'])); ?>

            <?php echo $errors->first('statement', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <div class="form-group">
            <?php echo e(Form::label('statementtwo')); ?>

            <?php echo e(Form::textarea('statementtwo', isset($question) ? $question->statementtwo : '', ['class' => 'form-control ckeditor' . ($errors->has('statementtwo') ? ' is-invalid' : ''), 'placeholder' => 'Statementtwo'])); ?>

            <?php echo $errors->first('statementtwo', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <div class="form-group">
            <?php echo e(Form::label('level_id', 'Level')); ?>

            <?php echo e(Form::select('level_id', $levelOptions, isset($question) ? $question->level_id : null, ['class' => 'form-control' . ($errors->has('level_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Level'])); ?>

            <?php echo $errors->first('level_id', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('module_id', 'Module')); ?>

            <?php echo e(Form::select('module_id', $moduleOptions, isset($question) ? $question->module_id : null, ['class' => 'form-control' . ($errors->has('module_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Module'])); ?>

            <?php echo $errors->first('module_id', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('competency_id', 'Competency')); ?>

            <?php echo e(Form::select('competency_id', $competencyOptions, isset($question) ? $question->competency_id : null, ['class' => 'form-control' . ($errors->has('competency_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Competency'])); ?>

            <?php echo $errors->first('competency_id', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('author_id', 'Author')); ?>

            <?php echo e(Form::select('author_id', $authorOptions, isset($question) ? $question->author_id : null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'placeholder' => 'Select an Author'])); ?>

            <?php echo $errors->first('author_id', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <div class="form-group">
            <?php echo e(Form::label('type', 'Type')); ?>

            <?php echo e(Form::select('type', ['Escrita' => 'Escrita', 'Selección Múltiple' => 'Selección Múltiple', 'Selección Múltiple con varias respuestas' => 'Selección Múltiple con varias respuestas'], isset($question) ? $question->type : null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Select Type'])); ?>

            <?php echo $errors->first('type', '<div class="invalid-feedback">:message</div>'); ?>

        </div>


        <div class="form-group">
            <?php echo e(Form::label('points')); ?>

            <?php echo e(Form::text('points', isset($question) ? $question->points : '', ['class' => 'form-control' . ($errors->has('points') ? ' is-invalid' : ''), 'placeholder' => 'Points'])); ?>

            <?php echo $errors->first('points', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <label for="typefile"><?php echo e(__('File Type')); ?></label>
            <select name="typefile" id="typefile" class="form-control <?php $__errorArgs = ['typefile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value="image">Image</option>
                <option value="audio">Audio</option>
            </select>
            <?php $__errorArgs = ['typefile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="file"><?php echo e(__('File')); ?></label>
            <input type="file" name="file" class="form-control-file <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
        <a href="<?php echo e(route('questions.index')); ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>
<script src="<?php echo e(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');



</script>
<?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/question/form.blade.php ENDPATH**/ ?>