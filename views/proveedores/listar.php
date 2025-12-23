<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
    <h1>Lista de proveedores</h1>
    <a href="./crear.php" class="btn btn-sm btn-primary">Registrar</a>
    <hr>

    <table class="table table-striped" id="tabla-proveedores">
        <thead>
        <tr>
            <th>ID</th>
            <th>Razon Social</th>
            <th>RUC</th>
            <th>Teléfono</th>
            <th>Origen</th>
            <th>Contacto</th>
            <th>Confianza</th>
            <th>Operaciones</th>
        </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </div>

    <script>
        //Método    :acción
        //Atributo  :Característica, propiedad
        //Evento    :Respuesta

        //verificar que toda la página esté cargada
        document.addEventListener("DOMContentLoaded",function(){
            //Enviarle una solicitud al controlador y esperar una respuesta
            function obtenerDatos(){
                const datos = new FormData();
                datos.append("operacion","listar");


                //AJAX: Asynchronous JavaScript And XML
                //¿Qué es una promesa?
                //Concepto ligados a procesos asíncronos, donde una tarea
                //puede ser resuelta en N tiempo, o bien puede fallar.
                fetch('../../app/controllers/proveedor.controller.php',{
                    method:'POST',
                    body: datos
                })
                .then(response => response.json()) //Convertir la respuesta en JSON
                .then(data =>{
                    //console.log(data) //Todos los datos en un paquete
                    
                    const tabla = document.querySelector("#tabla-proveedores tbody")



                data.forEach(element => {
                    tabla.innerHTML += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.razonsocial}</td>
                        <td>${element.ruc}</td>
                        <td>${element.telefono}</td>
                        <td>${element.origen}</td>
                        <td>${element.contacto}</td>
                        <td>${element.confianza}</td>
                        <td>
                        <a href='#' class="btn btn-primary">Editar</a>
                        <a href='#' class="btn btn-danger">Eliminar</a>    
                        </td>
                    </tr>
                    `;
                });
                
             })
            }

            obtenerDatos()
        })
    </script>

</body>
</html>