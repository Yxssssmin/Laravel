<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a48655155.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" style="margin-left: 10px">Proyecto</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
    </header>
      
    <h1 class="text-center p-3">CRUD EN LARAVEL</h1>

    @if(session("correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
    @endif

    @if(session("incorrecto"))
        <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif

    <script>
        var res=function(){
            var not = confirm("estas seguro de eliminar?");
            return null;
        }
    </script>

    <!-- Modal de registro datos -->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de productos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.create")}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Código del producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtcodigo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtnombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio del producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtprecio">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtcantidad">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="p-5 table-responsive">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir producto</button>
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">CANTIDAD</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th>{{$item->id_producto}}</th>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->precio}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id_producto}}"
                                class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route("crud.delete",$item->id_producto)}}" onclick="return res()" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>

                        <!-- Modal de modificar datos -->
                        <div class="modal fade" id="modalEditar{{$item->id_producto}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del producto
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route("crud.update")}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Código del
                                                    producto</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtcodigo" value="{{$item->id_producto}}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombre del
                                                    producto</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Precio del
                                                    producto</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtprecio" value="{{$item->precio}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Cantidad del
                                                    producto</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="txtcantidad" value="{{$item->cantidad}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
