<?php

    function getConnection()
    {
        define("HOST", "localhost");
        define("USER", "root");
        define("PASSWORD", "");
        define("DBNAME","gestionstockdb");

        $conn = mysqli_connect(HOST,USER,PASSWORD,DBNAME);
        mysqli_set_charset($conn,"utf8");
        return $conn;
    }

    function executeSQL($sql)
    {
        return mysqli_query(getConnection(), $sql);
    }

    function closeConnexion($connexion)
    {
        mysqli_close($connexion);
    }

?>
