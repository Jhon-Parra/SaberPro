

document.getElementById('submit-form').addEventListener('click', function() {
    var additionalAnswers = document.getElementById('additional-answers');
    for (var i = 1; i < answerCount; i++) {
        var dataInput = document.createElement('input');
        dataInput.setAttribute('type', 'hidden');
        dataInput.setAttribute('name', 'data[]');
        dataInput.value = additionalAnswers.querySelector('input[name="data[]"]:nth-child(' + i + ')').value;
        document.getElementById('answer-form').appendChild(dataInput);

        var percentageInput = document.createElement('input');
        percentageInput.setAttribute('type', 'hidden');
        percentageInput.setAttribute('name', 'percentage[]');
        percentageInput.value = additionalAnswers.querySelector('input[name="percentage[]"]:nth-child(' + i + ')').value;
        document.getElementById('answer-form').appendChild(percentageInput);

        var resultInput = document.createElement('input');
        resultInput.setAttribute('type', 'hidden');
        resultInput.setAttribute('name', 'result[]');
        resultInput.value = additionalAnswers.querySelector('select[name="result[]"]:nth-child(' + i + ')').value;
        document.getElementById('answer-form').appendChild(resultInput);

        var imageInput = document.createElement('input');
        imageInput.setAttribute('type', 'file');
        imageInput.setAttribute('name', 'imageUrl[]');
        imageInput.className = 'form-control-file';
        imageInput.accept = 'image/*';
        document.getElementById('answer-form').appendChild(imageInput);
    }
    // Submit the form after adding the hidden inputs
    document.getElementById('answer-form').submit();
});
