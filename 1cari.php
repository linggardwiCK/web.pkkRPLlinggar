<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="page-section bg-primary" id="buku">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <h2>Live Data Search</h2>
                    <input type="text" id="search" class="form-control" autocomplete="off"
                        placeholder="Search by title...">
                </div>
                <div id="searchresult"></div>
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

                <script>
                    $(document).ready(function () {
                        $('#search').keyup(function () {
                            var query = $(this).val();
                            
                            if (query != '') {
                                $.ajax({
                                    url: "search.php",
                                    method: "POST",
                                    data: { query: query },
                                    success: function (data) {
                                        $('#searchresult').html(data);
                                    }
                                });
                            } else {
                                $("#searchresult").css("dispaly", "none");
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </section>

</body>

</html>