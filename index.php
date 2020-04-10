<?php
##########################################################################
$password = "psq";  // Modify Password to suit for access, Max 10 Char.
##########################################################################
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Oncowiki</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<section id="banner"><div id="bannersub"><img src="images/oncowiki.png" width="90%">
<?php 
print "<h1 align=\"center\">Password Protected</h1>";
// If password is valid let the user get access
if (isset($_POST["password"]) && ($_POST["password"]=="$password")) {
?>
			<ul class="actions">
				<li><a href="#start" class="button special">Patient Simulation</a></li>
				<li><a href="/support" class="button special">Support Area</a></li>
			</ul>
		</div></section>



<!-- START OF HIDDEN HTML - PLACE YOUR CONTENT HERE -->
  
 
		<!-- One -->
			<section id="one" class="wrapper special">
				<div class="inner">
					<header class="major">
						<a name="start"><h2>Patient Simulation</h2></a>
					</header>
					<div class="features">
						<div class="feature">
							<i class="fa fa-genderless"></i>
							<h3>Patient Details</h3>
							<p>Name: Jane Doe<br>
							DOB: 10/02/1969<Br>
							ID: 1000001
							
</p>
						</div>
						<div class="feature">
							<i class="fa fa-sitemap"></i>
							<h3>Tumour Classification</h3>
							<p>Receptor Status: Triple -ve<br>
							Tumour Grade: 3<br>
							Tumour Stage: TX (+ N3)
</p>
						</div>
						<div class="feature">
							<i class="fa fa-comments"></i>
							<h3>OncoWiki Network</h3>
							<p>
<a href="TNBC3vsClinicalControl.pdf">Full Report</a><br>
Related Clinical Reports<br>
Live Clinicians</p>
						</div>
						<div class="feature">
							<i class="fa fa-align-left"></i>
							<h3>Mapping Statistics</h3>
							<p><img src="TNBCbarchart.png"><br>
Filtration Rate: 13.7%<br>
Mapping Rate: 54.8%<br>
Activity z-score: 4.315
</p>
						</div>
						<div class="feature">
							<i class="fa fa-share-alt"></i>
							<h3>Molecular Network</h3>
							<p><img src="TNBCpathway.png"><br>
p-value: 3.28E-08<br>
Most up-regulated: Gli1<br>
Molecular Involvement: 28/72
</p>
						</div>

						<div class="feature">
							<i class="fa fa-medkit"></i>
							<h3>Upstream Regulators</h3>
							<p><img src="TNBCdrugs.png"><br>
Recommended Drug<br>
NCCN Guidelines<br>
OncoWiki Support</p>
						</div>
					</div>
				</div>
			</section>






		<!-- Footer -->
			<footer id="footer">
<ul class="icons" align="center">		
<li><a href="http://www.twitter.com/oncowiki" class="icon fa-twitter"><span class="label">Twitter</span></a></li>

</ul>

			</footer>
  
  
  
  

<!-- END OF HIDDEN HTML -->
<?php 
}
else
{
// Wrong password or no password entered display this message
if (isset($_POST['password']) || $password == "") {
  print "<p align=\"center\"><font color=\"red\"><b>Incorrect Password</b></font></p>";}
  print "<form method=\"post\"><p align=\"center\"><h1>Please enter your password for access</h1><br>";
  print "<input name=\"password\" type=\"password\" size=\"10\" maxlength=\"10\"><input value=\"Login\" type=\"submit\"></p></form>";
}
  print "<h1 align=\"center\">Keaan Amin - 3rd Year Biomedical Science</h1>";
?>
<BR>
</body></html>