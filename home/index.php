<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php site_name(); ?></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="assets/style.css">

</head>
<body>
<h2>Barcode & Qrcode Generator</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="content/qrcode/qrgen.php">
			<h1>QR Code </h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-github"></i></a>
			</div>
			<span>Fill up the field.</span>
			<input autocomplete="OFF" type="message" placeholder="Type here....." />
			<button>Submit</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post" action="content/barcode/barcode.php">
			<h1>Bar Code</h1>
			<div class="social-container">
				<a href="https://github.com/digitalcure" class="social"><i class="fab fa-github"></i></a>
			</div>
			<span>Fill up the given field.</span>
			<?php
				$productError = $product_idError = $rateError = $print_qtyError = "";
				$product = $product_id = $rate = $print_qty = "";

				if($_SERVER["REQUEST_METHOD"] == "POST") {
					
					if(empty($_POST["product"])) {
						$productError = "Product is required";
					} else {
						$product = test_input($_POST["product"]);
					}
					if(empty($_POST["product_id"])) {
						$product_idError = "Product ID is required";
					} else {
						$product_id = test_input($_POST["product_id"]);
					}
					if(empty($_POST["rate"])) {
						$rateError = "Rate is required";
					} else {
						$rate = test_input($_POST["rate"]);
					}
					if(empty($_POST["print_qty"])) {
						$print_qtyError = "Print Qty is required";
					} else {
						$print_qty = test_input($_POST["print_qty"]);
					}
					
				}
				
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
			?>
			<input autocomplete="OFF" type="text"  name="product" placeholder="Product Name" />
			<span class="error">* <?php echo $productError;?></span>
			<input autocomplete="OFF" type="text"  name="product_id" placeholder="Product ID"/>
			<span class="error">* <?php echo $product_idError;?></span>
			<input autocomplete="OFF" type="text"  name="rate" placeholder="Rate"/>
			<span class="error">* <?php echo $rateError;?></span>
            <input autocomplete="OFF" type="print_qty"  name="print_qty" placeholder="Barcode Qty"/>
			<span class="error">* <?php echo $print_qtyError;?></span>
			<button>Submit</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bar Code Generator</h1>
				<button class="ghost" id="signIn">Click here!</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>QR Code Generator</h1>
				<button class="ghost" id="signUp">Click here!</button>
			</div>
		</div>
	</div>
</div>
<!-- partial -->
  <script  src="assets/script.js"></script>

</body>
</html>
