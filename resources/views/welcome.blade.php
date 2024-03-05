<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a48655155.js" crossorigin="anonymous"></script>
</head>
<body>
   <h1 class="text-center p-3">CRUD EN LARAVEL</h1> 
    <button>Añadir producto</button>
   <div class="p-5 table-responsive">
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
        @foreach($datos as $item)
        <tr>
          <th>{{$item->id_producto}}</th>
          <td>{{$item->nombre}}</td>
          <td>{{$item->precio}}</td>
          <td>{{$item->cantidad}}</td>
          <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar" class="btn btn-warning btn-sm">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
          </td>
          <td>
            <a href="" data-bs-toggle="modal" data-bs-target="#modalBorrar" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
            </a>
          </td>
  
            <!-- Modal de modificar datos -->
            <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Código del producto</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Precio del producto</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtprecio">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cantidad del producto</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcantidad">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
</body>
</html>