<?php

function connessione_db() {

    // connessione al DB
    include 'db-config.php';
    // Connect
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function esegui_query($query) {
    // Connect
    $conn = connessione_db();

    // Check connection
    if ($conn && $conn->connect_error) {
    return null;
    } else {
        $result = $conn->query($query);

        $conn->close();
        return $result;
    }
}







?>
