<div class="card-deck">
<?php
  include "db.php";

 $newrecipe = $_POST["newrecipe"];
//extragem poze, titlu, descriere din db
$r = $pdo->prepare("SELECT * FROM food LIMIT :pret");
$r->bindParam(':pret', $newrecipe, PDO::PARAM_INT);
$r->execute();
$count = 0; //initializam iterator
while($v = $r->fetchAll(PDO::FETCH_UNIQUE)){
  foreach($v as $cheie=>$valoare){
    //echo $cheie;
    //print_r($v[$cheie]["Titlu"]);
    $count++;
    //echo $count;
    if($count <= 4){ //cat timp iterator mai mic decat 4, le cream ca si card.uri
      createCard($v[$cheie]["Poza"],$v[$cheie]["Titlu"],$v[$cheie]["Descriere"]);
    }/*else{   //altfel, cream un alt card-deck
      //$card = createCard($v[$cheie]["Poza"],$v[$cheie]["Titlu"],$v[$cheie]["Descriere"]);
      //createCardDeck(createCard($v[$cheie]["Poza"],$v[$cheie]["Titlu"],$v[$cheie]["Descriere"]));
      $count = 0;
    }*/
  }
}

//cream card-deck
function createCardDeck($card){
  echo '<div class="card-deck">'.$card.'</div>';
}

//cream cardul propriu zis
function createCard($poza, $titlu, $descriere){
  $card = '<div class="card">
    <a class="card-link" href="#">
    <img class="card-img-top" src="data:image/jpg;base64,'.base64_encode($poza).' " />
    <div class="card-body text-center">
      <h3 class="card-title">'.$titlu.'</h3>
      <p class="card-text">'.$descriere.'</p>
    </div>
  </a>
  </div>';
  echo $card;
  return $card;
}
?>
</div>
