<?php

$hostname='localhost';
$username='root';
$password='';
$database='webshopbap';

$connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);

try {
    $connection = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Fout bij database verbinding: ' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}


try {
    $query = "SELECT modelshirt, afbeelding, prijs, beschrijving, kleur, maat, voorraad FROM tshirts ORDER BY id";
    $statement = $connection->query($query);
} catch (PDOException $e){
    echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
}

?>
<h1>Kasiragi Outlet</h1>

<!DOCTYPE html>
<html>
<head>
    <title>Eindopdracht BAP</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="tshirts">

<?php foreach ($statement as $row){ ?>

   <?php //echo $row['modelshirt'] . ' ' . $row['kleur'] . ' ' . $row['maat'] . ' ' . $row['afbeelding'] . "<br>\n"; ?>
   <div class="tshirt">
   <img src="img/<?php echo $row['afbeelding']?>">
   <h2><?php echo $row['modelshirt']?></h2>
   <h4><?php echo $row['beschrijving']?></h4>
   <h2>€<?php echo $row['prijs']?></h2>
   <h3>Kleur:<?php echo $row['kleur']?> Maat: <?php echo $row['maat']?></h3>
   <h3>Voorraad:<?php echo $row['voorraad']?></h3>
   </div>
<?php

 ?>

</div>

</body>
</html>
