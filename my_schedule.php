<?php
include "koneksi.php";

if(isset($_GET['id_type'])) {
    $id_type = $_GET['id_type'];

    $query = mysqli_query($conn, "SELECT * FROM schedule_type WHERE id_type='$id_type'");
    $data = mysqli_fetch_array($query);
} else if(isset($_GET['edit'])) {
    $id_type = $_GET['id_type'];

    $query = mysqli_query($conn, "SELECT * FROM schedule_type WHERE id_type='$id_type'");
    $data = mysqli_fetch_array($query);
}
?>

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

    <!-- css khusus untuk hover -->
    <style>
        .title-subschedule {
            border-bottom:1px solid rgb(10, 10, 10);
        }
        .edit-title {
            margin-top: -6.3px;
            border-bottom: 1px solid #fff;
        }
        .edit-title-1 {
            border: none;
            outline: none;
            background: rgb(10, 10, 10);
            color: #fff;
            text-align: center;
            width: 100%;
            font-size: 22px;
            font-family: "Slabo 27px", serif;
        }
        .edit-desc {
            margin-top: -4.5px;
            border-bottom: 1px solid #fff;
        }
        .edit-desc-1 {
            border: none;
            outline: none;
            background: rgb(10, 10, 10);
            color: #fff;
            text-align: center;
            width: 100%;
            font-size: 13px;
            font-family: "Slabo 27px", serif;
            font-style: italic;
        }
    </style>

  </head>
<body>

    <div class="container-fluid p-4">
        <a href="index.php" class="text-light"><i class="bi bi-box-arrow-left"></i></a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-between mt-3">
                    <div class="col-md-6 text-center">
                        <?php
                        if(isset($_GET['edit'])) {
                        if($_GET['edit'] == "title") {
                            ?>
                            <form action="t_act.php" method="POST" class="edit-title mb-2">
                                <input type="hidden" name="id_type" value="<?=$id_type?>">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="edit-title-1" name="title" value="<?=$data['title']?>" maxlength="25" autofocus required>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="d-grid">
                                            <input type="submit" name="edit-title" class="btn btn-sm text-light" value="Done">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                        } else if($_GET['edit'] == "desc") {
                            ?>
                                <a href="my_schedule.php?id_type=<?=$id_type?>&edit=title" class="text-light">
                                <h4 class="title-subschedule"><?=$data['title']?></h4>
                                </a>
                            <?php
                        }
                        } else {
                            ?>
                                <a href="my_schedule.php?id_type=<?=$id_type?>&edit=title" class="text-light">
                                <h4 class="title-subschedule"><?=$data['title']?></h4>
                                </a>
                            <?php } ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <?php
                        if(isset($_GET['edit'])) {
                        if($_GET['edit'] == "desc") {
                            ?>
                            <form action="t_act.php" method="POST" class="edit-desc mb-2">
                                <input type="hidden" name="id_type" value="<?=$id_type?>">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" class="edit-desc-1" name="desc" value="<?=$data['desc_short']?>" maxlength="80" autofocus required>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="d-grid">
                                            <input type="submit" name="edit-desc" class="btn btn-sm text-light" value="Done">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                        } else if($_GET['edit'] == "title") {
                            ?>
                                <a href="my_schedule.php?id_type=<?=$id_type?>&edit=desc" class="text-light">
                                <small class="title-subschedule fst-italic">"<?=$data['desc_short']?>"</small>
                                </a>
                            <?php
                        }
                        } else {
                            ?>
                                <a href="my_schedule.php?id_type=<?=$id_type?>&edit=desc" class="text-light">
                                <small class="title-subschedule fst-italic">"<?=$data['desc_short']?>"</small>
                                </a>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">
                        <small class="keterangan-header text-start text-success">You can make a sub schedule here</small>
                    </div>
                    <hr>
                    <ul>
                        <li><a href="create_subschedule.php?id_type=<?=$id_type?>" class="text-light">Create a new sub schedule</a></li>
                        <li>
                            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="cursor:pointer;"><i class="bi bi-gear-fill"></i></a>

                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title text-dark fw-bold" id="offcanvasWithBothOptionsLabel">Setting <i class="bi bi-gear-fill"></i></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body text-dark">
                                <p><a href="my_schedule.php?id_type=<?=$id_type?>&search=yes" class="text-dark">Search <i class="ms-2 bi bi-search"></i></a></p>
                                <hr>
                                <p><a href="my_subschedule.php?id_type=<?=$id_type?>" class="text-dark">My subschedule <i class="ms-2 bi bi-calendar2-check"></i></a></p>
                                <hr>
                            </div>
                            </div>
                        </li>
                    </ul>
                    <hr>
                    <div class="row">
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
                                    <p class="bg-success p-2 text-light">New subschedule created successfully!</p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    </div>

                    <!-- untuk menampilkan sesuatu yang ada dalam data -->
                    <?php
                    $data_subschedule = mysqli_query($conn, "SELECT * FROM subschedule WHERE id_type='$id_type' ORDER BY id_subschedule ASC");

                    if(isset($_POST['search'])) {

                        $keyword = $_POST['keyword'];

                        $data_subschedule = mysqli_query($conn, "SELECT * FROM subschedule WHERE title LIKE '%$keyword%' OR desc_short LIKE '%$keyword%' ORDER BY id_subschedule ASC");
                    }

                    while($result = mysqli_fetch_array($data_subschedule)) {
                    ?>
                    <div class="col-md-6 mb-2">
                        <a href="add.php?id_subschedule=<?=$result['id_subschedule']?>&id_type=<?=$id_type?>">
                            <div class="card" style="background-color:<?=$result['bg_color']?>;">
                                <div class="c-h card-header" title="Date format = years - month - day">
                                    <p class="mb-0 text-center"><?=$result['title']?></p>
                                </div>
                                <div class="c-b card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-auto">
                                            <?php
                                            if($result['desc_short'] == ""){
                                                echo "";
                                            } else {
                                            ?>
                                            <p>Note : <?=$result['desc_short']?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-auto">
                                            <?php
                                            if($result['date'] == "") {
                                                echo "";
                                            } else {
                                            ?>
                                            <small>Date : <?=$result['date']?></small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr class="mt-0">

                                    <table class="table border text-light text-center">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Schedule</td>
                                                <td colspan="2">Time</td>
                                            </tr>
                                        </thead>
                                        <tbody class="">

                                    <!-- pengulangan -->
                                    <?php
                                    $subjadwal = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_type='$id_type' AND id_subschedule='$result[id_subschedule]'");
                                    $no=0;
                                    while($jadwal = mysqli_fetch_array($subjadwal)) {

                                        if($jadwal['jadwal'] == "") {
                                            echo "";
                                        } else {
                                            $no++
                                    ?>

                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$jadwal['jadwal']?></td>
                                                <td><?=$jadwal['jam_1']?></td>
                                                <td><?=$jadwal['jam_2']?></td>
                                            </tr>

                                    <?php } } ?>

                                        </tbody>
                                    </table> <!-- akhiran row dalam pengulangan -->

                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div> <!-- akhiran col-md- 10 -->
        </div> <!-- akhiran row -->
    </div> <!-- akhiran container pertama -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>