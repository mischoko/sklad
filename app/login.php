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
    <div class="container">
        <h1 class="title"> Home page Display of products</h1>
        
        <table class="table is-striped">
            <thead>
                <th>Kód</th>
                <th>Názov</th>
                <th>Cena</th>
                <th>Značka</th>
                <th>Vytvorené</th>
                <th>Upravené</th>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($pages as $page){?>
                </tr>
                        <td> <?php echo $page['code']; ?></td>
                        <td> <?php echo $page['name']; ?></td>
                        <td> <?php echo $page['price']; ?></td>
                        <td> <?php echo $page['brand']; ?></td>
                        <td> <?php echo $page['created']; ?></td>
                        <td> <?php echo $page['edited']; ?></td>
                        
                        <?php }?>
                        
            </tbody>
        </table>
    <div>
</main>



<?php
}
require 'footer.php'
?>