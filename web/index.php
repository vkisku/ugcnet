<!doctype html>
<html lang="en">
 
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
        <title>Vikash Kumar Kisku</title>
 
        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
        <link rel="stylesheet" href="static/css/style.css">
    </head>
 
    <body>
	<div id="div">
		<?php
			require('../vendor/autoload.php');
			require('__includes/ugc.php');
			require_once __DIR__ . '/__includes/ugc.php';
			//print_r($ugc->get_questions());
			//print_r($ugc->get_answers());
			//echo 'Hello world';
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$q_link= $_POST['assessment'];
					$a_link= $_POST['answer'];
					echo $q_link;
					$ugc = new ugcnet($q_link,$a_link);
					print_r($ugc->get_answers());
					$score=$ugc->get_score();
					echo 'Your Score '.$score;
			}
			//$q_link = "https://cdn.digialm.com//per/g28/pub/2083/touchstone/AssessmentQPHTMLMode1//2083O19256/2083O19256S5D66101/15755797078177669/JH0205201461_2083O19256S5D66101E1.html";
			//$a_link = "file:///C:/Users/LENOVO/Desktop/ChallangeAnswerKey.aspx.html";
			//$ugc = new ugcnet($q_link,$a_link);
			
			
		?>
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
		  <label for="usr">Your Assessment Link</label>
		  <input type="link" value="https://cdn.digialm.com//per/g28/pub/2083/touchstone/AssessmentQPHTMLMode1//2083O19256/2083O19256S5D66101/15755797078177669/JH0205201461_2083O19256S5D66101E1.html"  required class="form-control" name="assessment" id="assessment">
		</div>
		<div class="form-group">
		  <label for="pwd">Answer Key link</label>
		  <input type="link" value="file:///C:/Users/LENOVO/Desktop/ChallangeAnswerKey.aspx.html" required class="form-control" name="answer" id="link">
		</div>
		<input type="submit" class="btn btn-default">
		</form>
		
		
		
		<script src="static/js/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="static/js/scripts.js"></script>
		<script>
			
		</script>
    </body>
 
</html>