<?php
include "koneksi.php";

if(isset($_GET['id_type'])) {
    $id_type = $_GET['id_type'];
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

  </head>
<body>

    <div class="container-fluid p-4">
        <a href="my_schedule.php?id_type=<?=$id_type?>" class="text-light"><i class="bi bi-box-arrow-left"></i></a>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <form action="t_act.php" method="POST">

                    <!-- untuk input yang tidak kelihatan -->
                        <input type="hidden" name="id_type" value="<?=$id_type?>">
                    <!--  -->

                    <div class="mb-2">
                        <input type="text" name="title" class="form-control form-control-sm" placeholder="create a title for your sub schedule" maxlength="25" required autofocus>
                    </div>
                    <div class="mb-2">
                        <small class="form-label">Choose background-color for your sub schedule</small>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="color" class="form-control form-control-sm" id="exampleColorInput" value="#563d7c" title="Choose your color" style="cursor:pointer;" name="bg-color" required>
                                </div>
                            </div>
                    </div>
                    <div class="mb-2">
                        <div class="form-label text-danger">
                            <small>You can add date and short description for your subschedule if you need, <a href="create_subschedule.php?id_type=<?=$id_type?>&add=yes" class="text-success">Yes, i need</a></small>
                        </div>
                    </div>

                    <!-- jika user ingin menambahkan form tersebut -->
                    <?php
                    if(isset($_GET['add'])) {
                        if($_GET['add'] == "yes") {
                            ?>
                                <div class="mb-2">
                                    <input type="text" name="desc" class="form-control form-control-sm" placeholder="create a short description for your sub schedule" maxlength="80" value="">
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="date" class="date form-control form-control-sm" maxlength="80" title="Enter the date if you need" style="cursor:pointer;" value="" id=datepicker>
                                </div>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="d-grid">
                                                <input type="submit" class="btn btn-outline-light btn-sm" name="create_subschedule_add" value="Done">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        ?>
                                <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-outline-light btn-sm" name="create_subschedule" value="Done">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                    ?>
            </div> <!-- akhiran col-md-8 -->
            <div class="col-md-3">
                <div class="mt-2">
                    <p>Quotes of the day</p>
                    <p class="fst-italic">"Better three hours too soon than a minute too late"</p>
                    <p class="mt-3">- William Shakespeare</p>
                </div>
            </div>
        </div> <!-- akhiran row pertama -->
    </div> <!-- akhiran container pertama -->

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js">
    </script>

    <script>
    
    $(".date").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
    }).trigger("change")

</script>

</body>
</html>