<?php
$links = array();

$links['TRThemeConfig']['link1'] = array(
		'icon_AdminThemes',
		'LBL_TRTHEMECONFIG_LINK1_TITLE',
		'LBL_TRTHEMECONFIG_LINK1_DESCRIPTION',
		'./index.php?module=TRThemeController&action=TRThemeConfig&config_section=1',
);

/*
$links['TRThemeConfig']['link2'] = array(
		'TRThemePages',
		'LBL_TRTHEMECONFIG_LINK2_TITLE',
		'LBL_TRTHEMECONFIG_LINK2_DESCRIPTION',
		'./index.php?module=TRThemePages',
);
*/

$admin_group_header []= array(
		'20reasons Theme Configuration',
		'',
		false,
		$links,
		'Configuration for the 20reasons Theme'
);