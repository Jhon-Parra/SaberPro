<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('layout.layout')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regístrate</title>
</head>
<body >
    <div class="modal-dialog back " style="width:60%; margin-top:80px; border: solid 1px #283794; border-radius:15px; padding-left:40px; padding-bottom:0px; padding-right:40px; background: #283794">
        <div class="modal-content back bordernone">
            <div class="modal-body bordernone">
                <h5 class="modal-title" id="exampleModalLabel" style="margin-top: 40px;"><h1>Regístrate</h1></h5>
                <br>
                @if(isset($error))
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
                @endif
                <form action="{{ url('/register') }}" method="post" name="form_register">
                    @csrf
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person input-icon" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                    <input type="text" class="form-control transparent input" id="nameInput" name="name" required placeholder="    Nombre"/>
                </div>
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person input-icon" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg>
                    <input type="text" class="form-control transparent input" id="emailInput" name="email" required placeholder="    Correo institucional"/>
                </div>
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill input-icon" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <input type="text" class="form-control transparent input" id="phoneInput" name="phone" required placeholder="    Teléfono"/>
                </div>
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill input-icon" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                      </svg>
                    <input type="password" class="form-control transparent input" id="passwordInput" name="password" required 
                    placeholder="     Contraseña"/>
                </div>
                <div class="mb-3 input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill input-icon" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                      </svg>
                    <input type="password" class="form-control transparent input" id="repasswordInput" name="repassword" required 
                    placeholder="     Confirmar contraseña"/>
                </div>
                
                <br><br>
                <button type="submit" class="btn btn-light btnsessionstart"><b>Registrarme</b></button>
                </form>
                <br><br>
                <img src="image/nubeb.png" alt="No image" style=" margin-left:auto; margin-right:auto; width: 100%;">
                <div style=" margin-left:auto; margin-right:auto; width: 100%; background: white; color:#283794;">
                    <a>¿Ya tienes una cuenta?</a>
                    <a href="{{ url('/login') }}" style="color:#283794;"><b>Inicia Sesión</b></a>


                    <br><br>
                    <a href="" style="color:#283794; margin-bottom: 30px;"><b>Ayuda</b></a>
                    <br><br><br>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>