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
	<line fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" x1="17" y1="49" x2="51" y2="49"/>
	<line fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" x1="17" y1="39" x2="51" y2="39"/>
	<line fill="none" stroke="<?php echo $color; ?>" stroke-width="4" stroke-miterlimit="10" x1="29" y1="29" x2="51" y2="29"/>
</g>
</svg>
