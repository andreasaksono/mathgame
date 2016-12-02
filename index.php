<?php
  session_start();
  if(!isset($_SESSION["authenticated"])) {
    header("Location: login.php");
  }

  if (!isset($total)) {
    $total = 0;
  }
  if (!isset($score)) {
    $score = 0;
  }
  extract($_POST);
  if ( isset($first) && isset($operation) && isset($second) && isset($user_ans) )
  {
    $msg = "";
    if ( !is_numeric($user_ans) ) {
      $msg = "Your answer must be a number.";
    } else if ($int_oper == 1) {
      $answer = $first + $second;
      if ($answer == $user_ans) {
        $msg = "Correct! Good job.";
        $score++;
      } else {
        $msg = "Incorrect. $first + $second is $answer";
      }
      $total++;
    } else {
      $answer = $first - $second;
      if ($answer == $user_ans) {
        $msg = "Correct! Good job.";
        $score++;
      } else {
        $msg = "Incorrect. $first - $second is $answer";
      }
      $total++;
    }
  }
  $first_number = rand(0,20);
  $second_number = rand(0,20);
  $int_oper = rand(1,2);
  $str_oper = "";
    if($int_oper == "1") {
      $str_oper = "+";
  } else {
      $str_oper = "-";
  }

include("include/header.php");

?>

<div class="container">
<form action="index.php" method="post" role="form" class="form-horizontal">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
      <h1>Math Game</h1>
    </div>
    <div class="col-sm-4">
      <a href="logout.php" class="btn btn-default btn-sm">Logout</a>
    </div>
  </div>
  <div class="row">
    <label class="col-sm-3 col-sm-offset-3"><?php echo $first_number;?></label>
    <label class="col-sm-2"><?php echo $str_oper;?></label>
    <label class="col-sm-2"><?php echo $second_number;?></label>
  </div>

  <input type="hidden" name"first_number" value="<?php echo $first_number;?>" />
  <input type="hidden" name="operator" value="<?php echo $str_oper;?>" />
  <input type="hidden" name="second_number" value="<?php echo $second_number;?>" />
  <input type="hidden" name="total" value="<?php echo $total;?>" />
  <input type="hidden" name="score" value="<?php echo $score;?>" />

  <div class="row">
    <div class="form-group">
      <div class="col-sm-4 col-xs-offset-4">
        <input type="text" class="form-control" name="answer"
        placeholder="Enter answer" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2 col-xs-offset-3">
        <button type="submit" style="float:right;" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>
</div>

<hr />

<div class="row">
  <div class="col-sm-8 col-xs-offset-4">
    <?php echo $msg;?>
  </div>
</div>
<div class="row">
  <div class="col-sm-offset-4">Score: <?php echo "$score / $total";?>
  </div>
</div>
<?php include("include/footer.php");?>
