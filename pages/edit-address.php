<?php
// Replace these values with your database credentials
$host = 'localhost';
$dbname = 'sia';
$username = 'root';
$password = '';

// Start the session
session_start();

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

// Set the address ID (replace with your own value)
$address_id = isset($_POST['address']) ? $_POST['address'] : null;

// Connect to the database
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Check if an address ID was selected
if ($address_id) {
    // Update the 'set' column value for the selected address
    $stmt = $conn->prepare("UPDATE address SET `set` = 1 WHERE user_id = ? AND add_id = ?");
    $stmt->execute([$user_id, $address_id]);
}

// Retrieve the addresses for the specified user
$stmt = $conn->prepare("SELECT * FROM address WHERE user_id = ?");
$stmt->execute([$user_id]);
$addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve the details for the selected address
$stmt = $conn->prepare("SELECT * FROM address WHERE user_id = ? AND add_id = ?");
$stmt->execute([$user_id, $address_id]);
$selected_address = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Retrieve the form values
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $house_no = $_POST['house_no'];
    $postal_code = $_POST['postal_code'];
    $company = $_POST['company'];
    $room = $_POST['room'];
    
    // Determine whether to insert or update the address
    if ($selected_address) {
        // Update the existing address
        $stmt = $conn->prepare("UPDATE address SET region = ?, province = ?, city = ?, barangay = ?, street = ?, house_no = ?, postal_code = ?, company = ?, room = ? WHERE add_id = ?");
        $stmt->execute([$region, $province, $city, $barangay, $street, $house_no, $postal_code, $company, $room, $address_id]);
    } else {
        // Insert a new address
        $stmt = $conn->prepare("INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room, `set`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $region, $province, $city, $barangay, $street, $house_no, $postal_code, $company, $room, 1]);
        $address_id = $conn->lastInsertId();
    }
}

// Generate the HTML for the dropdown
echo '<form method="POST">';
echo '<select name="address">';
foreach ($addresses as $address) {
    $selected = $address['add_id'] == $address_id ? 'selected' : '';

    echo '<option value="' . $address['add_id'] . '"' . $selected . '> ' . $address['label'] . '</option>';
}
echo '</select>';
echo '<br><br>';
echo '<input type="submit" name="select_address" value="Select Address">';
echo '</form>';

    
    // Generate the HTML for the form
    echo '<form method="POST">';
    echo '<label for="region">Region:</label><br>';
    echo '<input type="text" id="region" name="region" value="' . ($selected_address ? $selected_address['region'] : '') . '"><br>';
    echo '<label for="province">Province:</label><br>';
    echo '<input type="text" id="province" name="province" value="' . ($selected_address ? $selected_address['province'] : '') . '"><br>';
    echo '<label for="city">City:</label><br>';
    echo '<input type="text" id="city" name="city" value="' . ($selected_address ? $selected_address['city'] : '') . '"><br>';
    echo '<label for="barangay">Barangay:</label><br>';
    echo '<input type="text" id="barangay" name="barangay" value="' . ($selected_address ? $selected_address['barangay'] : '') . '"><br>';
    echo '<label for="street">Street:</label><br>';
    echo '<input type="text" id="street" name="street" value="' . ($selected_address ? $selected_address['street'] : '') . '"><br>';
    echo '<label for="house_no">House No.:</label><br>';
    echo '<input type="text" id="house_no" name="house_no" value="' . ($selected_address ? $selected_address['house_no'] : '') . '"><br>';
    echo '<label for="postal_code">Postal Code:</label><br>';
    echo '<input type="text" id="postal_code" name="postal_code" value="' . ($selected_address ? $selected_address['postal_code'] : '') . '"><br>';
    echo '<label for="company">Company:</label><br>';
    echo '<input type="text" id="company" name="company" value="' . ($selected_address ? $selected_address['company'] : '') . '"><br>';
    echo '<label for="room">Room:</label><br>';
    echo '<input type="text" id="room" name="room" value="' . ($selected_address ? $selected_address['room'] : '') . '"><br>';
    echo '<br>';
    echo '<input type="submit" name="submit" value="' . ($selected_address ? 'Update Address' : 'Add New Address') . '">';
    echo '</form>';
    ?>