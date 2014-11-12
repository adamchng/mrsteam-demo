<?php
global $progress;

/*
$pages = array(
	'generator' => array('Generators', 'generator.php'),
	'steam-bath' => array('Controls', 'steam-bath.php'),
	'spa-package' => array('Spa Therapies', 'spa-package.php'),
	'accessories' => array('Accessories', 'accessories.php'),
	'towel-main' => array('Towel Warmers', 'towel-main.php')
	);
*/

$pages = array(
	'generator' => array('Generators', 'configure.php?pg=g'),
	'control' => array('Controls', 'configure.php?pg=c'),
	'spatherapy' => array('Spa Therapies', 'configure.php?pg=s'),
	'accessory' => array('Accessories', 'configure.php?pg=a'),
	'towelwarmer' => array('Towel Warmers', 'configure.php?pg=t')
	);

// Highlight menu links when a sub-category is selected as well
$map = array(
	'controlaccessory' => 'control',
	'spaoil' => 'spatherapy',
	'accessoryoil' => 'accessory',
	'towelwarmeritem' => 'towelwarmer',
	'towelwarmeraccessory' => 'towelwarmer'
	);
	
// Original
//$keys = array_keys($pages);
//$progress = 100*((array_search($current_page, $keys)+1)/(count($pages)+1));

$pagesmap = PageMapOrder();
$totalpages = count($pages) + count($map) + 1;
$progress = 100*((array_search($current_page, $pagesmap)+1)/$totalpages);

?>

<div class="clear"></div>
			
<div class="middle-nav">	

	<?php if ($pages) : ?>
	<ul class="page-nav">
	<?php foreach ( $pages as $slug => $page_info ) : ?>
		<li <?php 
				if($slug == $current_page || $slug == $map[$current_page]) {
					echo 'class="active"';
				}
			
			?>>
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
			