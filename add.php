<?php
include "koneksi.php";

if(isset($_GET['id_subschedule'])) {
    $id_subschedule = $_GET['id_subschedule'];
    $id_type = $_GET['id_type'];

    $query = mysqli_query($conn, "SELECT * FROM subschedule WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");
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
    <link rel="stylesheet" href="style_n.css">

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Abril+Fatface&family=Concert+One&family=Dancing+Script&family=Fredoka&family=Fredoka+One&family=Handlee&family=Lobster&family=PT+Serif&family=Patrick+Hand&family=Patrick+Hand+SC&family=Peralta&family=Playfair+Display:wght@400;600&family=Reggae+One&family=Righteous&family=Roboto+Slab:wght@300&family=Slabo+27px&family=Source+Serif+Pro:ital,wght@0,300;1,200&family=Titan+One&family=Ultra&display=swap" rel="stylesheet">

    <!-- untuk icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- link date-picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({ 
            dateFormat: 'dd-mm-yy'
        }).val();
    } );
    </script>

    <title>Schedule</title>

    <!-- untuk logo di title -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <style>
        .edit-title {
            margin-top: -6.3px;
            border-bottom: 1px solid #fff;
        }
        .edit-title-1 {
            border: none;
            outline: none;
            background: transparent;
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
            width: 100%;
            font-size: 14px;
            font-family: "Slabo 27px", serif;
        }
        .edit-date {
            margin-top: -4.5px;
            border-bottom: 1px solid #fff;
        }
        .edit-date-1 {
            border: none;
            outline: none;
            background: rgb(10, 10, 10);
            color: #fff;
            width: 100%;
            font-size: 14px;
            font-family: "Slabo 27px", serif;
        }
    </style>

  </head>
<body>

    <div class="container-fluid p-4">
        <a href="my_schedule.php?id_type=<?=$id_type?>" class="text-light"><i class="bi bi-box-arrow-left"></i></a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4" style="background-color:<?=$data['bg_color']?>;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-center">
                            <?php

                            // jika tombol edit yang ditekan
                            if(isset($_GET['edit'])) {

                            // jika tombol title yang ditekan atau ingin mengedit judul
                            if($_GET['edit'] == "title") {
                                ?>
                                <form action="t_act.php" method="POST" class="edit-title">
                                    <input type="hidden" name="id_type" value="<?=$id_type?>">
                                    <input type="hidden" name="id_subschedule" value="<?=$id_subschedule?>">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="text" class="edit-title-1" name="title" value="<?=$data['title']?>" maxlength="25" autofocus required>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="d-grid">
                                                <input type="submit" name="edit-title-sub" class="btn btn-sm text-light" value="Done">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php

                            // jika tombol desc / date/ add-desc / add-date yang ditekan
                            } else if($_GET['edit'] == "desc" || $_GET['edit'] == "date" || $_GET['edit'] == "add-desc" || $_GET['edit'] == "add-date") {
                                ?>
                                    <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=title" class="text-light">
                                    <h4 class="title-subschedule mb-0"><?=$data['title']?></h4>
                                    </a>
                                <?php
                            } 

                            // jika tidak menekan tombol apa apa
                            } else {
                                ?>
                                    <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=title" class="text-light">
                                    <h4 class="title-subschedule mb-0"><?=$data['title']?></h4>
                                </a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: rgb(10, 10, 10);">

                        <?php

                        $jadwal_1 = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_type='$id_type' AND id_subschedule='$id_subschedule' ORDER BY id_jadwal ASC");

                        $jadwal_2 = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_type='$id_type' AND id_subschedule='$id_subschedule' ORDER BY id_jadwal ASC");

                        ?>

                        <div class="row justify-content-between mb-0">

                            
                            <div class="col-md-12 mb-2">
                                <?php
                                // cek apakah sudah ada desc dan date atau belum

                                // jika date dan desc belum ada semua
                                if($data['desc_short'] == "" && $data['date'] == "") {
                                    ?>
                                    <div class="text-center">
                                        <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=add-desc" class="text-success">Add short description? </a> <small class="">or</small> <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=add-date" class="text-success"> Add date?</a>
                                    </div>
                                    <?php

                                // jika hanya date yang kosong
                                } else if($data['date'] == "") {
                                    ?>
                                    <div class="text-center">
                                        <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=add-date" class="text-success">Add date?</a> <br>
                                    </div>
                                    <?php

                                // jika hanya desc yang kosong
                                } else if($data['desc_short'] == "") {
                                    ?>
                                    <div class="text-center">
                                        <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=add-desc" class="text-success">Add short description?</a> <br>
                                    </div>
                                    <?php
                                }

                                // tombol cencel
                                if(isset($_GET['edit'])) {
                                    if($_GET['edit'] == "add-desc" || $_GET['edit'] == "add-date") {
                                        ?>
                                        <div class="text-center">
                                            <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>" class="text-danger">Cencel</a> <br>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <!-- untuk bagian desc_short sekaligus form editnya -->
                            <div class="col-md-4">
                            <?php

                            // jika tombol edit ditekan
                            if(isset($_GET['edit'])) {

                            // jika desc yang mau diedit
                            if($_GET['edit'] == "desc" || $_GET['edit'] == "add-desc") {
                                ?>
                                <div class="card" style="background-color:<?=$data['bg_color']?>;">
                                    <div class="card-header">
                                        <small class="m-0 p-0">Note</small>
                                    </div>
                                    <div class="card-body fst-italic" style="background-color:rgb(10, 10, 10);">
                                        <form action="t_act.php" method="POST" class="edit-desc">
                                            <input type="hidden" name="id_type" value="<?=$id_type?>">
                                            <input type="hidden" name="id_subschedule" value="<?=$id_subschedule?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea type="text" class="edit-desc-1" name="desc" maxlength="150" col="30" autofocus> <?=$data['desc_short']?> </textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-grid text-center">
                                                        <input type="submit" name="edit-desc-sub" class="btn btn-sm text-light" value="Done">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php

                            // jika tombol title yang ditekan
                            } else if($_GET['edit'] == "title" || $_GET['edit'] == "date" || $_GET['edit'] == "add-date") {

                                if($data['desc_short'] == ""){
                                    echo "";
                                } else {

                                ?>
                                <div class="card" style="background-color:<?=$data['bg_color']?>;">
                                    <div class="card-header">
                                        <small class="m-0 p-0">Note</small>
                                    </div>
                                    <div class="card-body fst-italic" style="background-color:rgb(10, 10, 10);">
                                        <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=desc" class="text-light">
                                        <small class="title-subschedule"><?=$data['desc_short']?></small>
                                    </div>
                                    </a>
                                </div>
                                <?php
                                }
                            }
                            } else {

                                if($data['desc_short'] == "") {
                                    echo "";
                                } else {

                                ?>
                                <div class="card" style="background-color:<?=$data['bg_color']?>;">
                                    <div class="card-header">
                                        <small class="m-0 p-0">Note</small>
                                    </div>
                                    <div class="card-body fst-italic" style="background-color:rgb(10, 10, 10);">
                                        <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=desc" class="text-light">
                                        <small class="title-subschedule"><?=$data['desc_short']?></small>
                                    </div>
                                    </a>
                                </div>
                                <?php
                                }
                            }
                            ?>
                            </div>

                            <!-- untuk bagain date sekaligus form editnya -->
                            <div class="col-md-4">
                            <?php
                            // jika ingin mulai mengedit
                            if(isset($_GET['edit'])) {

                            // jika tombol date yang ditekan
                            if($_GET['edit'] == "date" || $_GET['edit'] == "add-date") {
                                ?>
                                <form action="t_act.php" method="POST" class="edit-date">
                                    <input type="hidden" name="id_type" value="<?=$id_type?>">
                                    <input type="hidden" name="id_subschedule" value="<?=$id_subschedule?>">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" class="edit-date-1" name="date" value="<?=$data['date']?>" maxlength="80" id="datepicker" autofocus>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="d-grid">
                                                <input type="submit" name="edit-date-sub" class="btn btn-sm text-light" value="Done">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php

                            // jika tombol title yang ditekan
                            } else if($_GET['edit'] == "title" || $_GET['edit'] == "desc" || $_GET['edit'] == "add-desc") {

                                if($data['date'] == "") {
                                    echo "";
                                } else {
                                ?>
                                    <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=date" class="text-light">
                                    <small class="title-subschedule float-end">Date : <?=$data['date']?></small>
                                    </a>
                                <?php
                                }
                            }
                            // jika tidak menekan tombol apa apa
                            } else {

                                if($data['date'] == "") {
                                    echo "";
                                } else {

                                ?>
                                    <a href="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>&edit=date" class="text-light">
                                    <small class="title-subschedule float-end">Date : <?=$data['date']?></small>
                                    </a>
                            <?php } } ?>
                            </div>
                        </div>

                        <hr>

                        <h4 class="text-center">Your schedule</h4>

                        <?php

                        $jadwal_3 = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_type='$id_type' AND id_subschedule='$id_subschedule' AND jadwal != '' ORDER BY id_jadwal ASC");

                        $hasil = mysqli_num_rows($jadwal_3);

                        if($hasil == 0) {
                            ?><div class="text-center"><small class="text-secondary">You don't have a schedule</small></div> <?php
                        } else {

                        ?>
                        <table class="table text-center text-light border table-striped table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <td rowspan="2">No</td>
                                    <td rowspan="2">Schedule</td>
                                    <td colspan="2">Time schedule</td>
                                    <td rowspan="2">Description</td>
                                    <td rowspan="2">Option</td>
                                </tr>
                                <tr>
                                    <td>Mulai</td>
                                    <td>Berakhir</td>
                                </tr>
                            </thead>

                            <tbody class="table-dark">
                        <?php
                        $no=0;
                        while($cek = mysqli_fetch_array($jadwal_1)) {

                            if($cek['jadwal'] == "") {
                                echo "";
                            } else {
                                $no++
                        ?>

                        <tr>
                            <td><?=$no?>.</td>
                            <td><?=$cek['jadwal']?></td>
                            <td><?=$cek['jam_1']?></td>
                            <td><?=$cek['jam_2']?></td>
                            <td>
                                <?php
                                if($cek['desc_short'] == "") {
                                    echo "-";
                                } else {
                                    echo $cek['desc_short'];
                                }
                                ?>
                            </td>
                            <td><a href="t_act.php?id_type=<?=$id_type?>&id_subschedule=<?=$id_subschedule?>&id_jadwal=<?=$cek['id_jadwal']?>&delete-field=yes" class="text-danger"><i class="bi bi-dash-circle"></i></a></td>
                        </tr>

                        <?php } } } ?>

                        </tbody>

                        </table>

                        <!-- untuk akhiran card-body -->
                        </div>

                        <!-- untuk awalan card-footer -->
                        <div class="card-footer">
                                    <!-- untuk menambahkan fiel -->
                                    <form action="t_act.php" method="POST">
                                        <!-- untuk input hidden -->
                                        <input type="hidden" name="id_type" value="<?=$id_type?>">
                                        <input type="hidden" name="id_subschedule" value="<?=$id_subschedule?>">
                                        <!--  -->
                                        <div class="row justify-content-end">
                                            <div class="col-md-2">
                                                <div class="d-grid">
                                                    <input type="submit" class="btn btn-sm text-light border-bottom" name="add" value="Add schedule +" title="Add field">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                        <!-- untuk indokator pengisian field -->
                        <?php
                        $jadwal = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_type='$id_type' AND id_subschedule='$id_subschedule' AND jadwal=''");
                        $hitung = mysqli_num_rows($jadwal);

                        if($hitung == 0) {
                            echo "";
                        } else {
                        ?>

                        <div class="row justify-content-center mt-2">

                        <!-- untuk penunjuk pengisian -->
                        <div class="col-md-7">
                            <div class="form-label text-center">Your Schedule</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label text-center">Time schedule</div>
                        </div>

                        <!-- pengulangan -->
                        <?php

                        }
                        $no = 0;
                        while($result = mysqli_fetch_array($jadwal_2)) {

                            if($result['jadwal'] == "") {
                                $no++

                        ?>
                        <form action="t_act.php" method="POST">

                        <div class="row justify-content-end">

                        <!-- untuk input hidden -->
                        <input type="hidden" name="id_jadwal" value="<?=$result['id_jadwal']?>">
                        <input type="hidden" name="id_type" value="<?=$id_type?>">
                        <input type="hidden" name="id_subschedule" value="<?=$id_subschedule?>">
                        <!--  -->

                        <!-- untuk nomer -->
                        <div class="col-md-1">
                            <p><?=$no?>.</p>
                        </div>

                        <!-- untuk kegiatan -->
                            <div class="col-md-7 mb-2">
                                <input type="text" name="schedule" class="form-control form-control-sm" placeholder="write your schedule here" value="<?=$result['jadwal']?>" required autofocus>
                            </div>

                        <!-- untuk jam pertama -->
                            <div class="col-md-2 text-center mb-2">
                                <input type="text" class="form-control form-control-sm" name="hour_1" 
                                <?php
                                if($result['jam_1'] == "") {
                                    ?> value="07:00" <?php
                                    
                                } else {
                                    ?> value="<?=$result['jam_1']?>" <?php
                                }
                                ?>
                                required>
                            </div>

                            <!-- untuk jam kedua -->
                            <div class="col-md-2 text-center mb-2">
                                <input type="text" class="form-control form-control-sm" name="hour_2"
                                <?php
                                if($result['jam_2'] == "") {
                                    ?> value="08:00" <?php
                                    
                                } else {
                                    ?> value="<?=$result['jam_2']?>" <?php
                                }
                                ?>
                                required>
                            </div>

                            <!-- untuk keterangan -->
                            <div class="col-md-9 mb-2">
                                <input type="text" class="form-control form-control-sm" name="desc_short" placeholder="Short description for your schedule">
                            </div>

                            <div class="col-md-1 mb-2">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-sm btn-outline-success" name="add_jadwal" value="Done">
                                </div>  
                            </div>

                            <div class="col-md-1 mb-2">
                                <div class="d-gri">
                                    <input type="submit" class="btn btn-sm btn-outline-danger" name="delete" value="Delete">
                                </div>
                            </div>

                            <div class="col-md-11">
                                <hr class="mt-2">
                            </div>

                        </div> <!-- akhiran row dalam form -->
                    </form> <!-- form berakhir -->
                    <?php } } ?>
                    </div>
                </div>
            </div> <!-- akhiran col-md-10 -->
        </div> <!-- akhiran row pertama -->
    </div> <!-- akhiran container pertama -->

</body>
</html>