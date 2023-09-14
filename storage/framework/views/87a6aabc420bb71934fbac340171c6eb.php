<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia Sesión</title>
</head>
<body>
    <div class="modal-dialog back " style="width:100%; margin-top:80px; border: solid 1px #283794; border-radius:15px; padding-left:40px; padding-bottom:40px; padding-right:40px; background: #283794">
        <div class="modal-content back bordernone">
            <br><br>
            <div class="modal-body bordernone">
                <h5 class="modal-title" id="exampleModalLabel"><h1>Iniciar Sesión</h1></h5>
                <br>
                <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e($error); ?>

                </div>
                <?php endif; ?>
                <form action="<?php echo e(url('/login')); ?>" method="post" name="form_register">
                    <?php echo csrf_field(); ?>
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person input-icon" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                    <input type="text" class="form-control transparent input" id="emailInput" name="email" required placeholder="    Correo eléctroinco"/>
                </div>
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill input-icon" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                      </svg>
                    <input type="password" class="form-control transparent input" id="passwordInput" name="password" required 
                    placeholder="     Contraseña"/>
                </div>

                
                <a href="" style="float:right; color:white;">¿Olvidaste tu contraseña?</a>
                <br><br>
                <button type="submit" class="btn btn-light btnsessionstart"><b>Iniciar Sesión</b></button>
                <br><br>
                <!--<a href="<?php echo e(url('/auth/microsoft')); ?>" class="btn btn-primary" style="border-radius: 30px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1024px-Microsoft_logo.svg.png" alt="" style="width: 30px;">
                    
                    Iniciar sesión con Microsoft
                </a>-->
                
                </form>
                
                <br><br>
                <a href="" style="color:white;"><b>Ayuda</b></a>
            </div>
            
        </div>
    </div>

</body>
</html><?php /**PATH /Users/jhonjairoparraparra/Desktop/saberpro/resources/views/session/login.blade.php ENDPATH**/ ?>