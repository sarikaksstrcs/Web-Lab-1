<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $db = new mysqli('localhost', 'root', 'cetmca', 'login');

    // Check for a valid username and password
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $db->query($query);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: home_page.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>
<html>
    <body>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </body>
</html>

