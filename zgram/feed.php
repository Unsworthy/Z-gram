<?php 
session_start();
require('database.php');

$sqlFetchStatus = "SELECT * FROM status LEFT JOIN user ON status.user_id = user.id ORDER BY status.created_at DESC";
$resultStatus = $mysqli->query($sqlFetchStatus);

//var_dump($resultStatus->fetch_assoc());
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Zgram</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <link href="styles/pricing.css" rel="stylesheet">
</head>

<body>


    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                    <span class="fs-4">Zgram</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="py-2 link-body-emphasis text-decoration-none" href="profile.php">Profile</a>
                </nav>
            </div>

        </header>

        <main class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>What's on your mind?</h4>
                    <form action="process/feed_process.php" method="POST" class="form">
                        <div class="mb-3">
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary float-end" value="Post">
                        </div>
                    </form>
                </div>

            </div>

<div class="row">
    <div class="col-lg-12">
<?php
if($resultStatus->num_rows > 0){
    // Status ada
    //looping data status
    while($row =$resultStatus->fetch_assoc()){
        echo " <p>
            <b>$row[username]</b> <br>
           $row[content]<br>
            <a href=''>Like</a> - <a href=''>Comment</a>
        </p>
        <hr>";
    }
} else {
    // tidak ada
    echo "<center>tidak ada status untuk ditampilkan</center>";
}
?>

    </div>
</div>
        </main>


    </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>