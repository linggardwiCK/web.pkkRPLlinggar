<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-2">
        <div class="container">
            <div class="row">
                <section class="page-section " id="buku">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-4 gx-lg-5 justify-content-center">
                            <div class="col-lg-8 text-center bg-primary form-control">
                                <h2 class="text-white mt-0">Cari Buku Impian Kalian</h2>
                                <h2>Live Data Search</h2>

                               
                                <input type="text" id="search" class="form-control" autocomplete="off" placeholder="Search by title...">

                            </div>
                            <div id="searchresult" class="mt-4"></div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

                            <div class="container" style="min-width: 18rem; ">

                                <script>
                                    $(document).ready(function () {
                                        $('#search').keyup(function () {
                                            var query = $(this).val();

                                            if (query != '') {
                                                $.ajax({
                                                    url: "search.php",
                                                    method: "POST",
                                                    data: {
                                                        query: query
                                                    },
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
                                <script>
                                    // JavaScript function to trigger search when a category is selected
                                    function searchBooks() {
                                        // Get the selected category ID
                                        var selectedCategoryId = document.getElementById("id_kategori").value;

                                        // Redirect to the search page with the selected category ID as a query parameter
                                        window.location.href = "index.php?id_kategori=" + selectedCategoryId;
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
    </div>
    </div>


</body>

</html>