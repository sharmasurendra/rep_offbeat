<section class="main-section-services" id="services">
<link rel="stylesheet" href="../resources/css/mp/animate.css">
<link rel="stylesheet" href="../resources/css/mp/application-minimal.css">
<link rel="stylesheet" href="../resources/css/mp/application-minimal3.css">
<link rel="stylesheet" href="../resources/css/mp/bootstrap-social.css">
<link rel="stylesheet" href="../resources/css/mp/bootstrap.css">
<link rel="stylesheet" href="../resources/css/mp/flex.css">
<link rel="stylesheet" href="../resources/css/mp/font-awesome.css">
<link rel="stylesheet" href="../resources/css/mp/font-awesome.min.css">
<link rel="stylesheet" href="../resources/css/mp/productgrid.css">
<link rel="stylesheet" href="../resources/css/mp/responsive.css">
<link rel="stylesheet" href="../resources/css/mp/style.css">
<link rel="stylesheet" href="../resources/css/mp/toolkit-minimal.css">
<link rel="stylesheet" href="../resources/css/mp/toolkit-minimal3.css">




<?php
// The data to send to the API
$postData = array(
    'action' => 'getProducts',
);

// Setup cURL
$ch = curl_init('https://cmpe272.tanmay.one/api/v1/');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);


curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'auth-key: '.'434869e30ac42eb99ebdf5fe13e03a957057bc431302b5ba0b479abcb82e9eba',
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
  echo $response;
    die(curl_error($ch));
}

// Decode the response
// echo  $response;

echo "<div class=\"block block-bordered-lg\">
    <div class=\"container\" id=\"products\">
        <h4>Our Products </h4>
        <div class=\"row\">
";

$responseData = json_decode($response, TRUE);

  foreach ($responseData as $key => $value) {
    $pId = $value["id"];
  	$pName = $value["name"];
  	$pPrice = $value["price"];
  	$pImage = $value["images"][0]["src"];
    $pSlug = $value["slug"];

    // echo $value["id"] . ", " . $value["name"] . ", " . $value["slug"]. ", " . $value["price"]. ", " . $value["images"][0]["src"]."<br>";
      
    // echo "<div><a title=\"$pName\" href=\"includes/service-detail1.php\"> <img src=\"$pImage\"></a></div>";

    echo "
            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\" id=\"$pId\">
                <div class=\"my-list\">
                    <img class=\"align-content-center\" src=\"$pImage\" style=\"width: 200px; height: 150px\"
                         alt=\"dsadas\"/>
                    <h3 class=\"text-center\">$pName</h3>
                    <h6 class=\"text-cente\">$pSlug</h6>
                    <div class=\"detail\">
                        <p> </p>
                        <img src=\"$pImage \" style=\"width: 200px; height: 150p\"
                             alt=\"dsadas\"/>
                        <a href=\"product-detail1.php?pId=$pId&pName=$pName&pPrice=$pPrice&pImage=$pImage&pSlug=$pSlug\" class=\"btn btn-primary m-2\">View Detail</a>
                    </div>
                </div>
            </div>
    ";
}
echo "</div></div>";
?>




      


<!--  <div class="container fullsize">
         	<br>
         	<br>
            <h1 class="animated" align="center">Our Services</h1>
			<div class="flex-container">
			  <div><a title="Competition Analysis" href="includes/service-detail1.php">Competition Analysis</a></div>
			  <div><a title="Business Plan" href="includes/service-detail2.php">Business Plan</a></div>
			  <div><a  title="International Expansion Advice" href="includes/service-detail3.php">International Expansion Advice</a></div>  
			  <div><a  title="Branding & Rebranding" href="includes/service-detail4.php">Branding &amp; Rebranding</a></div>  
			  <div><a  title="International Expansion Advice" href="includes/service-detail5.php">Staff Training</a></div>
			</div>
            </div>
            <div class="container fullsize">
         	<br>
         	<br>
			
			<div class="flex-container">
			  <div><a title="Competition Analysis" href="includes/service-detail6.php">Strategic Plans</a></div>
			  <div><a title="Business Plan" href="includes/service-detail7.php">Succession Plans</a></div>
			  <div><a  title="International Expansion Advice" href="includes/service-detail8.php">Market Shifts</a></div>  
			  <div><a  title="Branding & Rebranding" href="includes/service-detail9.php">Service Development</a></div>  
			  <div><a  title="International Expansion Advice" href="includes/service-detail10.php">Pricing Analysis</a></div>
			</div>
            </div>

			<div class="flex-container">
			   <div class="col-md-6 text-center mt-5">
                <h5><a href="includes/lastVisitedServices.php" class="text-center"> 5 Last visited services</a></h5>
            </div>
            <div class="col-md-6 text-center mt-5">
                <h5><a href="includes/mostVisitedServices.php">5 Most visited services</a></h5>
            </div>
            </div>
 -->
            
              
</section>