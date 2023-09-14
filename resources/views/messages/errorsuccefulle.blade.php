
<!--Usaremos este archivo para controlar los mesajes de exito y error en la aplicación-->
@if(isset($error))
<div class="position-fixed bottom-0 end-0 p-3" style=" z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" style="padding:30px; border-radius:30px; background:rgb(225, 100, 100); color:white;">
    <div class="toast-header">

      <strong class="me-auto">Hay un problema!</strong>
      
    </div>
    <div class="toast-body">
        {{$error}}
    </div>
  </div>
</div>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
</script>

@endif
@if(isset($success))
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background:green; color:white;">
    <div class="toast-header">

      <strong class="me-auto">Excelente!</strong>
      <small>ahora</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{$success}}
    </div>
  </div>
</div>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
</script>

@endif
