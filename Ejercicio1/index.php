<?php
    $estudiantes = json_decode(file_get_contents('estudiantes.json'), true);
?>

<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1 class="mt-4">Students List</h1>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Prom</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($estudiantes) {
            foreach ($estudiantes as $name => $estudiante) {
                $promedio = ($estudiante['matematicas'] + $estudiante['espanol'] + $estudiante['historia']) / 3;
                echo "<tr>";
                echo "<td>" . $name . "</td>";
                echo "<td>" . $promedio . "</td>";
                echo "</tr>";

                if (!isset($maxPromedio) || $promedio > $maxPromedio) {
                    $maxPromedio = $promedio;
                    $maxPromedioName = $name;
                }
            }
            echo "<tr>";
            echo "<td colspan='3'>El estudiante con el promedio más alto es: $maxPromedioName con un promedio de $maxPromedio</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <a href="add.php" class="btn btn-success">Create new student</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
