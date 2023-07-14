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

    <div class="container-fluid p-4">
        <a href="index.php" class="text-light"><i class="bi bi-box-arrow-left"></i></a>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <form action="t_act.php" method="POST">
                    <div class="mb-2">
                        <input type="text" name="title" class="form-control form-control-sm" placeholder="create a title for your schedule" maxlength="25" required autofocus>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="desc" class="form-control form-control-sm" placeholder="create a short description for your schedule" maxlength="80" required>
                    </div>
                    <div class="mb-2">
                        <small class="form-label">Choose background-color for your schedule</small>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="color" class="input-color form-control form-control-sm" id="exampleColorInput" name="bg-color" value="#563d7c" title="Choose your color" required>
                                </div>
                            </div>
                    </div>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-light btn-sm" name="create_schedule" value="Done">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- akhiran col-md-8 -->
            <div class="col-md-3">
                <div class="mt-2">
                    <p>Quotes of the day</p>
                    <p class="fst-italic">"If you love life, don't waste time, for time is what life is made up of"</p>
                    <p class="mt-3"> - Bruce Lee</p>
                </div>
            </div>
        </div> <!-- akhiran row pertama -->
    </div> <!-- akhiran container pertama -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>