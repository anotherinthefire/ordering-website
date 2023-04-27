<!DOCTYPE html>
<html>
<head>
  <title>Display Address Details</title>
</head>
<body>
  <label for="addressDropdown">Select an Address:</label>
  <select id="addressDropdown">
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Retrieve the addresses from the database
    $sql = "SELECT add_id, CONCAT(region, ', ', province, ', ', city, ', ', barangay, ', ', street, ', ', house_no) AS address FROM address";
    $result = $conn->query($sql);

    // Display the addresses in the dropdown
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['add_id'] . '">' . $row['address'] . '</option>';
    }

    // Close the database connection
    $conn->close();
    ?>
  </select>
  <br><br>
  <label for="addressDetailsTextbox">Address Details:</label>
  <br>
  <textarea id="addressDetailsTextbox" rows="8" cols="80" readonly></textarea>

  <script>
    // Get the dropdown element
    var dropdown = document.getElementById("addressDropdown");

    // Add an event listener to the dropdown that updates the textbox when the selection changes
    dropdown.addEventListener("change", function() {
      // Get the selected option
      var selectedOption = dropdown.options[dropdown.selectedIndex];

      // Send an AJAX request to a PHP script that retrieves the address details based on the selected option
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "get_address_details.php?add_id=" + selectedOption.value, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Update the textbox with the retrieved address details
          document.getElementById("addressDetailsTextbox").value = xhr.responseText;
        }
      };
      xhr.send();
    });
  </script>
</body>
</html>
