<?php
    include 'header.php';
?>

    <link rel="stylesheet" href="checkout.css">
 
   <br><br><br><br>
   

    

<br>
<br>
<br>
    <style>
      /* Flex container styles */
      .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: auto;
        height: auto;
      }

      /* Article styles */
      article {
        width: 48%;
        padding: 1rem;
        margin-bottom: 2rem;
        background-color:#f8f9fa;
      }

      /* Title styles */
      h1 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
      }

      /* Article content styles */
      p {
        font-size: 1.2rem;
        line-height: 1.5;
        margin: 0;
      }
    </style>
  
  
    <div class="container" style="font-family: 'Montserrat Alternates', sans-serif;">
      <article>
            <h2><b>Contact Information
</b></h2>

<form>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter your email" required="">
  </div>
  
  <div class="row mb-3" style="
    left: auto;
">
    <div class="col">
      <label for="first-name" class="form-label">First Name</label>
      <input type="text" class="form-control" id="first-name" placeholder="Enter your first name" required="">
    </div>
    <div class="col">
      <label for="last-name" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="last-name" placeholder="Enter your last name" required="">
    </div>
  </div>
  
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" placeholder="Enter your address" required="">
  </div>
  
  <div class="row mb-3" style="
    left: auto;
">
    <div class="col">
      <label for="postal-code" class="form-label">Postal Code</label>
      <input type="text" class="form-control" id="postal-code" placeholder="Enter your postal code" required="">
    </div>
    <div class="col">
      <label for="city" class="form-label">City</label>
      <input type="text" class="form-control" id="city" placeholder="Enter your city" required="">
    </div>
    <div class="col">
      <label for="region" class="form-label">Region</label>
      <input type="text" class="form-control" id="region" placeholder="Enter your region" required="">
    </div>
  </div>
  
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required="">
  </div>
  
  <div class="mb-3">
    <label for="note" class="form-label">Note</label>
    <textarea class="form-control" id="note" rows="3" placeholder="Enter a note" style="height: 186px;"></textarea>
  </div>
  
</form>
      </article>
      <article>
        <h1><b>Order Summary</b></h1>
        <table style="width: 500px;">
    <tbody><tr style="
    border-top-width: 3px;
    border-bottom-width: 3px; border-color:black;
">
        <td><br><p style="float: left; padding: 0 20px 20px 0;"><img src="kata.jpg" alt="Italian Trulli"></p><br><b>Katekyo - Hitman Reborn</b>
            <p>XL,Green</p>
            <p>P1000</p></td> 
            <td></td>
            <td><span class="plus">x1</span></td>
    </tr>
<tr style="
    border-top-width: 3px;
    border-bottom-width: 3px; border-color:black;
">
        <td><br><p style="float: left; padding: 0 20px 20px 0;"><img src="kata.jpg" alt="Italian Trulli"></p><br><b>Katekyo - Hitman Reborn</b>
            <p>XL,Green</p>
            <p>P1000</p></td> 
            <td></td>
            <td><span class="plus">x1</span></td>
    </tr><tr style="
    border-top-width: 3px;
    border-bottom-width: 3px; border-color:black;
">
        <td>
           <b>Delivery fee</b>
            <p>Standard Delivery</p>
            <p>P150</p>
    </td></tr><tr style="
    border-top-width: 3px;
    border-bottom-width: 3px; border-color:black;
">
        <td>
           <b>Select Payment Method </b><br>
              <br><select name="deliverymode" id="mod">
                <option value="volvo">Cash On Delivery</option>
                <option value="saab">Gcash</option>
                <option value="opel">Online Payment</option>
              </select>
              <br> <br></td>
    </tr></tbody></table>
      </article>
    </div>
  




<p style="position:absolute; right:150px; font-family: 'Montserrat Alternates', sans-serif;"><b>Total:</b>P2000.00</p> <br><br>

<button type="button" class="btn btn-light" style="color: 5876CE; font-family: 'Montserrat Alternates', sans-serif; border: 2px black; position:absolute; right:270px;">Continue Shoping </button> 
  <button type="button" class="btn btn-Primary" style="background-color: 5876CE; font-family: 'Montserrat Alternates', sans-serif; border: 2px solid black; position:absolute; right:150px;">Checkout</button> 

<br><br><br><br> 






<?php
    include 'footer.php';
?>
    