<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <style type="text/css">


#login {
    padding-top: 15%;
}
#login .form-wrap {
    width: 30%;
    margin: 0 auto;
}
#login h1 {
    color: #1fa67b;
    font-size: 25px;
    text-align: center;
    font-weight: bold;
    padding-bottom: 20px;
}
#login .form-group {
    margin-bottom: 15px;
}


#login .btn.btn-custom {
    font-size: 14px;
    margin-bottom: 20px;
}


/*    --------------------------------------------------
    :: Inputs & Buttons
    -------------------------------------------------- */
.form-control {
    color: #212121;
}
.btn-custom {
    color: #fff;
    background-color: #1fa67b;
}
.btn-custom:hover,
.btn-custom:focus {
    color: #fff;
}

  </style>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                <h1>Login Administrator</h1>
                    <form role="form" action="proseslogin.php" method="post" id="login-form" >
                        <div class="form-group">
                             <input name="username" id="username" type="input" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
                        </div>
                        <div class="form-group">
                           <input name="password" id="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="LOGIN">
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>