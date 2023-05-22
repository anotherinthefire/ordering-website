<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime X Gaming Guild &#x2223; FAQs</title>
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-VT3P5BQDqjS04NHZlq0Q+BoNrxYlGyB+kuBpQc1wWnI+JW9UzvTJ2ph+1Pjw9ZXzUvZQn4jq3MJ9O+x6u0L8ww==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-J6qa4849blE6F1rUdhBQIzJ3sMOBO99U/ixeTpwg37sVZ4LbYBk5DiCEmULY6+z" crossorigin="anonymous"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-L0AD4QLJYhtgAX/DL8+LzdjGfSPyfjLYNXbx7/uegH+qbg7E9edNp2fRXQq9J3i5ZjUGICsE52CqfUabLpMq+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="../assets/css/faqs.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap');

        /* START CONTACT */
        h1 {
            text-align: center;
            font-family: 'Montserrat alternates';

        }

        form {
            
            max-width: 40%;
            margin: 0 auto;
        }

        input[type=text],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 1px 1px 5px grey;
            width: 100%;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #3e8e41;
        }

        .notification{
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }
        /* END CONTACT */
    </style>
</head>

<body>
    <?php include "../includes/nav-pages.php"; ?>
    <!-- START OF HOME SECTION -->
    <section class="homepic">
        <section class="" id="home">
            <img src="https://i.ibb.co/ZKQtnfD/axgg-banner2.png" class="homepic img-fluid">
        </section>
    </section>
    
    <!-- FAQ Accordion Start -->
    <section id="faq" class="py-5">
        <h2 class="my-5 text-center" style="font-family:'Montserrat Alternates';">Frequently Asked Questions</h2>
        <div class="container">
            <div class="accordion w-75 mx-auto" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            - How do I place an order?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Go to the SHOP section & browse through the selection of available products</li>
                                <li>Add & manage desired items in your cart</li>
                                <li>Please double-check the items in your cart for faster order transaction</li>
                                <li>Proceed to checkout and fill out the form before your screen</li>
                                <li>Choose modes of payment: Debit Card / Credit Card or Gcash</li>
                                <li>Wait for an email confirmation from our online sales rep that your order is received and they will call you to confirm the order</li>
                                <li>After the call, pay your order and send it through our email or Facebook page </li>
                                <li>Wait for an email confirmation that your orders will be prepared and will be shipped soon</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            - What courier do you use when shipping items within the country?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            We use LBC for transactions outside Cavite, and Techno protocol Logistic Services for orders within Cavite.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            - How much is the shipping fee?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            The shipping fee will depend on the quantity of your order(s) and its weight. The starting price of the shipping fee will be 169PHP and will increase depending on the weight of your item(s) and location.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            - How many days will it take to receive my order(s)?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            You can expect to have your orders after 7-14 working days from the date of receiving your email confirmation.
                            You may track your orders through the email confirmation sent to you.
                            <br>
                            <strong>**your orders may take longer than expected come peak season**</strong>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            - I still have not received my shipment. What do I do with this?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            What we can do is help you guys track your parcels and monitor their current location once the orders are shipped out. - but with regards to the date on when you’ll receive the items ordered is already out of our control. For this matter, you can verify and ask for a follow-up of the parcel with the chosen courier.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            - Where's the size chart?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            We have a page for the size chart of every category.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            - What is your Return & Exchange Policy?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Generally, only defective items or wrong order/s sent by our staff may be exchanged. But reasonable cases like wrong sizing can be an exception to the rule. You can find the detailed Return/Exchange policy (here).
                            Once orders are confirmed, we cannot cancel them anymore. We do not accept refunds.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            - Where is your Flagship Store located? Store hours?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Queens Row West Subdivision, Blk 18 Lot 3 Astro Drive, Corner Violeta, Cavite, Philippines
                            Store hours: Monday to Sunday - 12nn to 8 pm.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Accordion End -->
    <div class="notification"></div>
    <!-- START OF CONTACT SECTION -->
    <center>
        <section id="contact">
            <div id="question-section">
                <p>Any other questions?</p>
                <button onclick="showForm()" class="btn btn-success">Yes</button>
                <button onclick="hideForm()" class="btn btn-success">No</button>
            </div>
    </center>
    <form id="contact-form" action="../actions/process_contact_form.php" method="post" style="display:none;">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required style="width:100%;">
<br>
        <label for="name">Subject:</label><br>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" oninput="countCharacters()" required></textarea>
        <div id="char-count"></div>

        <input type="submit" value="Submit">
    </form>
    
    

    <!-- check if message was sent successfully and show alert message -->
    <?php if (isset($_GET['success']) && $_GET['success'] == '1') : ?>
        <script>
            $(document).ready(function() {
                // append success message to notification element
                $('.notification').append('<div class="alert alert-success">Message sent successfully! We will contact you soon</div>');

                // show toastr notification
                toastr.success('Message sent successfully! We will contact you soon');
            });
        </script>
    <?php elseif (isset($_GET['success']) && $_GET['success'] == '0') : ?>
        <script>
            $(document).ready(function() {
                // append error message to notification element
                $('.notification').append('<div class="alert alert-danger">Message sending failed. Please try again later.</div>');

                // show toastr notification
                toastr.error('Message sending failed. Please try again later.');
            });
        </script>
    <?php endif; ?>


    <br />
    <br />
    <br />
    </section>
    <!-- END OF CONTACT SECTION -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <?php include "../includes/foot-pages.php"; ?>
    <script>
        function countCharacters() {
            var message = document.getElementById("message").value;
            var count = message.length;
            var charCount = document.getElementById("char-count");
            charCount.innerHTML = count + "/500";

            if (count > 500) {
                charCount.style.color = "red";
                document.getElementById("message").value = message.slice(0, 500);
            } else {
                charCount.style.color = "black";
            }
        }

        function showForm() {
            document.getElementById("question-section").style.display = "none";
            document.getElementById("contact-form").style.display = "block";
        }


        function hideForm() {
            document.getElementById("question-section").innerHTML = "Thank you for contacting us. If you have any questions in the future, feel free to reach out!";
        }
    </script>
</body>

</html>