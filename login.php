<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link href="style/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<form action="authenticate.php" method="post" class="form-horizontal">
  <div class="row">
    <div class="col-sm-12" style="text-align:center;">
      <h1>Please login to enjoy our math game.</h1>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="control-label col-sm-4">Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control" name="email" placeholder="Email"/>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="control-label col-sm-4">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="password" placeholder="Password"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-4">
      <button type="submit" style="float:right;" class="btn btn-primary">Login</button>
    </div>
  </div>
  </form>
  <div class="row">
    <div class="col-sm-6">
      <?php
        if (isset($_GET["msg"])) {
          echo $_GET["msg"];
        }
      ?>
    </div>
  </div>

<?php include("include/footer.php"); ?>
