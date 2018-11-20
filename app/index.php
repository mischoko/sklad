
<main class="mainWrapper">
    <h1 class="logInHeader">Prihlásiť sa:</h1>
    <div class="formField">
        <label for="name">Meno: </label><br>
            <input name="name" type="text" placeholder="username" required><br>
        <label for="name">Heslo: </label><br>
            <input name="pass" type="text" placeholder="password" required>
    </div>
</main>

<!-- php db access -->

<?php
require 'start.php';
require 'header.php';

$pages = $db->query("
    SELECT id, code, name
    FROM products
")->fetchAll(PDO::FETCH_ASSOC);
?>
