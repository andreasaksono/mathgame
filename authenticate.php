<?php
session_start();
extract($_POST);
  if (strcmp($email, "a@a.a")==0 && strcmp($password, "aaa")==0) {
    $_SESSION["authenticated"]=1;
    header("Location: index.php");
  }
  else
    $msg_login = "Incorrect username/password.";
  header("Location: login.php?msg=$msg_login")
?>

<?php include("include/footer.php");?>
