<?php 
session_start();
if (empty($_SESSION['username'])){
    header('location: ../daftar.php');    
} else {
    include "../koneksi.php";
    $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard Customer</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
  <style type="text/css">
  body {
    overflow-x: hidden;
  }
  .fa {
    padding-right: 5px;
  }
  .top-nav .fa.fa-angle-down {
    padding-left: 10px;
  }
  .content-header {
    background: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 15px 0;
    margin-bottom: 20px;
  }
  .content-header h3 {
    margin: 0px;
    color: #555;
    font-weight: 400;
    margin-bottom: 5px !important;
  }
  #persentase .panel.panel-default {
    text-align: center;
    color: #666;
  }
  #persentase .panel.panel-default .panel-heading i {
    font-size: 80px;
    color: #555;
    padding-bottom: 10px;
  }
  #persentase .panel.panel-default .panel-heading .jumlah {
    font-size: 30px;
  }
  #persentase .panel.panel-default .panel-body {
    padding: 10px;
  }

  @media(min-width:768px) {
    body {
        margin-top: 50px;
    }
    /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
}

#wrapper {
    padding-left: 0;    
}

#page-wrapper {
    width: 100%;        
    padding: 0;
    background-color: #fff;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 225px;
    }

    #page-wrapper {
        padding: 22px 10px;
    }
}

/* Top Navigation */
.navbar-inverse {
    background-color: #1ebfae;
    border: none;
}
.top-nav {
    padding: 0 15px;
}

.top-nav>li {
    display: inline-block;
    float: left;
}

.top-nav>li>a {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 20px;
    color: #fff;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {
    color: #fff;
    background-color: #1cbbaa !important;
}

.top-nav>.open>.dropdown-Menu {
    float: left;
    position: absolute;
    margin-top: 0;
    /*border: 1px solid rgba(0,0,0,.15);*/
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
    white-space: normal;
}

/* Side Navigation */

@media(min-width:768px) {
    .side-nav {
        position: fixed;
        top: 60px;
        left: 225px;
        width: 225px;
        margin-left: -225px;
        border: none;
        border-radius: 0;
        overflow-y: auto;
        background-color: #f4f4f4;
        box-shadow: inset -3px 0px 8px -4px rgba(0, 0, 0, 0.07);
        bottom: 0;
        overflow-x: hidden;
        padding-bottom: 40px;
    }

    .side-nav>li>a {
        width: 225px;
        border-bottom: 1px solid #eaeaea;
        letter-spacing: 0.3px;
        font-weight: 400;
        font-size: 13px;
    }

    .side-nav li a:hover,
    .side-nav li a:focus {
        outline: none;
        color: #333 !important;
        background-color: #f9f9f9 !important;
    }
}

.side-nav>li>ul {
    padding: 0;
    border-bottom: 1px solid #dbdbdb;
}
.navbar-inverse .navbar-nav>li>a {
    color: #555;
}
.side-nav>li>ul>li>a {
    display: block;
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    color: #555555;  
}

.side-nav>li>ul>li>a:hover {
    color: #333;
}

.navbar .nav > li > a > .label {
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  top: 14px;
  right: 6px;
  font-size: 10px;
  font-weight: normal;
  min-width: 15px;
  min-height: 15px;
  line-height: 1.0em;
  text-align: center;
  padding: 2px;
}

.navbar .nav > li > a:hover > .label {
  top: 10px;
}

.navbar-brand {
    padding: 5px 15px;
}
  	
  </style>
</head>
  <body>
 
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                <!-- <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO"> -->
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
                     
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['fullname']; ?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                <?php
                    $kodesaya = $_SESSION['user_id'];
                    $query2="select * from customer where kd_cus='$kodesaya' limit 1";
                    $hasil1=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    ?>
                    <?php 
                     
                     while($data1=mysqli_fetch_array($hasil1))
                    { ?>
                    <li><a href="profil.php?hal=edit&kd_cus=<?php echo $data1['kd_cus'];?>"><i class="fa fa-fw fa-user"></i> Profil</a></li>
                    <?php   
              } 
              ?>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Keluar</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation Menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="index.php"><i class="fa fa-fw fa fa-dashboard"></i>Dashboard</a>
                </li> 
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../daftar.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>