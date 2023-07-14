<?php
include "koneksi.php";

// untuk fungsi di file create.php
if(isset($_POST['create_schedule'])) {
    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['desc']);
    $bg = $_POST['bg-color'];

    $insert = mysqli_query($conn, "INSERT INTO schedule_type (title, desc_short, bg_color) VALUES ('$title','$desc','$bg')");

    if($insert) {
        ?>
        <script>
            document.location="index.php?create=success";
        </script>
        <?php
    }

// untuk fungsi di file create_subchedule.php

// jika tidak ditambahkan date dan short description
} else if(isset($_POST['create_subschedule'])) {
    $id_type = $_POST['id_type'];
    $title = htmlspecialchars($_POST['title']);
    $bg = $_POST['bg-color'];

        $insert = mysqli_query($conn, "INSERT INTO subschedule (id_type, title, bg_color) VALUES ('$id_type','$title','$bg')");

    if($insert) {
        ?>
        <script>
            document.location="my_schedule.php?create=success&id_type=<?=$id_type?>";
        </script>
        <?php
    }

// jika ditambahkan date dan short description
} else if(isset($_POST['create_subschedule_add'])) {
    $id_type = $_POST['id_type'];
    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['desc']);
    $date = htmlspecialchars($_POST['date']);
    $bg = $_POST['bg-color'];

    // jika tanggal tidak diisi
    if($date == "") {

        $insert = mysqli_query($conn, "INSERT INTO subschedule (id_type, title, desc_short, bg_color) VALUES ('$id_type','$title','$desc','$bg')");

    // jika deskripsi tidak diisi 
    } else if($desc == "") {

        $insert = mysqli_query($conn, "INSERT INTO subschedule (id_type, title, bg_color, date) VALUES ('$id_type','$title','$bg','$date')");

    // jika tanggal dan deskripsi tidak diisi
    } else if($date == "" && $desc == "") {

        $insert = mysqli_query($conn, "INSERT INTO subschedule (id_type, title, bg_color) VALUES ('$id_type','$title','$bg')");

    // jika diisi semua 
    } else {

        $insert = mysqli_query($conn, "INSERT INTO subschedule (id_type, title, desc_short, bg_color, date) VALUES ('$id_type','$title','$desc','$bg','$date')");

    }


    if($insert) {
        ?>
        <script>
            document.location="my_schedule.php?create=success&id_type=<?=$id_type?>";
        </script>
        <?php
    }

// fungsi untuk file add.php

// jika tombol add ditekan
} else if(isset($_POST['add'])) {
    $id_type = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];

    $insert = mysqli_query($conn, "INSERT INTO jadwal (id_type, id_subschedule) VALUES ('$id_type','$id_subschedule')");

    if($insert) {
        ?>
        <script>
            document.location="add.php?id_type=<?=$id_type?>&id_subschedule=<?=$id_subschedule?>";
        </script>
        <?php
    }

// jika tombol delete ditekan
} else if(isset($_POST['delete'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $id_type = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];

    $delete = mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal' AND id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($delete) {
        ?>
        <script>
            document.location="add.php?id_type=<?=$id_type?>&id_subschedule=<?=$id_subschedule?>";
        </script>
        <?php
    }

// jika tombol done ditekan
} else if(isset($_POST['add_jadwal'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $id_type = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];
    $schedule = $_POST['schedule'];
    $hour_1 = $_POST['hour_1'];
    $hour_2 = $_POST['hour_2'];
    $desc = $_POST['desc_short'];

    $update = mysqli_query($conn, "UPDATE jadwal SET jadwal='$schedule', jam_1='$hour_1', jam_2='$hour_2', desc_short='$desc' WHERE id_jadwal='$id_jadwal' AND id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($update) {
        ?>
        <script>
            document.location="add.php?id_type=<?=$id_type?>&id_subschedule=<?=$id_subschedule?>";
        </script>
        <?php
    }

// jika ingin menghapus field yang sudah diisi
} else if(isset($_GET['delete-field'])) {
    $id_jadwal = $_GET['id_jadwal'];
    $id_type = $_GET['id_type'];
    $id_subschedule = $_GET['id_subschedule'];

    $delete = mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal' AND id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($delete) {
        ?>
        <script>
            document.location="add.php?id_type=<?=$id_type?>&id_subschedule=<?=$id_subschedule?>";
        </script>
        <?php
    }

// untuk fungsi edit pada file my_schedule.php

// untuk mengedit judul
} else if(isset($_POST['edit-title'])) {
    $id_type  = $_POST['id_type'];
    $title = htmlspecialchars($_POST['title']);

    $update = mysqli_query($conn, "UPDATE schedule_type SET title='$title' WHERE id_type='$id_type'");

    if($update) {
        ?>
        <script>
            document.location="my_schedule.php?id_type=<?=$id_type?>";
        </script>
        <?php
    }

// untuk mengedit desc short
} else if(isset($_POST['edit-desc'])) {
    $id_type  = $_POST['id_type'];
    $desc = htmlspecialchars($_POST['desc']);

    $update = mysqli_query($conn, "UPDATE schedule_type SET desc_short='$desc' WHERE id_type='$id_type'");

    if($update) {
        ?>
        <script>
            document.location="my_schedule.php?id_type=<?=$id_type?>";
        </script>
        <?php
    }

// fungsi edit untuk file add.php

// untuk edit title
} else if(isset($_POST['edit-title-sub'])) {
    $id_type  = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];
    $title = htmlspecialchars($_POST['title']);

    $update = mysqli_query($conn, "UPDATE subschedule SET title='$title' WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($update) {
        ?>
        <script>
            document.location="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>";
        </script>
        <?php
    }

// untuk edit desc_short
} else if(isset($_POST['edit-desc-sub'])) {
    $id_type  = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];
    $desc = htmlspecialchars($_POST['desc']);

    $update = mysqli_query($conn, "UPDATE subschedule SET desc_short='$desc' WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($update) {
        ?>
        <script>
            document.location="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>";
        </script>
        <?php
    }

// untuk mengedit date pada
} else if(isset($_POST['edit-date-sub'])) {
    $id_type  = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];
    $date = htmlspecialchars($_POST['date']);

    $update = mysqli_query($conn, "UPDATE subschedule SET date='$date' WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($update) {
        ?>
        <script>
            document.location="add.php?id_subschedule=<?=$id_subschedule?>&id_type=<?=$id_type?>";
        </script>
        <?php
    }

// fungsi untuk file my_schedule_type.php

// jika user ingin mengedit bg-color
} else if(isset($_POST['edit-type-bg'])) {
    $id_type = $_POST['id_type'];
    $bg = $_POST['bg-color'];

    $update = mysqli_query($conn, "UPDATE schedule_type SET bg_color='$bg' WHERE id_type='$id_type'");

    if($update) {
        ?>
        <script>
            document.location="my_schedule_type.php";
        </script>
        <?php
    }

// jika user ingin menghapus schedule type
} else if(isset($_GET['delete-type'])) {
    $id_type = $_GET['id_type'];

    $delete_1 = mysqli_query($conn, "DELETE FROM schedule_type WHERE id_type='$id_type'");
    $delete_2 = mysqli_query($conn, "DELETE FROM subschedule WHERE id_type='$id_type'");
    $delete_3 = mysqli_query($conn, "DELETE FROM jadwal WHERE id_type='$id_type'");

    if($delete_3) {
        ?>
        <script>
            document.location="my_schedule_type.php";
        </script>
        <?php
    }

// fungsi untuk file my_subschedule.php

// jika user ingin edit background-color
} else if(isset($_POST['edit-type-bg-sub'])) {
    $id_type = $_POST['id_type'];
    $id_subschedule = $_POST['id_subschedule'];
    $bg = $_POST['bg-color'];

    $update = mysqli_query($conn, "UPDATE subschedule SET bg_color='$bg' WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($update) {
        ?>
        <script>
            document.location="my_subschedule.php?id_type=<?=$id_type?>";
        </script>
        <?php
    }

// jika user ingin menghapus subschedule
} else if(isset($_GET['delete-sub'])) {
    $id_type = $_GET['id_type'];
    $id_subschedule = $_GET['id_subschedule'];

    $delete_1 = mysqli_query($conn, "DELETE FROM subschedule WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");
    $delete_2 = mysqli_query($conn, "DELETE FROM jadwal WHERE id_type='$id_type' AND id_subschedule='$id_subschedule'");

    if($delete_2) {
        ?>
        <script>
            document.location="my_subschedule.php?id_type=<?=$id_type?>";
        </script>
        <?php
    }
}
?>