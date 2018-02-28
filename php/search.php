<?php

try {

$bdd = new PDO('mysql:host=localhost;dbname=biblioteca;charset=utf8', 'root', 'root');


} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}

if(isset($_GET['keyword'])){
  $keyword = $_GET['keyword'];
}

$q=array('keyword'=>$keyword.'%');


$req = $bdd->prepare('SELECT titlu,autor,prezenta FROM inventar WHERE titlu LIKE :keyword OR autor LIKE :keyword  ');
$req ->execute($q);
$count = $req->rowCount();

if($count){



while ($donnees = $req->fetch())
{

if($donnees['prezenta']){
  $status="<i class=\"material-icons circle green\">check</i>";
}else{
    $status="<i class=\"material-icons circle red\">close</i>";
}

	?>


      <li class="collection-item avatar">
      <?php echo $status ?>
        <span class="title"><?php echo $donnees['titlu']?></span>
        <p><?php echo $donnees['autor']?>
        </p>
      <a class="waves-effect waves-light btn button1">imprumuta</a>
      </li>



  <?php
}


}else{
echo "   <li class=\"collection-item avatar\">

    <span class=\"title\"> Niciun resultat</span>
    <p> Carte sau Autor necunoscut</p>
  </li> ";

}
$req->closeCursor();
