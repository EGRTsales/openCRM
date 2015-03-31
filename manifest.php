<?php 
$manifest = array( 
	'name' => 'Deutsche Sprachversion 6.5.20 für Sugar CE',
	'description' => 'Lizenz: iscon Shop Kunde',
	'type' => 'langpack',
	'is_uninstallable' => 'Yes',
	'version' => '6520',
	'acceptable_sugar_flavors' => array ("CE"),
	'published_date' => '150119',
	'author' => 'iscongroup',
	'acceptable_sugar_versions' => array ("6.5"),
);

$installdefs = array(
	'id'=> 'de_de',
	'image_dir'=>'<basepath>/images',
	'copy' => array(
	array('from'=> '<basepath>/include','to'=> 'include',),
    array('from'=> '<basepath>/install','to'=> 'install',),
	array('from'=> '<basepath>/modules','to'=> 'modules'))
);
?>
