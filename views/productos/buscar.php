<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
    <title>Buscador</title>
</head>
<body>
    <div class="container mt-3">
        <h3>Búsqueda por ID</h3>
        <form action="" id="form-busqueda-1">
            <div class="mb-3">
                <label for="idbuscado">ID Buscado</label>
                <div class="input-group">
                    <span class="input-group-text">Escriba solo número</span>
                    <input type="text" class="form-control" id="idbuscado" autofocus>
                    <button class="btn btn-success" type="submit"><i class="bi bi-search"></i>Buscar</button>
                    
                </div>
            </div>

            <div>
                <label for="">Descripción</label>
                <input type="text" id="descripcion">
            </div>
        </form>
        <hr>
        <h3>Búsqueda por marca</h3>
        <form action="" id="form-busqueda-2">
            <div>
                <label for="marca">Marcas</label>
                <div class="input-group">
                <select name="" id="marca" class="form-select">
                    <option value="">Seleccione</option>
                    <option value="Epson">Epson</option>
                    <option value="Logitech">Logitech</option>
                    <option value="Canon">Canon</option>
                    <option value="HP">HP</option>
                    <option value="Sony">Sony</option>
                    <option value="Kingston">Kingston</option>
                    <option value="LG">LG</option>
                </select>
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i>Buscar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered mt-3" id="tabla-productos-marcas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clasificación</th>
                    <th>Marca</th>
                    <th>Descripción</th>
                    <th>Garantía</th>
                    <th>Ingreso</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
           
            function buscarProductoID(){
            const datos = new FormData()
            datos.append('operacion','buscarPorId')
            datos.append('id', document.querySelector("#idbuscado").value)
            fetch('../../app/controllers/producto.controller.php',{
                method: 'POST',
                body: datos
            })
                .then(response => response.json())
                .then(data =>{
                    const resultado = data[0]['descripcion'] + " "+ data[0]['marca']
                    document.querySelector("#descripcion").value = resultado
                })
                .catch(error =>{
                    document.querySelector("#descripcion").value = ''
                    alert('Producto no encontrado')
                })
           }

           function buscarProductoMarcas(){
            const datos = new FormData()
            datos.append('operacion','buscarPorMarca')
            datos.append('marca', document.querySelector("#marca").value)
            fetch('../../app/controllers/producto.controller.php',{
                method: 'POST',
                body: datos
            })
                .then(response  => response.json())
                .then(data =>{
                 const tabla = document.querySelector("#tabla-productos-marcas tbody")
                
                 tabla.innerHTML = "";   

                if (data.length === 0) {
                tabla.innerHTML = `<tr><td colspan="7" class="text-center">No se encontraron productos para la marca seleccionada.</td></tr>`;
                return;
                }



                 data.forEach( element => {
                    tabla.innerHTML += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.clasificacion}</td>
                        <td>${element.marca}</td>
                        <td>${element.descripcion}</td>
                        <td>${element.garantia}</td>
                        <td>${element.ingreso}</td>
                        <td>${element.cantidad}</td>
                    </tr>
                    `
                 })

                })
           }


           document.querySelector("#form-busqueda-1").addEventListener("submit", function(event){
            event.preventDefault()
            buscarProductoID();
           })

           document.querySelector("#form-busqueda-2").addEventListener("submit", function(event){
            event.preventDefault()
            buscarProductoMarcas()
           })

        })
    </script>
</body>
</html>