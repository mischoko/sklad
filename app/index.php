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

<main class="container main">
    <h1 class="title">Prihlásiť sa:</h1>
    <div class="formField">
        <form method="POST" name="login" action="index.php">
            <label for="name">Meno: </label><br>
                <input class="input is-primary" name="name" type="text" placeholder="&nbsp;Meno" required><br>
            <label for="name">Heslo: </label><br>
                <input class="input is-primary" name="pass" type="text" placeholder="&nbsp;Heslo" required><br>
                <div class="g-recaptcha" data-sitekey="6LfqpX0UAAAAAA6d_4JzMmvEeAYfTBewdbZqxlww"></div>
                <button class="button is-primary" name="submit" value="submit" type="submit" >Prihlásiť sa</button>
        </form>    
    </div>
</main>