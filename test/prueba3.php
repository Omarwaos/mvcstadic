<?php

require_once '../app/models/Proveedor.php';

$proveedor = new Proveedor();

print_r($proveedor->eliminar(2));