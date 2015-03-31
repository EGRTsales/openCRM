<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dictionary['Call']['fields']['status'] =  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'len' => 100,
    'options' => 'call_status_dom',
    'required' => true,
    'importable' => 'required',
    'default' => 'Held',
	'studio' => array('detailview'=>false)
);
  
$dictionary['Call']['fields']['trsubscribers'] = array (
    'name' => 'trsubscribers',
    'type' => 'link',
    'relationship' => 'trsubscribers_calls',
    'source' => 'non-db',
    'vname' => 'LBL_CALLS',
);

$dictionary['Call']['fields']['contract_binding'] =  array (
    'name' => 'contract_binding',
    'vname' => 'LBL_CONTRACT_BINDING',
    'type' => 'enum',
    'len' => 2,
    'options' => 'call_contract_binding_dom',
    'required' => false,
    'importable' => 'required',
    'default' => '',
    'source' => 'non-db'
);
