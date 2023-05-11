<form method="get" action="">
  <label for="prod_id">Product ID:</label>
  <input type="number" id="prod_id" name="prod_id" required>
  <button type="submit">Get Stock</button>
</form>

<?php
include('../config.php');

if (isset($_GET['prod_id'])) {
  $prod_id = $_GET['prod_id'];

  // Retrieve the distinct sizes and colors for the given product ID
  $sql = "SELECT DISTINCT sz.size, c.color 
          FROM stock s 
          INNER JOIN color c ON s.color_id = c.color_id 
          INNER JOIN size sz ON s.size_id = sz.size_id 
          WHERE s.prod_id = $prod_id";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Display the dropdown list
  if (mysqli_num_rows($result) > 0) {
    echo "<select name='size_color' id='size_color'>";
    foreach ($rows as $row) {
      echo "<option value='{$row['size']}_{$row['color']}'>{$row['size']} - {$row['color']}</option>";
    }
    echo "</select>";
  } else {
    echo "No stock information found for product ID $prod_id.";
  }
}
?>
