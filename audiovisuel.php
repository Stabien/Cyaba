<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/audiovisuel.css"/>
	<title>CYABA</title>
</head>
<body>
    <?php include('header.php'); ?>
	<div id="filtres">
		<h5>Type de produit</h5>
		<div class="checkbox_filtres">
			<input type="checkbox" id="horns" name="horns">
  			<label for="horns">Accessoires</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" name="photo">
  			<label for="photo">Appareil Photo</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" name="camera">
  			<label for="camera">Caméra</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" id="horns" name="enceinte">
  			<label for="enceinte">Enceinte</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" name="micros">
  			<label for="horns">Micro</label>
		</div>
		<h5>Prix</h5>
		<div class="checkbox_filtres" id="price">
			<p>0</p>
			<div id="container_position">
				<input type="range" min="0" max="2999" step="10" class="range_css" name="horns">
				<span id="current_value">1499</span>
			</div>
			<p>2999</p>
		</div>
		<h5>Marques</h5>
		<div class="checkbox_filtres">
			<input type="checkbox" name="canon">
  			<label for="canon">Canon</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" name="harman">
  			<label for="harman">Harman Kardon</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox"  name="jbl">
  			<label for="jbl">JBL</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" name="nikon">
  			<label for="nikon">Nikon</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" id="horns" name="horns">
  			<label for="horns">Pioneer</label>
		</div>
		<div class="checkbox_filtres">
			<input type="checkbox" id="horns" name="horns">
  			<label for="horns">Sony</label>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/display_range.js"></script>
</body>
</html>
