<?php
	header('Content-Type: image/svg+xml');
	$color = urldecode($_GET['color']);
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 76 68" enable-background="new 0 0 76 68" xml:space="preserve">
<g>
	<path fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" d="M64,17v44c0,2.2-1.801,4-4,4H8c-2.199,0-4-1.8-4-4
		V17c0-2.2,1.801-4,4-4h52C62.199,13,64,14.8,64,17z"/>
	<path fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" d="M72,9v44c0,2.2-1.801,4-4,4h-4V17
		c0-2.2-1.801-4-4-4H12V9c0-2.2,1.801-4,4-4h52C70.199,5,72,6.8,72,9z"/>
	<line fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" x1="27" y1="40" x2="41" y2="40"/>
	<polyline fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" points="32,47 16,47 16,41 	"/>
	<polyline fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" points="36,47 52,47 52,41 	"/>
	<polyline fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" points="32,33 16,33 16,39 	"/>
	<polyline fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" points="36,33 52,33 52,39 	"/>
</g>
</svg>
