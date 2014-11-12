<?php
global $progress;

$pages = array(
	'generator' => array('Generators', 'generator.php'),
	'steam-bath' => array('Controls', 'steam-bath.php'),
	'spa-package' => array('Spa Therapies', 'spa-package.php'),
	'accessories' => array('Accessories', 'accessories.php'),
	'towel-main' => array('Towel Warmers', 'towel-main.php')
	);

$keys = array_keys($pages);
$progress = 100*((array_search($current_page, $keys)+1)/(count($pages)+1));
?>

<div class="clear"></div>
			
<div class="middle-nav">	

	<?php if ($pages) : ?>
	<ul class="page-nav">
	<?php foreach ( $pages as $slug => $page_info ) : ?>
		<li <?php if ( $slug == $current_page ) echo 'class="active"'; ?>>
			<a href="<?php echo $page_info[1]; ?>"><?php echo $page_info[0]; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
	<?php endif;//$pages ?>
	
	
	<div class="tabbed">
		<ul class="tabs">
			<li><a href="#content" title="Product" class="product-button active">Product</a></li>
			<li><a href="#content" title="More Info" class="more-info-button">More Info</a></li>
			<li><a href="#content" title="Technical Info" class="tech-info-button">Technical Info</a></li>
		</ul>	
	</div><!-- tabbed_box -->
	
</div><!-- middle-nav -->

<div class="clear"></div>
			