<?php
//include "db.php";
include "load2-db.php";
//define how many results you want per page
$result_per_page = 8;
//find out the number of results stored in database
$result = $pdo->query("SELECT COUNT(*) FROM food")->fetchColumn();
//print_r($result);

//determine number of pages
$number_f_pages =ceil($result / $result_per_page);

//determine which page number visitor is currently on
if(!isset($_GET['page'])){
  $current_page = 1;
}else{
  $current_page = $_GET['page'];
}

//determine the sql LIMIT
$this_page_first_result = ($current_page - 1)*$result_per_page;
$limit = 4;
//retrieve selected results from db and display
$r = $pdo->query("SELECT * FROM food LIMIT ".$this_page_first_result.','.$result_per_page);
  while($v = $r->fetchAll(PDO::FETCH_UNIQUE)){
    createCardDeck(array_slice($v,0,4));
    createCardDeck(array_slice($v,4,8));
  }
//display the links to the pages
//pagination
?>
  <div class="container">
    <nav aria-label="Page pagination">
      <ul class="pagination justify-content-center">
        <?php
          if($current_page === "1"){
            ?>
            <li class="page-item disabled">
              <a class="page-link" href='index.php?page=<?php echo $current_page; ?>' aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php
          }else{
            ?>
        <li class="page-item">
          <a class="page-link" href='index.php?page=<?php echo $current_page - 1; ?>' aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
          <?php
        }
            for($page = 1; $page<=$number_f_pages; $page++){
              if($current_page == $page) {
                ?>
                <li class="page-item active">
                  <a class="page-link tablink" onclick ="activePage(event);" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?> </a>
                </li>
                <?php
              }else{
          ?>
        <li class="page-item">
          <a class="page-link tablink" onclick ="activePage(event);" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?> </a>
        </li>
      <?php
          }
        }
        if($current_page == $number_f_pages){ ?>
          <li class="page-item disabled">
            <a class="page-link" href="index.php?page=<?php echo $current_page; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
      <?php
      }else{
       ?>
        <li class="page-item">
          <a class="page-link" href="index.php?page=<?php echo $current_page + 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
        <?php
      }
        ?>
      </ul>
    </nav>
  </div>
