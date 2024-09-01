<?php
    $empleados = json_decode(file_get_contents('empleados.json'), true);
?>

<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="mt-4">Employee List</h1>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Salary</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Si el arreglo es null o está vacío no se muestra nada, sino se recorre el arreglo
          if ($empleados) {
              //mostrar el nombre y el salario de cada empleado
              $i = 1;
              foreach ($empleados as $name => $empleado) {
                  echo "<tr>";
                  echo "<td>" . $i++ . "</td>";
                  echo "<td>" . $name . "</td>";
                  echo "<td>" . $empleado['salario'] . "</td>";
                  echo "</tr>";
              }
          }
          ?>
        </tbody>
      </table>
      <a href="add.php" class="btn btn-success">Add New Employee</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
