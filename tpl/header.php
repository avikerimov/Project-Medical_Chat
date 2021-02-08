<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/0e36be5d21.js" crossorigin="anonymous"></script>
    <!-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> -->
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="js/previewImage.js"></script>
    <link rel="stylesheet" href="<?= $back; ?>css/homeStyle.css">
    <link rel="stylesheet" href="<?= $back; ?>css/registrationStyle.css">
    <link rel="stylesheet" href="<?= $back; ?>css/chatStyle.css">
    <title>
        <?php if(isset($page_title)): ?>
        <?= $page_title . ' | Medical Chat'; ?>
        <?php else: ?>
        <?= 'Medical Chat'; ?>
        <?php endif; ?>
    </title>
</head>
<body>
    <header>        
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: <?= $colorNavbar ?? '#f70945' ?>;">
            <div class="container">
                <a class="navbar-brand" href="<?= $back ?>">Medical <i class="fa fa-heartbeat"></i> Chat</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= $back ?>about.php">About</a>
                        </li>
                        <li class="nav-item">
                            
                            <a class="nav-link" href="<?= $back ?>chats.php">Q/A Chat <i class="fas fa-comment-medical"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $back ?>store.php">Store <i class="fa fa-medkit"></i></a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>                            
                        </li> -->
                    </ul>
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <?php if( !isset($_SESSION['user_id']) ): ?>
                            <li class="nav-item">
                             <a class="nav-link" href="<?= $back ?>login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $back ?>register.php">Register</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">                                
                                <a class="nav-link" href="<?= $back ?>profile.php" style="float:left">
                                <!-- Convert all applicable characters to HTML entities -->
                                Hello, <?= htmlentities($_SESSION['user_name']) ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $back ?>logout.php" class="nav-link">Logout</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
 
    