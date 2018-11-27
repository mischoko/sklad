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
    $tbdel = $db->query("SELECT code FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="container">
    <div class="container">
        <h1 class="title center"> Home page Display of products</h1>
        
        <table class="table is-striped container">
            <thead>
                <th>Kód</th>
                <th>Názov</th>
                <th>Cena</th>
                <th>Značka</th>
                <th>Vytvorené</th>
                <th>Upravené</th>
                <th>Remove</th>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($pages as $page){?>
                </tr>
                <tr>
                </tr>
                        <td> <?php echo $page['code']; ?></td>
                        <td> <?php echo $page['name']; ?></td>
                        <td> <?php echo $page['price']; ?></td>
                        <td> <?php echo $page['brand']; ?></td>
                        <td> <?php echo $page['created']; ?></td>
                        <td> <?php echo $page['edited']; ?></td>
                        <td> <?php foreach($tbdel as $code){?><td><?php echo $code['code']; ?></td><?php }?></td>
                        <?php }?>
                        <!-- <form method="post"><button name="submit" type="submit" class="button">Delete<?php echo $tbs['code'];?></button></form>     -->
            </tbody>
        </table>
    <div>
</main>



<?php
}
if (isset($_POST['submit'])){
   
}

require 'footer.php'
?>