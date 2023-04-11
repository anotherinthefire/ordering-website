<!DOCTYPE html>
<html>
<head>
    <title>AXGG</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include("includes/nav.php"); ?>
    <div id="content">
        <?php include("pages/home.php"); ?>
    </div>
    <?php include("includes/footer.php"); ?>
    <script>
        $(document).ready(function() {
            $("a").click(function(e) {
                e.preventDefault();
                var page = $(this).attr("href");
                if (page != '#home') {
                    $("#content").load(page);
                }
                $("a").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>