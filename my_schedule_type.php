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

    <!-- untuk style khusus -->
    <style>
        .edit-bg:hover {
            border-bottom: 1px solid #fff;
        }
    </style>
    
  </head>
<body>

    <div class="container-fluid p-4">
        <a href="index.php" class="text-light"><i class="bi bi-box-arrow-left"></i></a>
    </div>

    <div class="container">
        <table class="table text-light text-center table-hover table-striped border">
            <thead class="fw-bold">
                <tr>
                    <td>No</td>
                    <td>My schedule type</td>
                    <td>Background color</td>
                    <td>Option</td>
                </tr>
            </thead>
            <tbody>
                <!-- untuk pengulangan sekaligus pengambilan nilai array -->
                <?php
                include "koneksi.php";

                $query = mysqli_query($conn, "SELECT * FROM schedule_type ORDER BY id_type DESC");
                $no = 0;
                while($data = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tr style="background-color:<?=$data['bg_color']?>; color: #fff;">
                    <td><?=$no?>.</td>
                    <td><?=$data['title']?></td>
                    <td>
                        <?php

                        // jika tombol atau bg_color di klik
                        if(isset($_GET['edit'])) {

                            $id_type = $_GET['id_type'];

                            if($_GET['edit'] == "bg" && $id_type == $data['id_type']) {
                                ?>
                                <form action="t_act.php" method="post" class="form-edit-bg border-bottom">
                                    <input type="hidden" name="id_type" value="<?=$data['id_type']?>">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="row justify-content-between">
                                                <div class="col-md-auto">
                                                    <input type="color" name="bg-color" value="<?=$data['bg_color']?>" style="cursor: pointer;" class="edit-bg-1">
                                                </div>
                                                <div class="col-md-auto">
                                                    <input type="submit" name="edit-type-bg" class="btn btn-sm text-light" value="Done">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            } else if($_GET['edit'] == "bg" && $id_type != $data['id_type']) {
                                ?>
                                <a href="my_schedule_type.php?id_type=<?=$data['id_type']?>&edit=bg" class="edit-bg text-light"><?=$data['bg_color']?></a>
                                <?php
                            }

                        // jika user tidak mengklik tombol apa apa
                        } else {
                            ?>
                            <a href="my_schedule_type.php?id_type=<?=$data['id_type']?>&edit=bg" class="edit-bg text-light"><?=$data['bg_color']?></a>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a href="t_act.php?id_type=<?=$data['id_type']?>&delete-type=yes" class="btn btn-sm text-danger btn-light shadow-sm" onclick="return confirm('Are you sure you want delete this field?')" title="Delete this field?"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>