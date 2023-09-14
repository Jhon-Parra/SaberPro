<div class="box box-info padding-1">
    <div class="box-body">

        <!-- Data -->
        <div class="form-group">
            <?php echo e(Form::label('data', 'Data')); ?>

            <?php echo e(Form::text('data', old('data', isset($answer) ? $answer->data : ''), ['class' => 'form-control' . ($errors->has('data') ? ' is-invalid' : ''), 'placeholder' => 'Enter Data'])); ?>

            <?php echo $errors->first('data', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <!-- Percentage -->
        <div class="form-group">
            <?php echo e(Form::label('percentage', 'Percentage')); ?>

            <?php echo e(Form::text('percentage', old('percentage', isset($answer) ? $answer->percentage : ''), ['class' => 'form-control' . ($errors->has('percentage') ? ' is-invalid' : ''), 'placeholder' => 'Enter Percentage'])); ?>

            <?php echo $errors->first('percentage', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <!-- Result -->
        <div class="form-group">
            <?php echo e(Form::label('result', 'Result')); ?>

            <?php echo e(Form::text('result', old('result', isset($answer) ? $answer->result : ''), ['class' => 'form-control' . ($errors->has('result') ? ' is-invalid' : ''), 'placeholder' => 'Enter Result'])); ?>

            <?php echo $errors->first('result', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <!-- Question -->
        <div class="form-group">
            <?php echo e(Form::label('question_id', 'Question')); ?>

            <?php echo e(Form::select('question_id', $questionOptions, old('question_id', isset($answer) ? $answer->question_id : ''), ['class' => 'form-control' . ($errors->has('question_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Question'])); ?>

            <?php echo $errors->first('question_id', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <!-- User -->
        <div class="form-group">
            <?php echo e(Form::label('user_id', 'User')); ?>

            <?php echo e(Form::select('user_id', $userOptions, old('user_id', isset($answer) ? $answer->user_id : ''), ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a User'])); ?>

            <?php echo $errors->first('user_id', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="imageUrl">Image:</label>
            <div class="input-group">
                <input type="file" name="imageUrl" class="form-control-file" accept="image/*">
                <?php if(isset($answer) && $answer->imageUrl): ?>
                    <a href="<?php echo e(asset('images/answersimg/' . $answer->imageUrl)); ?>" class="ml-2 btn btn-primary" target="_blank">
                        View Image
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="mt-3 box-footer">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
        <a href="<?php echo e(route('answers.index')); ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>
<?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/answer/form1.blade.php ENDPATH**/ ?>