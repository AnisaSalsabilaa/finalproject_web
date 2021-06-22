<!DOCTYPE html>
<html>

<head>
  <title>Masuk</title>
  <link rel="icon" href="logo_1.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link href="all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script src="bootstrap.min.js"></script>
  <script src="jquery-1.11.1.min.js"></script>
  <style>
    h1 {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      color: #2aa7e2;
      font-weight: 900;
    }

    h4 {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      color: #2aa7e2;
      font-weight: 500;
    }

    h5 {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      color: black;
      font-weight: 200;
      text-align: center;
      font-size: 25px;
    }
  </style>
</head>

<body>
  <br>
  <h1 style='color:aliceblue'>Clean-Up Laundry</h1>
  <h4 style="color:aliceblue;text-align:center">Masuk untuk memulai sistem</h4>

  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
      echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    }
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">

            <h5>Silakan Login</h5>
            <center><img src="logo_1.png"></center>
            <hr>
            <form class="form-signin" action="cek_login.php" method="post">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                <label for="password">Password</label>
              </div>

              <hr class="my-4">
              <input type="submit" class="tombol_login" value="LOGIN">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>