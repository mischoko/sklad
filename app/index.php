
<!-- php db access -->
<?php
require 'start.php';
require 'header.php';

session_start();

if(isset($_POST['name'])){
    // Getting variables
    $name     = !empty($_POST['name']) ? htmlentities($_POST['name']) : "";
    $pass     = !empty($_POST['pass']) ? htmlentities($_POST['pass']) : "";

    $sql = "SELECT id FROM user WHERE username = ? and password =?";
    $query   = $db->prepare($sql);
    $query->execute([$name, $pass]);
    $results = $query->fetchAll();

    if (count($results) === 1){
        $_SESSION['username'] = $name;
        header('location:login.php');
    }
}

?>

<main class="mainWrapper">
    <h1 class="logInHeader">Prihlásiť sa:</h1>
    <div class="formField">
        <form method="POST" name="login" action="index.php">
            <label for="name">Meno: </label><br>
                <input name="name" type="text" placeholder="username" required><br>
            <label for="name">Heslo: </label><br>
                <input name="pass" type="password" placeholder="password" required><br>
                <button name="submit" value="submit" type="submit" >Submit</button>
        </form>    
    </div>
</main>
