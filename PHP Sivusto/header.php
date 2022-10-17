<?php
    include 'config.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("😭😭 Connection failed 😭😭" . $conn->connection_error);
    }

    $formInfoName = $_POST["fname"];
    $formInfoMessage = $_POST["info"];

    $stmt = $conn->prepare("INSERT INTO Chat VALUES(:username, :message, aika)");
    $stmt->bindValue(':username', $formInfoName);
    $stmt->bindValue(':message', $formInfoMessage);
    $stmt->execute();

    $sql = "INSERT INTO Chat (username, message, aika) VALUES ('" . $formInfoName . "', '" . $formInfoMessage . "', now())";

    if ($data = $conn->query($sql) == TRUE) {
        echo "Message sent!";
    } else {
        echo "Error: " . $sql . " " . $conn->error;
        die();
    }

    $conn->close();
    header("Location: support.php");
    die();
?>