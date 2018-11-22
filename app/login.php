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
<main class="headWrapLogin">
    <div class="margins">
        <h1> Home page Display of products</h1>
        <div class="mainFlex">
            <div class="column">
                <h2>Kód</h2>
                <?php foreach($pages as $page) { ?>
                    <li> <?php echo $page['name']; ?></li>
                <?php } ?>
            </div>
            <div class="column">
                <h2>Názov</h2>
                <?php foreach($pages as $page) { ?>
                    <li> <?php echo $page['name']; ?></li>
                <?php } ?>
            </div>
            <div class="column">
                <h2>Cena</h2>
                <?php foreach($pages as $page) { ?>
                    <li> <?php echo $page['name']; ?></li>
                <?php } ?>
            </div>
            <div class="column">
                <h2>Značka</h2>
                <?php foreach($pages as $page) { ?>
                    <li> <?php echo $page['name']; ?></li>
                <?php } ?>
            </div>
            <div class="column">
                <h2>Názov</h2>
                <?php foreach($pages as $page) { ?>
                    <li> <?php echo $page['name']; ?></li>
                <?php } ?>
            </div>
        <div>
    <div>
</main>



<?php
}
require 'footer.php'
?>