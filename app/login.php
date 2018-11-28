<?php
require 'start.php';
require 'header.php';
session_start();
if ($_SESSION['username'] !== "admin"){
    header ('location:index.php');
};
$pages = $db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
if (empty($pages)){
    echo 'No data found';
}
else{
?>

<main class="container">
    <div class="container">
        <h1 class="title center">Skladové hospodárstvo</h1>
        <button class="button is-primary" id="addBtn">Pridať nový produkt +</button>
        <div class="modal" id="modalId">
            <div class="modal-background" id="modalOff"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title center">Pridať nový produkt</p>
                    <button class="delete" aria-label="close" id="modalOff3"></button>
                </header>
                <form class="modal-card-body" method="post" action="add.php">
                <!-- Content ... -->
                    <label for="kod">Kód:</label>
                        <input name="kod" type="text" class="input is-primary labelModal" type="text">
                    <label for="nazov">Názov:</label>
                        <input name="nazov" type="text" class="input is-primary labelModal" type="text">
                    <label for="cena">Cena:</label>
                        <input name="cena" type="text" class="input is-primary labelModal" type="text">
                    <label for="znacka">Značka:</label>
                        <input name="znacka" type="text" class="input is-primary labelModal" type="text">
                    <div class="marginBtn">
                        <button name="submit" value="submit" type="submit" class="button is-success">Save changes</button>
                        <button class="button is-danger cancel" id="modalOff2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table is-striped container">
            <thead>
                <th>Kód</th>
                <th>Názov</th>
                <th>Cena</th>
                <th>Značka</th>
                <th>Vytvorené</th>
                <th>Upravené</th>
                <th>Vymazať</th>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($pages as $page){?>
                </tr>
                        <td> <?php echo $page['code']; ?></td>
                        <td> <?php echo $page['name']; ?></td>
                        <td> <?php echo $page['price']; ?> €</td>
                        <td> <?php echo $page['brand']; ?></td>
                        <td> <?php echo $page['created']; ?></td>
                        <td> <?php echo $page['edited']; ?></td>
                        <td><form action="delete.php?code=<?php echo $page['code'];?>" method="post"><button name="submit" type="submit" class="button is-danger">Delete</button></form>
                        </td>
                        <?php }?>
            </tbody>
        </table>
    <div>
</main>
<script>
    var modal = document.getElementById('modalId');
        document.getElementById('addBtn').onclick = function(e){modal.style.display = 'block';}
        document.getElementById('modalOff').onclick = function(e){modal.style.display = 'none';}
        document.getElementById('modalOff2').onclick = function(e){modal.style.display = 'none';}
        document.getElementById('modalOff3').onclick = function(e){modal.style.display = 'none';}
</script>



<?php
}
require 'footer.php'
?>