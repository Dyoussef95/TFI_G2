<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Grupo 2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    

     <!-- Bootstrap core CSS -->
<link href="{{ URL::asset('css/bootstrap.min.css'); }} " rel="stylesheet">
<!-- Custom styles for sidebar -->
<link href="{{ URL::asset('css/sidebars.css'); }} " rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

 
  </head>
  <body>

<main>
  <div class="flex-shrink-0 p-3 text-white bg-primary" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-white text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Gestión de Proyectos</span>
    </a>
    <ul class="list-unstyled ps-0 text-white">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
          Proyectos
        </button>
        <div class="collapse" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ url('/proyectos'); }}" class="link-dark rounded text-white">Ver Proyectos</a></li>
            <li><a href="{{ url('/proyectos/create'); }}" class="link-dark rounded text-white">Crear Nuevo Proyecto</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Recursos
        </button>
        <div class="collapse show" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ url('/recursos'); }}" class="link-dark rounded text-white">Ver Recursos</a></li>
            <li><a href="{{ url('/recursos/create'); }}" class="link-dark rounded text-white">Crear Nuevo Recurso</a></li>
            <li><a href="{{ url('/proyectos/reports'); }}" class="link-dark rounded text-white">Reportes</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Encargados
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ url('/encargados'); }}" class="link-dark rounded text-white">Ver Encargados</a></li>
            <li><a href="{{ url('/encargados/create'); }}" class="link-dark rounded text-white">Crear Nuevo Encargado</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Cuenta
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded text-white">Configurar</a></li>
            <li><a href="#" class="link-dark rounded text-white">Cerrar Sesión</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <div class="b-example-divider"></div>
  
  <div class="container d-flex flex-column align-items-stretch flex-shrink-0 bg-dark text-white">
    <a href="{{ url('/recursos'); }}" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold text-white">Recursos</span>
    </a>

    
    <div class="scrollarea">
      <div class="col-12">
        <h4 class="mb-3">Lista de Recursos</h4>
        <a class="w-100 btn btn-primary btn-lg" href="{{ url('/recursos/create'); }}">Agregar Nuevo Recurso</a>
        <div class="col-12">    
            <table class="table table-dark table-striped table-hover">
            <thead>
            
                <tr>
                <th>#</th>
                <th>Descripción</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($recursos as $recurso)                
                <tr>
                <th>{{ $recurso->id }}</th>
                <td>{{ $recurso->descripcion }}</td>
                <td>
                  <form action="{{ url('/recursos/'.$recurso->id); }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a class="btn btn-success btn-sm" href="{{ url('/recursos/'.$recurso->id.'/edit'); }}" role="button">Editar</a>
                    <button class="btn btn-danger btn-sm" type="submit"><em class="fa fa-trash"></em>Eliminar</button>
                  </form>
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>
       
      </div>
      
    
    </div>

    </div>


</main>


<script src="{{ URL::asset('js/bootstrap.bundle.min.js'); }}"></script>
    <script src="{{ URL::asset('js/sidebars.js'); }}"></script>
  </body>
</html>