<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style=" box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); color: #283794; padding-left: 7vw;  padding-right: 7vw;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerStudent" aria-controls="navbarTogglerStudent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerStudent">
        <a class="navbar-brand primary_color" href="#">
          <img src="image/logo_color.png" alt="" style="width: 100px;">
        </a>
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <b class="primary_color"> @include('icons.house')<div class="row">
    @foreach ($products as $product)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                @isset($product['icon'])
                <i class="{{ $product['icon'] }}"></i>
                @endisset
                <h5 class="card-title">{{ $product['text'] }}</h5>
                <a href="{{ $product['url'] }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

                Principal </b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link primary_color" href="#">
                <b class="primary_color">@include('icons.location')
                  A explorar</b>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
              <b class="primary_color"> @include('icons.statitics')
                Estadísticas </b>
            </a>
          </li>
        </ul>
        <span class="navbar-text position-relative">
          <div class="dropstart">
            <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              @include('icons.options')
            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item"  >
                  <h5>{{Auth::user()->name }}</h5>

                  {{Auth::user()->email }}
                </a>
              </li>
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <li><a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a></li>
            </ul>
          </div>

        </span>


      </div>
    </div>
  </nav>
