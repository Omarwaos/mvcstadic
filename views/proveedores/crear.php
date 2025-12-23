<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
    <title>Proveedores</title>
</head>
<body>
    <div class="container">
        <h1>Registro de Proveedores</h1>
        <a href="./listar.php" class="btn btn-primary">Lista de proveedores</a>
        <hr>
        <form action="" id="form-proveedor">
            <div class="card">
                <div class ="card-header">Complete el formulario</div>
                <div class ="card-body">
                <div class="form-floating">

                    <input type="text" id="razonsocial" class="form-control" required>
                    <label for="razonsocial" class="form-label">Razon Social</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" id="ruc" class="form-control" required>
                    <label for="ruc" class="form-label">RUC</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" id="telefono" class="form-control" required>
                    <label for="telefono" class="form-label">Teléfono</label>
                </div>

                <div class="form-floating mb-2">
                    <select id="origen" class="form-select" required>
                        <option value="">Seleccione</option>
                        <option value="N">Nacional</option>
                        <option value="E">Extranjero</option>
                    </select>
                    <label for="origen" class="form-label">Origen</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" id="contacto" class="form-control" required>
                    <label for="contacto" class="form-label">Contacto</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="number" min="1" max="5" value="1" id="confianza" class="form-control" required>
                    <label for="confianza" class="form-label">Confianza</label>
                </div>

                </div>
                <div class ="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
        

        //Detener el envío del formulario
        document.querySelector("#form-proveedor").addEventListener("submit", function (event){
            event.preventDefault(); //Detener el envío automático

            if(confirm("¿Está seguro de guardar?")){
                guardarDatos()
            }
        })

        function guardarDatos(){
            const datos = new FormData()

            datos.append("operacion","registrar")
            datos.append("razonsocial", document.querySelector("#razonsocial").value)
            datos.append("ruc", document.querySelector("#ruc").value)
            datos.append("telefono", document.querySelector("#telefono").value)
            datos.append("origen", document.querySelector("#origen").value)
            datos.append("contacto", document.querySelector("#contacto").value)
            datos.append("confianza", document.querySelector("#confianza").value)

            fetch('../../app/controllers/proveedor.controller.php',{
                method:'POST',
                body: datos
            })

        .then(response => response.json())
        .then(data =>{
           //console.log(data)
            if(data.id>0){

                document.querySelector("#form-proveedor").reset()
                alert("Producto registrado con ID: "+data.id)
            }else{
                alert("Error al registrar el producto...")
            }
        
        })


            alert("Datos guardados correctamente...")

        }  
        
        })
    </script>
</body>
</html>