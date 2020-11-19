<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: login.php");
    exit;
}

$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'quizdbase');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h1 class="text-center text-primary"> TECHNOFEST QUIZ </h1>

<h2 class="text-center"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, Welcome to our site.</h2>
<div class="col-lg-8 m-auto d-block">
<div class="card">
<h3 class="text-center card-header"><?php echo htmlspecialchars($_SESSION["username"]); ?>, Best of luck for the quiz </h3>
</div>
<br>
<form action="checked.php" method="POST">
<?php
             for ($i=1;$i<11;$i++)
             {
             $q="select * from questions where qid=$i";
             $query= mysqli_query($con,$q);
             while($rows=mysqli_fetch_array($query))
             {
                 ?>
<div class="card">
<h5 class="card-header"><?php echo $i.".) ".$rows['question'] ?></h5>
<?php
                            $q="select * from answers where ans_id=$i";
                            $query= mysqli_query($con,$q);
                            while($rows=mysqli_fetch_array($query))
                            {
                                ?>



<div class="card-body">
<input type="radio" name="quizcheck[<?php echo $rows['ans_id'];?>]" value="<?php echo $rows['aid']; ?>">
<?php echo $rows['answer'];?>
</div>


<?php
                }
            }
            }
                    ?>
<input type="submit" name="submit"  value="Submit" class="btnbtn-success m-auto d-block "><br>
</form>
</div>
</div>
</div>
<br>

<div class="m-auto d-block">
<a href="logout.php" class="btnbtn-danger m-auto">Sign Out</a>
</div>
<br>

<div >
<h6 class="text-center"> ©2020 TECHNOFEST OFFICIAL </h6>
</div>

</body>
</html>








