<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@900&display=swap");

  .container {
    position: relative;
    height: 30vh;
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;
    margin-bottom: 100px;
    width: 70%;
    overflow: hidden;
    
  }
  .cat-bg {
    object-fit: cover;
    object-position: center;
    height: 100%;
    width: 100%;
    filter: brightness(50%);
    transition: transform 8s;
  }

  .cat-bg:hover {
    -ms-transform: scale(1.5);
    -webkit-transform: scale(1.5);
    transform: scale(1.5);
  }

  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: "Montserrat Alternates";
    font-style: normal;
    font-size: 50px;
    font-weight: 400;
    color: white;
  }

  .title {
    margin-left: auto;
    margin-right: auto;
    width: 30%;
    text-align: center;
    padding-top: 5%;
    font-family: "Montserrat Alternates";
  }
</style>
<?php
include '../config.php';

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $category_id = $row["category_id"];
  $category_name = $row["category"];

  $sql =
    "SELECT prod_img FROM products WHERE prod_id IN (SELECT prod_id FROM stock WHERE category_id = $category_id) ORDER BY prod_id DESC LIMIT 1";
  $result2 = mysqli_query($conn, $sql);

  if ($result2 && mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $prod_img = $row2["prod_img"];
  } else {
    $prod_img = "";
  }

  echo '<div class="container">';
  echo '<a href="pages/products.php?cat_id=' . $category_id . '" class="btn btn-primary category-link" data-category-id="' . $category_id . '">
            <img src="' . $prod_img . '" class="cat-bg" alt="' . $category_name . '" />
            <div class="centered">
              <h5>' . $category_name . '</h5>
            </div>
          </a>';
  echo "</div>";
}
?>