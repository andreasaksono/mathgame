<?php
session_start();
if(!isset($_SESSION["authenticated"])) {
  header("Location: login.php");
}
if(!isset($total)) {
  $total = 0;
}
if(!isset($score)) {
  $score = 0;
}
extract($_POST);
if ( isset($first)
    && isset($operation)
    && isset($second)
    && isset($user_ans))
    {
      $msg = "";
      if (!is_numeric($user_ans)) {
        $msg = "You must enter a number for your answer.";
      } else
      switch ($operation) {
      case "+":
      $answer = ($first + $second);
      if ($answer == $user_ans) {
        $msg = "Correct!";
        $score++;
      } else {
        $msg = "Incorrect.($first + $second) is ($answer)";
      }
      $total++;
      break;
      case"-":
      $answer = ($first - $second);
      if ($answer == $user_ans) {
        $msg = "Correct!";
        $score++;
      } else {
        $msg = "Incorrect.($first - $second) is ($answer)";
      }
      $total++;
      break;
    }
  }
  $first_number = rand(0,20);
  $second_number = rand(0,20);
  $int_oper = rand(1,2);
  $str_oper = "";

  switch ($int_oper) {
    case 1:
    $str_oper = "+";
    break;
    case 2:
    $str_oper = "-";
    break;
  }
?>

<form action="index.php" method="post" role="form" class="form-horizontal">
  <div class="row">
    <div class="form-group">
      <div class="col-sm-offset-8">
        <a href="logout.php" class="btn btn-default">Logout</a>
      </div>
      <?php include("include/header.php");?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-8 col-xs-offset-4">
      <label><?php echo $first_number?></label>
      <label><?php echo $str_oper?></label>
      <label><?php echo $second_number?></label>
    </div>
  </div>
  <div class="hidden-row">
    <input type="hidden" name"first_number" value="<?php echo $first_number;?>"/>
    <input type="hidden" name="operator" value="<?php echo $str_oper;?>"/>
    <input type="hidden" name="second_number" value="<?php echo $second_number;?>"/>
    <input type="hidden" name="total" value="<?php echo $total;?>"/>
    <input type="hidden" name="score" value="<?php echo $score;?>"/>
  </div>
  <div class="row">
    <div class="form-group">
        <div class="col-sm-4 col-xs-offset-4">
          <input type="text" class="form-control" name="answer" placeholder="Enter answer"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <div class="col-sm-2 col-xs-offset-3">
          <button type="submit" style="float:right;" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
    </form>
    <hr/>
    <div class="row">
      <div class="col-sm-8 col-xs-offset-4">
        <?php echo $msg;?>
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <div class="col-sm-offset-4"> Score:<?php echo "$score/$total";?>
      </div>
    </div>
  </div>


<?php include("include/footer.php");?>
