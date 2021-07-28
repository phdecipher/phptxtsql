<?php

    require "database/db.php";

    include_once "model/queries.php";

    $queries = new Queries();
    $d = $queries->getData();

    if(isset($_POST["submit"]))
    {
        $file = $_FILES['file']['tmp_name'];
        $sql = file_get_contents($file);
        $statement = $connection->prepare($sql);
        $statement->execute();

        header("Location: /phptxtsql");
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TXT/SQL to DB</title>
</head>
<body>
    
    <div class="container">
        <div class="mt-5">
                <h1>TEXT/SQL File to Database</h1>
                <form method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="file" id="file" size="150">
                <p class="help-block">Only .sql/.txt File Import.</p>
            </div>
                <button type="submit" class="btn btn-secondary" name="submit" value="submit">Submit</button>
            </form>
        </div>

        <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Last Name</th>
          <th scope="col">First Name</th>
          <th scope="col">Course</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($d as $a): ?>
        <tr>
          <td><?= $a->ID; ?></td>
          <td><?= $a->LAST_NAME; ?></td>
          <td><?= $a->FIRST_NAME; ?></td>
          <td><?= $a->COURSE; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>


</body>
</html>