<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer el archivo JSON existente y decodificarlo en un arreglo PHP
        $productos = json_decode(file_get_contents('productos.json'), true);

        // Añadir un nuevo producto al arreglo
        $productos[$_POST['nombre']] = [
            'precio' => $_POST['precio'],
            'detalles' => [
                'disponible' => isset($_POST['disponible']),
                'reseñas' => []  // Puedes añadir reseñas si es necesario
            ]
        ];

        // Guardar el arreglo actualizado en el archivo JSON
        file_put_contents('productos.json', json_encode($productos));

        // Redirigir a la página principal
        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="mt-4">Add New Product</h1>
      <form method="post">
        <div class="mb-3">
          <label for="nombre" class="form-label">Name</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="precio" class="form-label">Price</label>
          <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" name="disponible" id="disponible" class="form-check-input">
          <label for="disponible" class="form-check-label">Available</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
