<!doctype html>
<html lang="en">
 
<head>
    <title><?= $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/snackbar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
</head>
 
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="">CodeIgniter</a>
          <?php if (session()->has('isLogin')) { ?>
            <div class="form-inline">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link text-white text-capitalize dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= session('username') ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url() ?>/logout">Logout</a>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
    </nav>