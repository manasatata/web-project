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
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style type="text/css">
	.animateuse
	{
		animation: leelaanimate 0.5% infinite;
	}
    @keyframes leelaanimate{
	0%{color: red},
	10%{color: yellow},
	20%{color: blue},
	40%{color: green},
	50%{color: pink},
	60%{color: orange},
	80%{color: black},
	100%{color: brown}
    }
</style>
</head>
<body>
	<div class="container text-center">
		<br><br>
		<h1 class="text-center text-success text-uppercseanimateuse"> TECHNOFEST QUIZ </h1>
		<br><br><br><br>

		<table class="table text-center table-bordered table-hover">
			<tr>
				<thcolspan="2" class="bg-dark"><h1 class="text-white"> Results</h1></th>
			</tr>
			<tr>
				<td>
					Questions Attempted
				</td>
				<?php 
				$Resultans=0;
				if(isset($_POST['submit']))
				{
					if(!empty($_POST['quizcheck']))
					{
						$checked_count=count($_POST['quizcheck']);
						?>
						<td>
							<?php
							echo "Out of 10, you attempted ".$checked_count." questions";?>
						</td>
				<?php

				  $selected=$_POST['quizcheck'];

				  $ql="select ans_id from questions";
				  $ansresults= mysqli_query($con,$ql);
				  $i=1;
				  while($rows=mysqli_fetch_array($ansresults))
				  {
					$flags=$rows['ans_id']==$selected[$i];
					if($flags)
					{
						$Resultans++;
					}
					else
					{

					}
					$i++;
				  }
				  ?>
				<tr>
					<td>
						Your Total Score 
					</td>
					<td colspan="2">
						<?php
						   echo "Your Score is ".$Resultans.".";
						}
						else
						{
							echo "<b> Please Select Atleast One Option.</b>";
						}
					}

?>
</td>
</tr>
				<?php
				$name=$_SESSION['username'];
				$finalresult="insert into user(username,totalques,answerscorrect) values ('$name','10','$Resultans')";
				$queryresult=mysqli_query($con,$finalresult);
				?>


		</table>

<a href="logout.php" class="btnbtn-success">LOGOUT </a>
</div>
</body>
</html>




