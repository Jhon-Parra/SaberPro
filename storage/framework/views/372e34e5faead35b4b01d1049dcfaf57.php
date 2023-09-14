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
            font-size: 20px;
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
    <h1>Usuarios</h1><br>

    <div class="wrapper">
        <table class="table-center">
            <thead class="cabecera">
                <tr>
                    <th class="td-small1">Name</th>
                    <th class="td-small">Email</th>
                    <th class="td-small1">Document</th>
                    <th class="td-small1">Points</th>
                    <th class="td-small1">Faculty</th>
                    <th class="td-small1">Level</th>


                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="td-small"><?php echo e($user->name ?? 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($user->email ?? 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($user->document ?? 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($user->points ?? 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($user->faculty ? $user->faculty->name ?? 'N/A' : 'N/A'); ?></td>
                    <td class="td-small"><?php echo e($user->level ?? 'N/A'); ?></td>

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
<?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/user/pdf.blade.php ENDPATH**/ ?>