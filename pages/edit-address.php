<?php
// Replace these values with your database credentials
$host = 'localhost';
$dbname = 'sia';
$username = 'root';
$password = '';

session_start();

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

// Set the address ID
$address_id = isset($_POST['address']) ? $_POST['address'] : null;

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Check address id
if (isset($_POST['select_address'])) {
    $address_id = $_POST['address'];
}

// Check if the 'set as default' button was clicked
if (isset($_POST['set_default'])) {
    // Set the value to 1
    $stmt = $conn->prepare("UPDATE address SET `set` = 1 WHERE user_id = ? AND add_id = ?");
    $stmt->execute([$user_id, $address_id]);

    // Set other address `set` to 0
    $stmt = $conn->prepare("UPDATE address SET `set` = 0 WHERE user_id = ? AND add_id != ?");
    $stmt->execute([$user_id, $address_id]);

    // Retrieve updated address
    $stmt = $conn->prepare("SELECT * FROM address WHERE user_id = ? AND add_id = ?");
    $stmt->execute([$user_id, $address_id]);
    $selected_address = $stmt->fetch(PDO::FETCH_ASSOC);
}


// Retrieve the addresses for the specified user
$stmt = $conn->prepare("SELECT * FROM address WHERE user_id = ?");
$stmt->execute([$user_id]);
$addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retrieve the details for the selected address
$selected_address = null;
if ($address_id) {
    $stmt = $conn->prepare("SELECT * FROM address WHERE user_id = ? AND add_id = ?");
    $stmt->execute([$user_id, $address_id]);
    $selected_address = $stmt->fetch(PDO::FETCH_ASSOC);
}

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
    $floor = $_POST['floor'];

    // Determine whether to insert or update the address
    if ($selected_address) {
        // Update existing address
        $stmt = $conn->prepare("UPDATE address SET region = ?, province = ?, city = ?, barangay = ?, street = ?, house_no = ?, postal_code = ?, company = ?, room = ? WHERE add_id = ?");
        $stmt->execute([$region, $province, $city, $barangay, $street, $house_no, $postal_code, $company, $room, $address_id]);
    } else {
        // Insert new address
        $stmt = $conn->prepare("INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room, `floor`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $region, $province, $city, $barangay, $street, $house_no, $postal_code, $company, $room, $floor]);
        $address_id = $conn->lastInsertId();
    }

    return $address_id;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>AXGG | Address Form</title>
</head>

<body>
<?php include("../includes/nav-pages.php"); ?>
    <h1 style="padding-top: 20vh;">Address Form</h1>
    <form method="post" action="">
        <select name="address">
            <?php foreach ($addresses as $address) { ?>
                <option value="<?php echo $address['add_id']; ?>" <?php if ($address['add_id'] == $address_id) {echo 'selected';} ?>><?php echo $address['label']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" name="select_address" value="Select Address">
        <input type="submit" name="set_default" value="Set as Default">
    </form>

    <form method="post" action="">
        <label for="region">Region:</label>
        <input type="text" name="region" value="<?php echo isset($selected_address['region']) ? $selected_address['region'] : ''; ?>"><br><br>

        <label for="province">Province:</label>
        <input type="text" name="province" value="<?php echo isset($selected_address['province']) ? $selected_address['province'] : ''; ?>"><br><br>

        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo isset($selected_address['city']) ? $selected_address['city'] : ''; ?>"><br><br>

        <label for="barangay">Barangay:</label>
        <input type="text" name="barangay" value="<?php echo isset($selected_address['barangay']) ? $selected_address['barangay'] : ''; ?>"><br><br>

        <label for="street">Street:</label>
        <input type="text" name="street" value="<?php echo isset($selected_address['street']) ? $selected_address['street'] : ''; ?>"><br><br>

        <label for="house_no">House No.:</label>
        <input type="text" name="house_no" value="<?php echo isset($selected_address['house_no']) ? $selected_address['house_no'] : ''; ?>"><br><br>

        <label for="postal_code">Postal Code:</label>
        <input type="text" name="postal_code" value="<?php echo isset($selected_address['postal_code']) ? $selected_address['postal_code'] : ''; ?>"><br><br>

        <label for="company">Company:</label>
        <input type="text" name="company" value="<?php echo isset($selected_address['company']) ? $selected_address['company'] : ''; ?>"><br><br>

        <label for="room">Room:</label>
        <input type="text" name="room" value="<?php echo isset($selected_address['room']) ? $selected_address['room'] : ''; ?>"><br><br>

        <label for="floor">Floor:</label>
        <input type="text" name="floor" value="<?php echo isset($selected_address['floor']) ? $selected_address['floor'] : ''; ?>"><br><br>

        <input type="submit" name="submit" value="Save Address">
    </form>
    <a href="add-address.php"> << back</a>
    <div class="space-bott" style="padding-bottom:20vh;"></div>
    <?php include("../includes/foot-pages.php"); ?>
</body>

</html>