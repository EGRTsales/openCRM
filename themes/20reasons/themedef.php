<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$GLOBALS['sugar_config']['disableAjaxUI'] = true;
$themedef = array(
    'name'  => "20 Reasons",
    'description' => "20 Reasons Theme",
    'version' => array(
        'regex_matches' => array('6\.*.*'),
        ),
    'group_tabs' => true,
    );
