<?php
	header('Content-Type: image/svg+xml');
	$color = urldecode($_GET['color']);
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 76 68" enable-background="new 0 0 76 68" xml:space="preserve">
<g>
	<path fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" d="M64,17v44c0,2.2-1.8,4-4,4H8c-2.2,0-4-1.8-4-4V17
		c0-2.2,1.8-4,4-4h52C62.2,13,64,14.8,64,17z"/>
	<path fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" d="M72,9v44c0,2.2-1.8,4-4,4h-4V17c0-2.2-1.8-4-4-4H12
		V9c0-2.2,1.8-4,4-4h52C70.2,5,72,6.8,72,9z"/>
	<polygon display="none" fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" points="50,46.32 50,49 18,49 
		18,43.3 26.16,35.14 41.46,45.84 45.5,41.82 	"/>
	<polygon fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" points="49,45.83 49,50 17,50 17,40.859 
		23.79,34.07 	"/>
	<circle fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" cx="44" cy="32" r="4"/>
</g>
</svg>