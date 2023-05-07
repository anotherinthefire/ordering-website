<html>
    <head>
        <title>Anime X Gaming Guild &#x2223; Address</title>
        <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;700;900&display=swap');
        form{
            margin-bottom: 4%;
            margin-right: 0.25%;
        }
        .whole{
            width: 100%;
            height: 100vh;
        }
        .all-products-btn{
            text-align: center;
        }
        .all-products-btn button{
            width: 9%;
            height: 6%;
            background-color: #5876CE;
            color: white;
            border: none;
            font-size: 14px;
            font-family: 'Roboto', sans-serif;
            font-weight:bold;           
        }
        .all-products-btn button:hover{ 
            background-color: #404759;
        }
        </style>
    </head>
    <body>
        <?php include("../includes/nav-pages.php"); ?>
        <section class="whole">
        <div class="address">
            <h1 style="padding-top:15vh; font-family: 'Montserrat Alternates'; font-weight: 600; text-align: center;">Add Address</h1>
            <br>
            <form method="post" action="../actions/insert-address.php">
                <div class="form-row" style="justify-content: center;">
                  <div class="form-group col-md-2">
                    <label for="inputEmail4">Street</label>
                    <input type="street" class="form-control" id="inputEmail4" name="street">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPassword4">House No.</label>
                    <input type="houseno" class="form-control" id="inputPassword4" name="house_no">
                  </div>
                  <div class="form-group col-md-1">
                    <label for="inputPassword4">Postal Code</label>
                    <input type="number" class="form-control" id="inputPassword4" name="postal_code" required>
                  </div>
                </div>
                
                <div class="form-row" style="justify-content: center;">
                    <div class="form-group col-md-2">
                      <label for="inputEmail4">Company</label>
                      <input type="street" class="form-control" id="inputEmail4" name="company">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputRoom4">Room</label>
                      <input type="room" class="form-control" id="inputRoom4" name="room">
                    </div>
                    <div class="form-group col-md-1">
                      <label for="inputPassword4">Label</label>
                      <input type="text" class="form-control" id="inputPassword4" name="label" required>
                    </div>
                </div>

                <br>
                <center>
                <div class="form-group col-md-5">
                    <input type="hidden" id="region_select" name="region_text" >
                    <select id="region" name="region" class="form-control">
                        <option value="empty">----------SELECT REGION----------</option>
                    </select><br>
    
                    <input type="hidden" id="province_select" name="province_text">
                    <select id="province" name="province" class="form-control">
                        <option value="empty">---------SELECT PROVINCE---------</option>
                    </select><br>
    
                    <input type="hidden" id="city_select" name="city_text">
                    <select id="city" name="city" class="form-control">
                        <option value="empty">-------------SELECT CITY-------------</option>
                    </select><br>
    
                    <input type="hidden" id="barangay_select" name="barangay_text">
                    <select id="barangay" name="barangay" class="form-control">
                        <option value="empty">---------SELECT BARANGAY---------</option>
                    </select><br>
                </div>
            </center>
            <section class="all-products-btn">
                <button type="submit">ADD NEW ADDRESS</button>
                <a href="edit-address.php"><button type="button">EDIT ADDRESS</button></a>
                <a href="profile.php"><button type="button">BACK TO PROFILE</button></a>
            </section>
            </form>
        </div>
        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
    <script type="text/javascript">
        var my_handlers = {
            fill_provinces: function () {
                var region_select = document.getElementById("region_select");
                var region_text = $("#region option:selected").text();
                region_select.value = region_text;

                var region_code = $(this).val();
                $('#province').ph_locations('fetch_list', [{
                    "region_code": region_code
                }]);
            },

            fill_cities: function () {
                var province_select = document.getElementById("province_select");
                var province_text = $("#province option:selected").text();
                province_select.value = province_text;

                var province_code = $(this).val();
                $('#city').ph_locations('fetch_list', [{
                    "province_code": province_code
                }]);
            },

            fill_barangays: function () {
                var city_select = document.getElementById("city_select");
                var city_text = $("#city option:selected").text();
                city_select.value = city_text;

                var city_code = $(this).val();
                $('#barangay').ph_locations('fetch_list', [{
                    "city_code": city_code
                }]);
            },

            select_barangay: function () {
                var barangay_select = document.getElementById("barangay_select");
                var barangay_text = $("#barangay option:selected").text();
                barangay_select.value = barangay_text;
            }
        };

        $(function () {
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);
            $('#barangay').on('change', my_handlers.select_barangay);

            $('#region').ph_locations({
                'location_type': 'regions'
            });
            $('#province').ph_locations({
                'location_type': 'provinces'
            });
            $('#city').ph_locations({
                'location_type': 'cities'
            });
            $('#barangay').ph_locations({
                'location_type': 'barangays'
            });
            $('#region').ph_locations('fetch_list');

            function select_barangay() {
                var barangay_select = document.getElementById("barangay_select");
                var barangay_text = $("#barangay option:selected").text();
                barangay_select.value = barangay_text;
            }
        });
        $(function () {
            var my_handlers = {
                fill_provinces: function () {
                    var region_select = document.getElementById("region_select");
                    var region_text = $("#region option:selected").text();
                    region_select.value = region_text;
                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{
                        "region_code": region_code
                    }]);
                },

                fill_cities: function () {
                    var province_select = document.getElementById("province_select");
                    var province_text = $("#province option:selected").text();
                    province_select.value = province_text;

                    var province_code = $(this).val();
                    $('#city').ph_locations('fetch_list', [{
                        "province_code": province_code
                    }]);
                },

                fill_barangays: function () {
                    var city_select = document.getElementById("city_select");
                    var city_text = $("#city option:selected").text();
                    city_select.value = city_text;

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{
                        "city_code": city_code
                    }]);
                },

                select_barangay: function () {
                    var barangay_select = document.getElementById("barangay_select");
                    var barangay_text = $("#barangay option:selected").text();
                    barangay_select.value = barangay_text;
                }
            };

            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);
            $('#barangay').on('change', my_handlers.select_barangay);

            $('#region').ph_locations({
                'location_type': 'regions'
            });
            $('#province').ph_locations({
                'location_type': 'provinces'
            });
            $('#city').ph_locations({
                'location_type': 'cities'
            });
            $('#barangay').ph_locations({
                'location_type': 'barangays'
            });

            $('#region').ph_locations('fetch_list');
        });
        </script>
            <?php include("../includes/foot-pages.php"); ?>
    </body>

</html>