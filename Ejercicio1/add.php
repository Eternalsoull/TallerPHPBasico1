<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer el archivo JSON existente y decodificarlo en un arreglo PHP
        $estudiantes = json_decode(file_get_contents('estudiantes.json'), true);
        
        // Añadir un nuevo estudiante al arreglo
        $estudiantes[$_POST['name']] = [
            'matematicas' => $_POST['matematicas'],
            'espanol' => $_POST['espanol'],
            'historia' => $_POST['historia'],
        ];
        
        // Guardar el arreglo actualizado en el archivo JSON
        file_put_contents('estudiantes.json', json_encode($estudiantes));
        
        // Redirigir a la página principal
        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="mt-4">Add Student</h1>
      <form method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="matematicas" class="form-label">Math</label>
          <input type="number" name="matematicas" id="matematicas" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="espanol" class="form-label">Spanish</label>
          <input type="number" name="espanol" id="espanol" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="historia" class="form-label">History</label>
          <input type="number" name="historia" id="historia" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
