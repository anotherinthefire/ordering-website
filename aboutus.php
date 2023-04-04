<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AXGG | About Us</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- External Css File -->
    <link rel="stylesheet" href="styles/aboutus.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <!-- alert toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <?php include("includes/nav.php"); ?>
    <!-- START OF HOME SECTION -->
    <section class="homepic">
        <img src="https://i.ibb.co/ZKQtnfD/axgg-banner2.png" class="homepic img-fluid" style="width: 100%;" />
    </section>

    <!-- END OF HOME SECTION -->
    <br />
    <!-- START OF ABOUT SECTION -->
    <section class="about">
        <p id="par">
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum."
        </p>
    </section>
    <!-- END OF ABOUT SECTION -->
    <br />
    <!-- START OF MAP AND ADDRESS SECTION -->
    <section class="maa">
        <div class="flex-wrapper">
            <div class="left-column">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1366.280631725708!2d120.98708011641786!3d14.40263535797108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d372bb4f4cf3%3A0xabb58bbb5e05f3f2!2sAXGG!5e0!3m2!1sen!2sph!4v1679796658538!5m2!1sen!2sph" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="right-column">
                <h6 id="h6">Contact Details</h6>
                <p>
                    <i class="bi bi-geo-alt-fill"></i>&nbsp; &nbsp;Queens Row West
                    Subdivision,<br />
                    &nbsp; &nbsp; &nbsp; &nbsp;Blk 18 Lot 3 Astro Drive, Corner
                    Violeta,<br />
                    &nbsp; &nbsp; &nbsp; &nbsp;Cavite, Philippines, 4101
                </p>
                <p>
                    <i class="bi bi-envelope-fill"></i>&nbsp; &nbsp;axggstore@gmail.com
                </p>
            </div>
        </div>
    </section>

    <!-- END OF MAP AND ADDRESS SECTION -->
    <br />
    <br />
    <br />
    <!-- START OF CONTACT SECTION -->
    <section id="contact">
        <h1>Keep in Touch</h1>
        <form action="proc/process_contact_form.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Submit">
        </form>
        <!-- check if message was sent successfully and show alert message -->
        <?php if (isset($_GET['success']) && $_GET['success'] == '1') : ?>
            <script>
                $(document).ready(function() {
                    toastr.success('Message sent successfully!We will contact yoi soon');
                });
            </script>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == '0') : ?>
            <script>
                $(document).ready(function() {
                    toastr.error('Message sending failed. Please try again later.');
                });
            </script>
        <?php endif; ?>
        <br />
        <br />
        <br />
        <!-- END OF CONTACT SECTION -->

        <!-- Bootstrap Javascript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <?php include("includes/footer.html") ?>
</body>

</html>