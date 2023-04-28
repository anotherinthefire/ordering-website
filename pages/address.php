<!DOCTYPE html>
<html>

<head>
    <title>Address</title>
</head>

<body>
    <h1>Address</h1>
    <form method="post" action="../actions/insert-address.php">
        <div>
            <input type="hidden" id="region_select" name="region_text">
            <select id="region" name="region"></select><br>

            <input type="hidden" id="province_select" name="province_text">
            <select id="province" name="province"></select><br>

            <input type="hidden" id="city_select" name="city_text">
            <select id="city" name="city"></select><br>

            <input type="hidden" id="barangay_select" name="barangay_text">
            <select id="barangay" name="barangay"></select><br>

            <input type="text" placeholder="Street" name="street" required>

            <input type="text" placeholder="House No." name="house_no" required>

            <input type="text" placeholder="Postal Code" name="postal_code" required><br>

            <input type="text" placeholder="Company" name="company">

            <input type="text" placeholder="Room" name="room">

            <input type="text" placeholder="Label" name="label" required>
        </div>
        <input type="submit" value="Submit">
    </form>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
    <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
    <script type="text/javascript">
        var my_handlers = {

            fill_provinces: function() {
                var region_select = document.getElementById("region_select");
                var region_text = $("#region option:selected").text();
                region_select.value = region_text;

                var region_code = $(this).val();
                $('#province').ph_locations('fetch_list', [{
                    "region_code": region_code
                }]);
            },

            fill_cities: function() {
                var province_select = document.getElementById("province_select");
                var province_text = $("#province option:selected").text();
                province_select.value = province_text;

                var province_code = $(this).val();
                $('#city').ph_locations('fetch_list', [{
                    "province_code": province_code
                }]);
            },

            fill_barangays: function() {
                var city_select = document.getElementById("city_select");
                var city_text = $("#city option:selected").text();
                city_select.value = city_text;

                var city_code = $(this).val();
                $('#barangay').ph_locations('fetch_list', [{
                    "city_code": city_code
                }]);
            }
        };

        $(function() {
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);

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
</body>

</html>