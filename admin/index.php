<!DOCTYPE html>
<html lang="en">

<head>
  <title>Allon Fasaha</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login_css/bootstrap.min.css">
  <link rel="stylesheet" href="login_css/style.css">
  <script src="login_css/jquery.min.js"></script>
  <script src="login_css/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#myModal").modal('show');
    });
  </script>
  <script>
    $('.message a').click(function () {
      $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
    });
  </script>
</head>

<body>
  <div class="login-page">
    <div class="form">
      <h4> <img src="./logo.png" width="200" height="" style="margin-top:-30px" /></h4>
      <h1></h1>

      <form class="login-form" action="login_script.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="password" required />
        <input id="login" type="submit" name="login" value="Login" />
      </form>
    </div>
  </div>
  <footer style="text-align:center; margin-top:-30px; margin-bottom:30px;">
				<img src="./stm.png" width="200" height="" style="margin-top:-30px" />
  </footer>

</body>

</html>