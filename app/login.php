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
            <ul>
                <?php foreach($pages as $page) { ?>
                    <li> <?php echo $page['name']; ?></li>
                <?php } ?>
            </ul>
    <div>
</main>



<?php
}
require 'footer.php'
?>