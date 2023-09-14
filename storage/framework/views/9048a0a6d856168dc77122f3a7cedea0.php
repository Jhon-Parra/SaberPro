
<script src="<?php echo e(asset('js/answers.js')); ?>"></script>


<div class="box box-info padding-1">
    <div class="box-body">
        <h1><?php echo e($question->statement); ?></h1>
   <br>





        <div id="additional-answers"></div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="button" id="add-answer" class="btn btn-info">
            <i class="fas fa-plus"></i> Answer
        </button>

        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div>
<script>
     var answerCount = 1;

document.getElementById('add-answer').addEventListener('click', function() {
    var additionalAnswers = document.getElementById('additional-answers');
    var inputFields = `
         <div class="form-group">
            <?php echo e(Form::label('', '')); ?>

            <?php echo e(Form::hidden('question_id', $question->id)); ?>

        </div>
        <div class="answer-group" style="border: 1px solid #ccc; margin-top: 20px; padding: 10px;">
            <div class="form-group">
                <label>Contenido de la respuesta</label>
                <input type="text" name="data[]" class="form-control">
            </div>
            <div class="form-group">
                <label>Valor en porcentaje</label>
                <input type="number" name="percentage[]" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Es correcta o incorrecta</label>
                <select name="result[]" class="form-control">
                    <option value="0">Respuesta incorrecta</option>
                    <option value="1">Respuesta correcta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imageUrl">Imagen:</label>
                <div class="input-group">
                    <input type="file" name="imageUrl[]" class="form-control-file" accept="image/*">
                </div>
            </div>
        </div>
    `;
    additionalAnswers.insertAdjacentHTML('beforeend', inputFields);
    answerCount++;
});



</script>
<?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/answer/form.blade.php ENDPATH**/ ?>