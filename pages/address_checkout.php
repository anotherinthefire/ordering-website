<?php

if (isset($_POST['update_address'])) {
  updateAddress($conn, $user_id, $address_data);
  function updateAddress($conn, $user_id, $address_data) {
    $sql = "UPDATE address SET 
      room = '{$address_data['room']}',
      company = '{$address_data['company']}',
      house_no = '{$address_data['house_no']}',
      street = '{$address_data['street']}',
      barangay = '{$address_data['barangay']}',
      city = '{$address_data['city']}',
      province = '{$address_data['province']}',
      postal_code = '{$address_data['postal_code']}',
      region = '{$address_data['region']}'
      WHERE user_id = '{$user_id}' AND `set` = 1";
  
    if (mysqli_query($conn, $sql)) {
        header('Location: checkoutsummary.php');
      exit();
    } else {
        header("Location: checkout.php");
        exit();
    }
  }
}