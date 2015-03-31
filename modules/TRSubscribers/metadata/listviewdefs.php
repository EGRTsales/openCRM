<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$listViewDefs['TRSubscribers'] = array(
    'MSISDN' => array(
        'width' => '10', 
        'label' => 'LBL_MSISDN',
        'default' => true,
        'link' => true
    ),
    'ACTIVATION_DATE'=> array(
        'width' => '10', 
        'label' => 'LBL_ACTIVATION_DATE',
        'default' => true    
    ),
    'CONTRACT_BINDING'=> array(
        'width' => '10', 
        'label' => 'LBL_CONTRACT_BINDING',
        'default' => true    
    ),
    'LAST_CALL_DATE' => array(
        'width' => '10', 
        'label' => 'LBL_LAST_CALL_DATE',
        'default' => true    
    ),
    'LAST_CALL_RESPONSE' => array(
        'width' => '10', 
        'label' => 'LBL_LAST_CALL_RESPONSE',
        'default' => true    
    ),
    'DO_NOT_CALL' => array(
        'width' => '10', 
        'label' => 'LBL_DO_NOT_CALL',
        'default' => true
    ),
    
/*    
    'NAME' => array(
        'width' => '20%', 		
        'label' => 'LBL_LIST_NAME', 
        'link' => true,
        'contextMenu' => array(
            'objectType' => 'sugarPerson', 
            'metaData' => array(
                'contact_id' => '{$ID}', 
                'module' => 'Contacts',
                'return_action' => 'ListView', 
                'contact_name' => '{$FULL_NAME}', 
                'parent_id' => '{$ACCOUNT_ID}',
                'parent_name' => '{$ACCOUNT_NAME}',
                'return_module' => 'Contacts', 
                'return_action' => 'ListView', 
                'parent_type' => 'Account', 
                'notes_parent_type' => 'Account'
            )
        ),
        'orderBy' => 'name',
        'default' => true,
        'related_fields' => array('first_name', 'last_name', 'salutation', 'account_name', 'account_id'),
    ), 
    'ACCOUNT_NAME' => array(
        'width' => '34%', 
        'label' => 'LBL_LIST_ACCOUNT_NAME', 
        'module' => 'Accounts',
        'id' => 'ACCOUNT_ID',
        'link' => true,
        'contextMenu' => array(
            'objectType' => 'sugarAccount', 
            'metaData' => array(
                'return_module' => 'Contacts', 
                'return_action' => 'ListView', 
                'module' => 'Accounts',
                'return_action' => 'ListView', 
                'parent_id' => '{$ACCOUNT_ID}', 
                'parent_name' => '{$ACCOUNT_NAME}', 
                'account_id' => '{$ACCOUNT_ID}', 
                'account_name' => '{$ACCOUNT_NAME}'),
            ),
        'default' => true,
        'sortable'=> true,
        'ACLTag' => 'ACCOUNT',
        'related_fields' => array('account_id')
    ),
*/    
    'CREATED_BY_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_CREATED'
    ),
    'ASSIGNED_USER_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_ASSIGNED_USER',
        'module' => 'Employees',
        'id' => 'ASSIGNED_USER_ID',
        'default' => true
    ),
    'MODIFIED_BY_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_MODIFIED'
    ),
    'DATE_ENTERED' => array(
        'width' => '10', 
        'label' => 'LBL_DATE_ENTERED',
        'default' => true
    )       
);
?>
