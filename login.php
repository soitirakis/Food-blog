<?php
session_start();
if(!isset($_SESSION["user"])){
      die("error");
  }else{

  include "db.php";
  include "header.php";

  $POZA_Profil = "..\\upload_poza\\";
  //display an upload form for the new recipe
 ?>
 <head>
   <meta charset="urf-utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="src/main.js"></script>
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <style>
   /* Modal Content */
   	.modal-content {
   	  background-color: #fefefe;
   	  margin: auto;
   	  padding: 20px;
   	  border: 1px solid #888;
   	  width: 80%;
   	}

   /* The Close Button */
   	.close {
   	  color: #aaaaaa;
   	  float: right;
   	  font-size: 28px;
   	  font-weight: bold;
   	}

   	.close:hover,
   	.close:focus {
   	  color: #000;
   	  text-decoration: none;
   	  cursor: pointer;
   	}
   </style>
   <script>
//delete recipe
$(function(){
  $("#deleteForm").on("submit", function(e){
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "load2-db.php",
      dataType: "json",
      data: {
        delete: $("submit").attr("value")
      },
      success: function(data){
						console.log(data);
						var modal = document.getElementById("myModal");
						var span = document.getElementsByClassName("close")[0];
						modal.style.display = "block";
						console.log(data);
						$(".message").text(data);
						//$("#name").val();
						span.onclick = function(){
							modal.style.display = "none";

						}
					}
    });
  })
});

//edit the recipe modal
    $(function() {
      var dialog, form;
      tips = $(".validateTips");

      function editRecipe(e) {
        e.preventDefault();

        $.ajax({
          type: "POST",
          url: "edit.php",
          data: $("form").serialize(),
          success: function(){
            alert("Recipe was updated!");
          }
        });

        dialog.dialog("close");
      }

      //display the dialog box
      dialog = $("#edit-form").dialog({
        autoOpen: false,
        height: 450,
        width: 550,
        modal: true,
        buttons: {
          "Edit recipe": editRecipe,
          Cancel: function() {
            dialog.dialog("close");
          }
        },
        close: function(){
          form[0].reset();
          //allFields.removeClass("ui-state-error");
        }
      });

      form = dialog.find("form").on("submit", function(event) {
        event.preventDefault();
        editRecipe();
      });

      $(".edit-recipe").button().on("click", function() {
        dialog.dialog("open");
      });
    });
   </script>
 </head>
 <body>
<div class="container upload_recipe" style="margin-top: 75px;">
  <h2 class="col-md-12 text-center">Upload new recipe</h2>
  <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" name="regForm" enctype="multipart/form-data" onsubmit="return showError();">
    <div class="form-group row">
      <label for="titlu" class="col-sm-2 col-for-label">Title</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="titlu" placeholder="Insert the recipe title" name="titlu"><span class="error" aria-live="polite"></span>
       </div>
    </div>
    <div class="form-group row">
      <label for="descriere" class="col-sm-2 col-for-label">Description</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="descriere" placeholder="Insert the recipe description" name="descriere"><span class="error" aria-live="polite"></span>
       </div>
    </div>
    <div class="form-group row">
       <label class="col-sm-2 col-for-label">Set the recipe picture</label>
       <div class="col-sm-10">
         <div class="custom-file">
           <input type="file" class="custom-file-input" name="poza" id="poza"><span class="error" aria-live="polite"></span>
           <label class="custom-file-label">Choose the file: </label>
         </div>
       </div>
     </div>
     <div class="form-group row">
       <div class="col-sm-10 text-center">
         <button type="submit" name="upload" class="btn btn-info" >Upload your recipe!</button>
       </div>
     </div>
  </form>
</div>

<!--delete modal-->
<div id="myModal" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
  		<span class="close">&times;</span>
  		<p class="message"></p>
	  </div>
</div>

<!--edit button-->
<div id="edit-form" title="Edit">
  <form>
    <fieldset>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="edit-title" id="edit-title">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="edit-description" id="edit-description">
      </div>
      <div class="form-group">
        <div class="custom-file">
          <label for="picture" class="custom-file-label">Choose picture</label>
          <input type="file" class="custom-file-input" name="edit-picture" id="edit-picture">
        </div>
      </div>
    </fieldset>
  </form>
</div>



<?php

//validate the input data
if(isset($_POST["upload"])){
  if($_SERVER["REQUEST_METHOD"] === "GET"){
    die("Post error");
  }else{
  //validat title
    if(empty($_POST["titlu"])){
      die("Title is required");
    }else{
      $titlu = htmlspecialchars($_POST["titlu"]);
      $titlu = trim($titlu);
      $succes = true;
    }

    //validate description
    if(empty($_POST["descriere"])){
      die("Description is required");
    }else{
      $descriere = htmlspecialchars($_POST["descriere"]);
      $descriere = trim($descriere);
      $succes = true;
    }

    //upload Poza
    if(!empty($_FILES["poza"])){
    switch($_FILES["poza"]["error"]){
      case UPLOAD_ERR_OK:
        $f = tempnam($POZA_Profil, "img-");
        if(move_uploaded_file($_FILES["poza"]["tmp_name"], $f)){
          echo "Fisier salvat cu succes";
        } else{
          echo "Fisierul uploadat nu a putut fi salvat";
        }
        break;
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        echo "Fisierul uploadat depaseste dimensiunea maxima admisa";
        break;
      case UPLOAD_ERR_NO_FILE:
        echo "Nu ati selectat nici un fisier";
        break;
      default:
        echo "Eroare la upload";
        break;
      }
    }else{
      die("Picture necessary");
    }

    //upload the recipe into database
    if($succes){
      $up = "img/".basename($_FILES["poza"]["name"]);
      $insert = "INSERT INTO food (Poza, Titlu, Descriere) VALUES ('{$up}', '$titlu', '$descriere')";
      $pdo->exec($insert);
      $message = "Recipe uploaded";

      unset($_POST);
      //header("Location:" .$_SERVER["PHP_SELF"] );
      echo "<script type='text/javascript'>alert('$message');</script>";
      exit;
    }

  }
}

include "db-content.php";
}
 ?>
</body>
