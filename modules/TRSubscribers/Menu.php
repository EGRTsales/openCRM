<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $mod_strings, $app_strings, $sugar_config;

if(ACLController::checkAccess('TRSubscribers', 'edit', true))$module_menu[]=Array("index.php?module=TRSubscribers&action=EditView&return_module=TRSubscribers&return_action=DetailView", $mod_strings['LNK_NEW_TRSUBSCRIBERS'],"CreateTRSubscribers", 'TRSubscribers');
if(ACLController::checkAccess('TRSubscribers', 'list', true))$module_menu[]=Array("index.php?module=TRSubscribers&action=index&return_module=TRSubscribers&return_action=DetailView", $mod_strings['LNK_LIST_TRSUBSCRIBERS'],"TRSubscribers", 'TRSubscribers');
