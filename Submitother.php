<?php
//Survey variables

$data_name = $_POST['YourName'];
$data_phone = $_POST['Phone'];
$data_email = $_POST['E-mail'];
$data_city = $_POST['City'];
$data_state = $_POST['State'];
$data_country = $_POST['Country'];

$data_s1 = $_POST['S1'];
$data_s2 = $_POST['S2'];
$data_s3 = $_POST['S3'];
$data_s4 = $_POST['S4'];
$data_s5 = $_POST['S5'];
$data_s6 = $_POST['S6'];
$data_others = $_POST['Others'];

$data_gender = $_POST['Gender'];

$data_haveOnlineExp= $_POST['online'];
$data_onlineStore = $_POST['online-storename'];

$data_purchase = $_POST['purchase'];

$data_userview = $_POST['userview'];

$data_comment = $_POST['Comment'];


//Database connection and survey results insert
$dbhost = "localhost";
$dbname = "giftkaroDB";
$dbusername = "adityahg1";
$dbpassword = "adityahg123";


$link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
$statement = $link->prepare("INSERT INTO userSurveyResults (name, phone, email, gender, city, state, country, s1, s2, s3, s4, s5, s6, others, haveOnlineExp, onlineStoreName, purchase, userview, comment, surveyName) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$statement->execute(array(
$data_name,
$data_phone,
$data_email,
$data_gender,
$data_city,
$data_state,
$data_country,
$data_s1,
$data_s2,
$data_s3,
$data_s4,
$data_s5,
$data_s6,
$data_others,
$data_haveOnlineExp,
$data_onlineStore,
$data_purchase,
$data_userview,
$data_comment,
"other"
));

$stmt = $link->query("SELECT LAST_INSERT_ID()");
$lastId = $stmt->fetch(PDO::FETCH_NUM);
$lastId = $lastId[0];


$txt = '<html><body>
<div style="width:100%;height:5px;background-color:#3cadd4;"></div>
<h2 style="font-family:arial;">New survey results from: "'.$data_name.'"</h2>
<span>Click </span>
<a style="font-family:arial;" href="http://www.giftkaro.in/admin/survey.php?id='.$lastId.'">here</a>
<span style="font-family:arial;"> to view survey results.
</body>
</html>';

	$tema = "Survey results: " . $data_name;
	$to = "founders@giftkaro.in";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: founders@giftkaro.in";
	mail($to,$tema,$txt,$headers);
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Giftkaro</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Solution to all your gifting problems" />
		<meta name="keywords" content="Giftkaro, Gifts, Online Gifting" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://giftkaro.in/js/jquery.min.js"></script>
		<script src="http://giftkaro.in/js/skel.min.js"></script>
		<script src="http://giftkaro.in/js/skel-layers.min.js"></script>
		<script src="http://giftkaro.in/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="http://giftkaro.in/css/skel.css" />
			<link rel="stylesheet" href="http://giftkaro.in/css/style.css" />
			<link rel="stylesheet" href="http://giftkaro.in/css/style-xlarge.css" />
		</noscript>


		<style type="text/css">
			input[type="text"], input[type="password"], input[type="email"], select {
				height: 2em;
				background-color: #FFF;
				color:#222;
				border-color: #DDD;
				box-shadow: 0 0 0 1px #DDD;
			}

			input[type="text"]:focus,
			input[type="password"]:focus,
			input[type="email"]:focus,
			select:focus,
			textarea:focus {
			border-color: #3cadd4;
			box-shadow: 0 0 0 1px #3cadd4;
		}

		</style>		<script type="text/javascript">

		$(document).ready(function () {
			var timer = 4;
			function Timer(){
				$("#Timer").text("You will be redirected back to website in "+timer+"s.");
				timer--;
				if(timer==0){
					
					window.location.replace("http://giftkaro.in");

				}
			}
			
			setInterval(function(){ Timer(); },1000);

		});
		</script>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" style="position:relative; background-image: url(images/dark_tint.png), url(images/bokeh_car_lights_bg.jpg); background-position:center; width:100%; padding-bottom:30px;">
				<h1 ><a href="index.html">Giftkaro</a></h1>
				<!-- <nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="generic.html">Generic</a></li>
						<li><a href="elements.html">Elements</a></li>
						<li><a href="#" class="button special">Sign Up</a></li>
					</ul>
				</nav> -->
			</header>


		<!-- survey main -->
		<section id="one" class="wrapper style1 special">
			<h2 style="margin-bottom:80px;">Thank you again.</h2>
			<h3 id="Timer" style="margin-bottom:80px;">You will be redirected back to website in 5s.</h3>
		</section>	

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Giftkaro. All rights reserved.</li>
								<li>Design: <a href="http://templated.co" target="_blank">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com" target="_blank">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>
