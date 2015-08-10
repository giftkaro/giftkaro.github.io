<?php
//Survey vriables
$data_storeName = $_POST['StoreName'];

$data_name = $_POST['YourName'];
$data_phone = $_POST['Phone'];
$data_email = $_POST['E-mail'];
$data_address= $_POST['Address'];
$data_postalCode = $_POST['Postal-Code'];
$data_city = $_POST['City'];
$data_state = $_POST['State'];
$data_country = $_POST['Country'];

$data_s1 = $_POST['S1'];
$data_s2 = $_POST['S2'];
$data_s3 = $_POST['S3'];
$data_s4 = $_POST['S4'];
$data_s5 = $_POST['S5'];
$data_others = $_POST['Others'];

$data_giftWrap = $_POST['Gift-wrap'];

$data_delivery = $_POST['delivery'];
$data_deliveryDetails = $_POST['delivery-Details'];

$data_store = $_POST['store'];
$data_storeDetails = $_POST['store-Details'];

//$data_revenue = $_POST['revenue'];
$data_revenue = "";

$data_customization = $_POST['customization'];

$data_fee = $_POST['fee'];
$data_ifFixed = $_POST['if-fixed'];
$data_ifVariableFrom = $_POST['if-variable-from'];
$data_ifVariableTo = $_POST['if-variable-to'];

$data_comment = $_POST['Comment'];


//Database connection and survey results insert
$dbhost = "localhost";
$dbname = "giftkaroDB";
$dbusername = "adityahg1";
$dbpassword = "adityahg123";


$link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
$statement = $link->prepare("INSERT INTO surveyResults (storeName, name, phone, email, address, postalCode, city, state, country, s1, s2, s3, s4, s5, others, giftWrap, delivery, deliveryDetails, store, storeDetails, revenue, customization, fee, ifFixed, ifVariableFrom,ifVariableTo, comment, surveyName) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$statement->execute(array(
$data_storeName,
$data_name,
$data_phone,
$data_email,
$data_address,
$data_postalCode,
$data_city,
$data_state,
$data_country,
$data_s1,
$data_s2,
$data_s3,
$data_s4,
$data_s5,
$data_others,
$data_giftWrap,
$data_delivery,
$data_deliveryDetails,
$data_store,
$data_storeDetails,
$data_revenue,
$data_customization,
$data_fee,
$data_ifFixed,
$data_ifVariableFrom,
$data_ifVariableTo,
$data_comment,
"store"
));

$stmt = $link->query("SELECT LAST_INSERT_ID()");
$lastId = $stmt->fetch(PDO::FETCH_NUM);
$lastId = $lastId[0];


$txt = '<html><body>
<div style="width:100%;height:5px;background-color:#3cadd4;"></div>
<h2 style="font-family:arial;">New survey results from: "'.$data_storeName.'"</h2>
<span>Click </span>
<a style="font-family:arial;" href="http://www.giftkaro.in/admin/survey.php?id='.$lastId.'">here</a>
<span style="font-family:arial;"> to view survey results.
</body>
</html>';


$websitemail = '

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Giftkaro</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Solution to all your gifting problems" />
		<meta name="keywords" content="Giftkaro, Gifts, Online Gifting" />
		<!--[if lte IE 8]><script src="http://giftkaro.in/js/html5shiv.js"></script><![endif]-->
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

	</head>
	<body class="landing">
	
		<!-- Header -->
			<header id="header" style="position:relative; background-image: url(http://giftkaro.in/images/dark_tint.png), url(http://giftkaro.in/images/bokeh_car_lights_bg.jpg); background-position:center; width:100%; padding-bottom:30px;">
				<h1 style="z-index=99"><a href="index.html">Giftkaro</a></h1>
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

			<h2>Survey</h2>
			<h4 style="margin-bottom:80px;"><?php echo $results[29] ?></h6>
			<form action="Submit.php" method="post" style="padding:0% 12% 0% 12%;text-align: left;">
				<div class="row uniform">
					<div class="12u 12u$(small)">
						<p style="text-align:left;">1. Gift Store Name:</p>
					</div>
					<div class="12u 12u$(small)">
						<input name="StoreName" id="StoreName" value="'.$data_storeName.'" placeholder="Gift Store Name" type="text" disabled>
					</div>



					<div class="12u 12u$(small)">
						<p style="text-align:left;">2. Contact info:</p>
					</div>

					<div class="5u 12u$(small)">
						<input name="YourName" id="YourName" value="'.$data_name.'" placeholder="Your name" type="text" disabled>
					</div>
					<div class="3u 12u$(small)">
						<input name="Phone" id="Phone" value="'.$data_phone.'" placeholder="Phone number" type="text" disabled>
					</div>
					<div class="4u 12u$(small)">
						<input name="E-mail" id="E-mail" value="'.$data_email.'" placeholder="e-mail" type="text" disabled>
					</div>


					<div class="5u 12u$(small)">
						<input name="Address" id="Address" value="'.$data_address.'" placeholder="Address" type="text" disabled>
					</div>
					<div class="3u 12u$(small)">
						<input name="Postal-Code" id="Postal-Code" value="'.$data_postalCode.'" placeholder="Postal Code" type="text" disabled>
					</div>
					<div class="4u 12u$(small)">
						<input name="City" id="City" value="'.$data_city.'" placeholder="City" type="text" disabled>
					</div>


					<div class="5u 12u$(small)">
						<input name="State" id="State" value="'.$data_state.'" placeholder="State" type="text" disabled>
					</div>
					<div class="7u 12u$(small)">
						<input name="Country" id="Country" value="'.$data_country.'" placeholder="Country" type="text" disabled>
					</div>



					<div class="12u 12u$(small)">
						<p style="text-align:left;">3. Type of product store sells:</p>
					</div>
					<div class="4u 12u$(small)">
						<input type="checkbox" id="S1" name="S1" value="True" '.(($data_s1 == "True") ? "checked" : "") .' disabled>
						<label for="S1">Personalized Gifts</label>
					</div>
					<div class="4u 12u$(small)">
						<input type="checkbox" id="S2" name="S2" value="True" '.(($data_s2 == "True") ? "checked" : "") .' disabled>
						<label for="S2">Flowers / Bouquets</label>
					</div>
					<div class="4u 12u$(small)">
						<input type="checkbox" id="S3" name="S3" value="True" '.(($data_s3 == "True") ? "checked" : "") .' disabled>
						<label for="S3">Cakes</label>
					</div>

					<div class="4u 12u$(small)">
						<input type="checkbox" id="S4" name="S4" value="True" '.(($data_s4 == "True") ? "checked" : "") .' disabled>
						<label for="S4">Frames / Mugs</label>
					</div>
					<div class="4u 12u$(small)">
						<input type="checkbox" id="S5" name="S5" value="True" '.(($data_s5 == "True") ? "checked" : "") .' disabled>
						<label for="S5">Cards</label>
					</div>
					<div class="4u 12u$(small)">
						<input name="Others" id="Others" value="'.$data_others.'" placeholder="Others" type="text" disabled>
					</div>
					
					<div class="12u 12u$(small)">
						<p style="text-align:left;">4. Does the store provide gift-wrap service?</p>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="Gift-wrap-yes" name="Gift-wrap" value="True" '.(($data_giftWrap == "True") ? "checked" : "") .' disabled>
						<label for="Gift-wrap-yes">Yes</label>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="Gift-wrap-no" name="Gift-wrap"value="False" '.(($data_giftWrap == "False") ? "checked" : "") .' disabled>
						<label for="Gift-wrap-no">No</label>
					</div>
					<div class="8u 12u$(small)">

					</div>

					<div class="12u 12u$(small)">
						<p style="text-align:left;">5. Does the store offer delivery service?</p>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="delivery-yes" name="delivery" value="True" '.(($data_delivery == "True") ? "checked" : "") .' disabled>
						<label for="delivery-yes">Yes</label>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="delivery-no" name="delivery"value="False" '.(($data_delivery == "False") ? "checked" : "") .' disabled>
						<label for="delivery-no">No</label>
					</div>
					<div class="8u 12u$(small)">
						<input name="delivery-Details" id="delivery-Details" value="'.$data_deliveryDetails.'" placeholder="If yes, details (area /charges?):" type="text" disabled>
					</div>

					<div class="12u 12u$(small)">
						<p style="text-align:left;">6. Do store are associated with any online gifting store?</p>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="store-yes" name="store"  value="True" '.(($data_store == "True") ? "checked" : "") .' disabled>
						<label for="store-yes">Yes</label>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="store-no" name="store"  value="False" '.(($data_store == "False") ? "checked" : "") .' disabled>
						<label for="store-no">No</label>
					</div>
					<div class="8u 12u$(small)">
						<input name="store-Details" id="store-Details" value="'.$data_storeDetails.'" placeholder="If yes, name:" type="text" disabled>
					</div>


					<div class="12u 12u$(small)">
						<p style="text-align:left;">7. What is the average gift price, revenue, gift items sold in a day/month?</p>
					</div>
					<div class="12u 12u$(small)">
						<input name="revenue" id="revenue" value="'.$data_revenue.'" placeholder="" type="text" disabled>
					</div>
					<div class="12u 12u$(small)">
						<p style="text-align:left;">8. Do people ask for gift-customization?</p>
					</div>
					<div class="12u 12u$(small)">
						<input name="customization" id="customization" value="'.$data_customization.'" placeholder="" type="text" disabled>
					</div>

					<div class="12u 12u$(small)">
						<p style="text-align:left;">9. What transaction fee are stores willing to pay?</p>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="fee-yes" name="fee" value="Fixed" '.(($data_fee == "Fixed") ? "checked" : "") .' disabled>
						<label for="fee-yes">Fixed</label>
					</div>
					<div class="10u 12u$(small)">
						<input name="if-fixed" id="if-fixed" value="'.$data_ifFixed.'" placeholder="If fixed (in %)" type="text" disabled>
					</div>
					<div class="2u 12u$(small)">
						<input type="radio" id="fee-no" name="fee" value="Variable" '.(($data_fee == "Variable") ? "checked" : "") .' disabled>
						<label for="fee-no">Variable</label>
					</div>
					
					<div class="2u 12u$(small)">
						If variable, ranges 
					</div>
					<div class="4u 12u$(small)">
						<input name="if-variable-from" id="if-variable-from" value="'.$data_ifVariableFrom.'" placeholder="from (in %)" type="text" disabled>
					</div>
					<div class="4u 12u$(small)">
						<input name="if-variable-to" id="if-variable-to" value="'.$data_ifVariableTo.'" placeholder="to (in %)" type="text" disabled>
					</div>

					<div class="12u 12u$(small)">
						<p style="text-align:left;">10. Any Comment / Suggestions:</p>
					</div>

					<div class="12u 12u$(small)">
						<input name="Comment" id="Comment" value="'.$data_comment.'" placeholder="Comment / Suggestions" type="text" disabled>
					</div>
				</div>
			</form>
		</section>	


	</body>
</html>';

	$tema = "Survey results: " . $data_storeName;
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
