<head>
  <script src="sweetalert2.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>


$(function() {
  var form;

  function deleteForm(e){

    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "admin.php",
      data: $("form").serialize(),
      success: function(){
        alert("Recipe was deleted!");
      }
    });
  }

  form = dialog.find("form").on("submit", function(event) {
    event.preventDefault();
    deleteForm();
  })
});
</script>
</head>
<?php
  include "db.php";
  //include "admin.php";
  //extragem poze, titlu, descriere din db
  /*$pret = 0;
  $r = $pdo->prepare("SELECT * FROM food LIMIT 4 OFFSET :pret");
  $r->bindParam(':pret', $pret, PDO::PARAM_INT);
  $r->execute();
  while($v = $r->fetchAll(PDO::FETCH_UNIQUE)){
    createCardDeck($v,$pret,$r);
  */
  //cream card-deck
    function createCardDeck($v){
      echo '<div class="card-deck">';
        foreach($v as $cheie=>$valoare){
          $poza = $v[$cheie]["Poza"];
          $titlu = $v[$cheie]["Titlu"];
          $descriere = $v[$cheie]["Descriere"];
          createCard($poza,$titlu,$descriere);
    }
  // $pret += 4;
  //$r->bindParam(':pret', $pret, PDO::PARAM_INT);
  // $r->execute();
    echo '</div>';
  }
  //cream cardul propriu zis
  function createCard($poza, $titlu, $descriere){
    $card = '<div class="card">
      <a class="card-link" href="#">
      <img class="card-img-top" src="'.$poza.'" />
      <div class="card-body text-center">
        <h3 class="card-title">'.$titlu.'</h3>
        <p class="card-text">'.$descriere.'</p>
      </div>
    </a>
    </div>';
    echo $card;
  }
//"data:image/jpg;base64,'.base64_encode($poza).' "
//pentru afisare tabel continut db

//create <tr> tabel
  function createTr($v){
    echo "<tr>";
      foreach($v as $cheie=>$valaore){
        $id = array_search($v[$cheie],$v);
        $poza = $v[$cheie]["Poza"];
        $titlu = $v[$cheie]["Titlu"];
        $descriere = $v[$cheie]["Descriere"];
      createTd($id,$poza,$titlu,$descriere);
      }
      //print_r($poza);
      echo "</tr>";

}

//creare <td> tabel
  function createTd($id,$poza,$titlu,$descriere){
    $tabel = '<td> <img src="'.$poza.'" style="height:30px;" /></td>
              <td>'.$titlu.'</td>
              <td>'.$descriere.'</td>
              <td><input type="submit" class="edit-recipe" name="edit-recipe'.$id.'" value="Edit"></td>
              <td><form method="post" id="deleteForm" action=" '.$_SERVER["PHP_SELF"].'">
                  <input type="submit" id= "'.$id.'" name="delete'.$id.'" value="Delete">
              </form></td>';
    $display = "<tr>$tabel</tr>";
    print_r($display);
  if(isset($_POST["delete$id"])){
    deleteEntry($id);
  //  $response = "Recipe deleted";
  //  $encoded = json_encode($response);
  //  echo $encoded;
  }
}
  function deleteEntry($id){
    include "db.php";
    //$count = $pdo->query("SELECT COUNT(*) FROM food");
    //$v = $count->setFetchMode(PDO::FETCH_OBJ);
    $del = $pdo->exec("DELETE FROM food WHERE Id = {$id}");

    $response = "Recipe deleted";
    $encoded = json_encode($response);
    echo $encoded;
    //echo "<meta http-equiv='refresh' content='0' >";
  }
 ?>
