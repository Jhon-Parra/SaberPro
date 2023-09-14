<!DOCTYPE html>
<html>
<head>
    <?php if(auth()->guard()->check()): ?>
    <title><?php echo e(Auth::user()->name); ?></title>
    <style>
        .cabecera {
            background-color: black;
            color: white;
        }
        h1 {
            color: black;
            text-align: center;
        }
        .td-small {
            font-size: 14px;
            padding: 5px;
            border: 1px solid #2d2c2c;
        }
        .td-small1 {
            font-size: 16px;
            padding: 5px;
            border: 1px solid #2d2c2c;
        }
        table {
            font-size: 14px;
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        img {
            display: block;
            margin: 0 auto;
        }
    </style>
    <?php endif; ?>
</head>
<body>
    <img src="image/logo_color.png" alt="" width="60px" height="60px">
    <h1>QUestions</h1><br>

    <div class="wrapper">
        <table class="table-center">
            <thead class="cabecera">
                <tr>

                                        <th class="td-small1">Statement</th>
										<th class="td-small1">Statementtwo</th>
										<th class="td-small1">Level </th>
										<th class="td-small1">Module </th>
										<th class="td-small1">Competency </th>
										<th class="td-small1">Author </th>
										<th class="td-small1">Type</th>
										<th class="td-small1"> Points</th>
                                        <th class="td-small1"> File</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>




                    <td class="td-small"><?php echo e($question->statement); ?></td>
                    <td class="td-small"><?php echo e($question->statementtwo); ?></td>

                    <td class="td-small"><?php echo e($question->level_id ? ($question->level ? $question->level->name : 'N/A') : 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($question->module_id ? ($question->module ? $question->module->name : 'N/A') : 'N/A'); ?></td>
                    <td class="td-small" ><?php echo e($question->competency_id ? ($question->competency ? $question->competency->name : 'N/A') : 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($question->author_id ? ($question->author ? $question->author->name : 'N/A') : 'N/A'); ?></td>


                    <td class="td-small"><?php echo e($question->type); ?></td>
                    <td class="td-small"><?php echo e($question->points); ?></td>
                    <td class="td-small"><?php echo e($question->typefile); ?></td>

                    <td></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</body>
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
</script>
</html>
<?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/question/pdf.blade.php ENDPATH**/ ?>