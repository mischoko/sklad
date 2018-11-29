<?php
require 'start.php';
require 'header.php';
session_start();
if ($_SESSION['username'] !== "admin"){
    header ('location:index.php');
};
$pages = $db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
if (empty($pages)){
    ?>
    <main class="container">
    <div class="container">
        <h1 class="title center">Skladové hospodárstvo</h1>
        <article class="message">
            <div class="message-header"><p>Data nenájdené</p></div>
            <div class="message-body">
            <?php echo 'Data nenájdené - chyba internetového pripojenia, databázy, alebo tam proste naozaj nič nie je.';?>
            </div>
            <button class="button is-primary addProd" id="addBtn">+ Pridať nový produkt</button>
        </article>
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
                        <input name="kod" type="text" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="nazov">Názov:</label>
                        <input name="nazov" type="text" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="cena">Cena:</label>
                        <input name="cena" type="number" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="znacka">Značka:</label>
                        <input name="znacka" type="text" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="typ" class="labelSel">Typ produktu:</label>
                        <div class="select is-primary">
                            <select name="typ" required="true">
                                <option value="" disabled="" selected="">Vyberte Kategóriu</option>
                                <option>Nohavice</option>
                                <option>Šaty a sukne</option>
                                <option>Bundy a kabáty</option>
                                <option>Kardigány</option>
                                <option>Svetre</option>
                                <option>Pulóvre a tričká</option>
                                <option>Vesty</option>
                                <option>Košele a blúzky</option>
                                <option>Komplety & súpravy</option>
                                <option>Doplnky</option>
                            </select>
                        </div>
                    <div class="marginBtn">
                        <button name="submit" value="submit" type="submit" class="button is-success">Save changes</button>
                        <button type="button" class="button is-danger cancel" id="modalOff2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
<?php }
else {?>
<main class="container">
    <div class="container">
        <h1 class="title center">Skladové hospodárstvo</h1>
        <button class="button is-primary addProd" id="addBtn">+ Pridať nový produkt</button>
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
                        <input name="kod" type="text" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="nazov">Názov:</label>
                        <input name="nazov" type="text" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="cena">Cena:</label>
                        <input name="cena" type="number" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="znacka">Značka:</label>
                        <input name="znacka" type="text" class="input is-primary labelModal" type="text" required autocomplete="off">
                    <label for="typ" class="labelSel">Typ produktu:</label>
                        <div class="select is-primary">
                            <select name="typ" required="true">
                                <option value="" disabled="" selected="">Vyberte Kategóriu</option>
                                <option>Nohavice</option>
                                <option>Šaty & sukne</option>
                                <option>Bundy & kabáty</option>
                                <option>Kardigány</option>
                                <option>Svetre</option>
                                <option>Pulóvre & tričká</option>
                                <option>Vesty</option>
                                <option>Košele & blúzky</option>
                                <option>Komplety & súpravy</option>
                                <option>Doplnky</option>
                            </select>
                        </div>
                    <div class="marginBtn">
                        <button name="submit" value="submit" type="submit" class="button is-success">Save changes</button>
                        <button type="button" class="button is-danger cancel" id="modalOff2">Cancel</button>
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
                <th>Kategória</th>
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
                        <td> <?php echo $page['type']; ?></td>
                        <td><form action="delete.php?code=<?php echo $page['code'];?>" method="post"><button name="submit" type="submit" class="button is-danger">Delete</button></form>
                        </td>
                        <?php }?>
            </tbody>
        </table>
    <div>
</main>

<?php
}
require 'footer.php'
?>