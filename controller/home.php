<?php

    require "database/db.php";

    include_once "model/queries.php";

    $queries = new Queries();
    $d = $queries->getData();

    if(isset($_POST["submit"]))
        $queries->create($_FILES['file']['tmp_name']);


?>