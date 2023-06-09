<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@900&display=swap");
</style>
<?php
// include '../config.php';

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
  echo '<a href="../pages/products.php?cat_id=' . $category_id . '" class="bg" data-category-id="' . $category_id . '">
            <img src="../../product_images/' . $prod_img . '" class="cat-bg" alt="' . $category_name . '" />
            <div class="centered">
              <h5 style="font-size:2.7rem;">' . $category_name . '</h5>
            </div>
          </a>';
  echo "</div>";
}
?>