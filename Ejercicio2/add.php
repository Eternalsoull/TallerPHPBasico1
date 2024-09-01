<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer el archivo JSON existente y decodificarlo en un arreglo PHP
        $empleados = json_decode(file_get_contents('empleados.json'), true);
        
        // Añadir un nuevo empleado al arreglo
        $empleados[$_POST['name']] = [
            'salario' => $_POST['salario'],
            'fecha_contratacion' => $_POST['fecha_contratacion'],
            'departamento' => $_POST['departamento'],
        ];
        
        // Guardar el arreglo actualizado en el archivo JSON
        file_put_contents('empleados.json', json_encode($empleados));
        
        // Redirigir a la página principal
        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="mt-4">Add New Employee</h1>
      <form method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="salario" class="form-label">Salary</label>
          <input type="number" name="salario" id="salario" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="fecha_contratacion" class="form-label">Hiring Date</label>
          <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="departamento" class="form-label">Department</label>
          <input type="text" name="departamento" id="departamento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
