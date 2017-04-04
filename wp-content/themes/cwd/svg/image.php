<?php
	header('Content-Type: image/svg+xml');
	$color = urldecode($_GET['color']);
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 39 35" enable-background="new 0 0 39 35" xml:space="preserve">
<g>
	<path fill="none" stroke="<?php echo $color; ?>" stroke-width="2" stroke-miterlimit="10" d="M33.5,9.5v22c0,1.1-0.9,2-2,2h-26c-1.1,0-2-0.9-2-2
		v-22c0-1.1,0.9-2,2-2h26C32.6,7.5,33.5,8.4,33.5,9.5z"/>
	<path fill="none" stroke="<?php echo $color; ?>" stroke-width="2" stroke-miterlimit="10" d="M37.5,5.5v22c0,1.1-0.9,2-2,2h-2v-20
		c0-1.1-0.9-2-2-2h-24v-2c0-1.1,0.9-2,2-2h26C36.6,3.5,37.5,4.4,37.5,5.5z"/>
	<polygon display="none" fill="none" stroke="<?php echo $color; ?>" stroke-width="2" stroke-miterlimit="10" points="26.5,24.16 26.5,25.5 
		10.5,25.5 10.5,22.65 14.58,18.57 22.23,23.92 24.25,21.91 	"/>
	<polygon fill="none" stroke="<?php echo $color; ?>" stroke-width="2" stroke-miterlimit="10" points="25.5,23.915 25.5,26.5 9.5,26.5 9.5,21.43 
		12.895,18.035 	"/>
	<circle fill="none" stroke="<?php echo $color; ?>" stroke-width="2" stroke-miterlimit="10" cx="23.5" cy="17" r="2"/>
</g>
</svg>
