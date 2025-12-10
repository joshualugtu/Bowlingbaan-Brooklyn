<?php
require_once "connectiedb.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $wachtwoord = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($wachtwoord, $user['password'])) {
        
    
        header("Location: overzichtpagina.php");
        exit();

    } else {
        echo "Verkeerde gebruikersnaam of wachtwoord!";
    }

    $stmt->close();
}
?>
