<div class="container mt-5">

    <div class="row">

        <h1 class="mt-4">ulasan</h1>
        <div class="card">

            <div class="row">
                <div class="col-md-12">
                    <a href="?page=ulasan_tambah" class="btn btn-primary" style="color:white;">+ tambah data</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <section class="" id="buku">

                            <h2 class="text-center">Ulasan Buku Search</h2>
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
                                                    url: "search_ulasan.php",
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

                        </section>

                    </table>
            </div>
        </div>
    </div>
</div>
</div>