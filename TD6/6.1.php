<?php
session_start();

if (isset($_POST['reset'])) {
    session_unset();
    session_destroy();
    session_start();
}

if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}

if (!isset($_SESSION['username'])) {
    echo '
        <form method="POST">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Envoyer</button>
        </form>
    ';
} else {
    echo "Bonjour " . htmlspecialchars($_SESSION['username']) . " !";
    echo '
        <form method="POST">
            <button type="submit" name="reset">Réinitialiser</button>
        </form>
    ';
}
?>
