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

    // Determine whether to insert or update the address
    if ($selected_address) {
        // Update existing address
        $stmt = $conn->prepare("UPDATE address SET region = ?, province = ?, city = ?, barangay = ?, street = ?, house_no = ?, postal_code = ?, company = ?, room = ? WHERE add_id = ?");
        $stmt->execute([$region, $province, $city, $barangay, $street, $house_no, $postal_code, $company, $room, $address_id]);
    } else {
        // Insert new address
        $stmt = $conn->prepare("INSERT INTO address (user_id, region, province, city, barangay, street, house_no, postal_code, company, room) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $region, $province, $city, $barangay, $street, $house_no, $postal_code, $company, $room]);
        $address_id = $conn->lastInsertId();
    }

    return $address_id;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Anime X Gaming Guild &#x2223; Edit Address Form</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;700;900&display=swap');

        .whole {
            margin-bottom: 15%;
            width: 100%;
            height: 100vh;
        }

        .boton {
            padding: 10px;
            background-color: #5876CE;
            color: white;
            border: none;
            font-family: 'Roboto';
            font-weight: bold;
        }

        .boton:hover {
            background-color: #404759;
        }

        form .boton {
            padding: 10px;
            background-color: #5876CE;
            color: white;
            border: none;
            font-family: 'Roboto';
            font-weight: bold;
        }

        form .boton:hover {
            background-color: #404759;
        }
    </style>
</head>

<body>
    <?php include("../includes/nav-pages.php"); ?>
    <section class="whole">
        <h1 style="padding-top:15vh; font-family: 'Montserrat Alternates'; font-weight: 600; text-align: center;">Edit Address Form</h1>

        <center>
            <form method="post" action="" style="padding: 2%;">
                <select name="address" style="padding: 10px; border: 1px solid #979797; padding-top: 8.5px; padding-bottom: 10.5px; padding-right: 3%;">
                    <?php foreach ($addresses as $address) { ?>
                        <option value="<?php echo $address['add_id']; ?>" <?php if ($address['add_id'] == $address_id) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $address['label']; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="select_address" value="SELECT ADDRESS" class="boton">
                <input type="submit" name="set_default" value="SET AS DEFAULT" class="boton">
            </form>
        </center>

        <form method="post" action="">
            <center>
                <div class="form-group col-md-5">
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingRegion" placeholder="Region" required name="region" value="<?php echo isset($selected_address['region']) ? $selected_address['region'] : ''; ?>">
                        <label for="region" style="font-family:'Roboto';">Region</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingProvince" placeholder="Province" required name="province" value="<?php echo isset($selected_address['province']) ? $selected_address['province'] : ''; ?>">
                        <label for="province" style="font-family:'Roboto';">Province</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingCity" placeholder="City" required name="city" value="<?php echo isset($selected_address['city']) ? $selected_address['city'] : ''; ?>">
                        <label for="city" style="font-family:'Roboto';">City</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingBarangay" placeholder="Barangay" required name="barangay" value="<?php echo isset($selected_address['barangay']) ? $selected_address['barangay'] : ''; ?>">
                        <label for="barangay" style="font-family:'Roboto';">Barangay</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingStreet" placeholder="Street" required name="street" value="<?php echo isset($selected_address['street']) ? $selected_address['street'] : ''; ?>">
                        <label for="street" style="font-family:'Roboto';">Street</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingHouse_no" placeholder="House No." required name="house_no" value="<?php echo isset($selected_address['house_no']) ? $selected_address['house_no'] : ''; ?>">
                        <label for="house_no" style="font-family:'Roboto';">House No.</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingPostalCode" placeholder="Postal Code" required name="postal_code" value="<?php echo isset($selected_address['postal_code']) ? $selected_address['postal_code'] : ''; ?>">
                        <label for="postal_code" style="font-family:'Roboto';">Postal Code</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingCompany" placeholder="Company" name="company" value="<?php echo isset($selected_address['company']) ? $selected_address['company'] : ''; ?>">
                        <label for="company" style="font-family:'Roboto';">Company</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                        <input type="text" class="form-control" id="floatingRoom" placeholder="Room" name="room" value="<?php echo isset($selected_address['room']) ? $selected_address['room'] : ''; ?>">
                        <label for="room" style="font-family:'Roboto';">Room</label>
                    </div>
                    <input type="submit" name="submit" value="SAVE ADDRESS" class="boton">
                    <a href="add-address.php"><input value="BACK TO ADD ADDRESS" class="boton"></a>
                    </div>
        </form>
        </center>
        
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>

    <?php include("../includes/foot-pages.php"); ?>
</body>

</html>