<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link css eksternal (sendiri) -->
    <link rel="stylesheet" href="style.css">

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Abril+Fatface&family=Concert+One&family=Dancing+Script&family=Fredoka&family=Fredoka+One&family=Handlee&family=Lobster&family=PT+Serif&family=Patrick+Hand&family=Patrick+Hand+SC&family=Peralta&family=Playfair+Display:wght@400;600&family=Reggae+One&family=Righteous&family=Roboto+Slab:wght@300&family=Slabo+27px&family=Source+Serif+Pro:ital,wght@0,300;1,200&family=Titan+One&family=Ultra&display=swap" rel="stylesheet">

    <!-- untuk icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Schedule</title>

    <!-- untuk logo di title -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  </head>
  <body>

    <div class="in container">
        <div class="row justify-content-center">
            <div class="col-md-10 p-3">
                <div class="row justify-content-between mt-3">
                    <div class="col-md-7">
                        <h4 class="text-center">
                            Make your time more efficient
                        </h4>   
                    </div>
                    <div class="col-md-2">
                        <div class="gear">
                            <a href="" class="fs-5" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-gear-fill"></i></a>

                            <div class="offcanvas offcanvas-end text-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasRightLabel" class="fw-bold">Setting <i class="bi bi-gear-fill"></i></h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p><a href="index.php?search=yes" class="text-dark">Search <i class="ms-2 bi bi-search"></i></a></p>
                                    <hr>
                                    <p><a href="my_schedule_type.php" class="text-dark">My schadule type <i class="ms-2 bi bi-calendar2-check"></i></a></p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- akhiran row -->
                <small class="keterangan-header text-success">You can write down your daily schedule or activities on certain days</small>
                <hr class="mt-0">
                <ul>
                    <li><a href="create.php">Create a new schadule type</a></li>
                </ul>
                <hr class="">
                <div class="row">

                <!-- untuk notif -->
                    <?php
                    if(isset($_GET['search'])) {
                        if($_GET['search'] == "yes") {
                            ?>
                            <form action="" method="POST">
                                <div class="row justify-content-center mb-3">
                                    <div class="col-md-6">
                                        <input type="text" name="keyword" class="form-control form-control-sm" placeholder="Find something" autofocus>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-grid">
                                            <input type="submit" name="search" class="btn btn-sm btn-outline-light" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                    } else if(isset($_GET['create'])) {
                        if($_GET['create'] == "success") {
                            ?>
                            <div class="row justify-content-center">
                                <div class="col-md-8 text-center">
                                    <p class="bg-success p-2 text-light">New schedule created successfully!</p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <!-- untuk memunculkan jadwal -->
                    <?php
                    include "koneksi.php";

                    $query = mysqli_query($conn, "SELECT * FROM schedule_type ORDER BY id_type DESC");

                    if(isset($_POST['search'])) {

                        $keyword = $_POST['keyword'];

                        $query = mysqli_query($conn, "SELECT * FROM schedule_type WHERE title LIKE '%$keyword%' OR desc_short LIKE '%$keyword%' ORDER BY id_type DESC");
                    }

                    while($data = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-4 mb-2">
                        <a href="my_schedule.php?id_type=<?=$data['id_type']?>">
                            <div class="card" style="background-color:<?=$data['bg_color']?>;">
                                <div class="c-h card-header">
                                    <p class="mb-0 text-center"><?=$data['title']?></p>
                                </div>
                                <div class="c-b card-body">
                                    <p class="text-center"><?=$data['desc_short']?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div> <!-- akhiran col-md-10  -->
        </div> <!-- akhiran row setelah container -->
    </div> <!-- akhiran container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>