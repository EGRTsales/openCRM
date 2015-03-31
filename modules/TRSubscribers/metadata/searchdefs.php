<?php
$searchdefs['TRSubscribers'] = array(
    'templateMeta' => array(
        'maxColumns' => '3', 
        'maxColumnsBasic' => '4',
        'widths' => array('label' => '10', 'field' => '30'), 
    ),
    'layout' => array (
      'basic_search' => 
      array (
        array('name'=>'msisdn','label' =>'LBL_MSISDN'),
        array('name'=>'last_name','label' =>'LBL_LAST_NAME'),
        array('name'=>'last_call_response'),
        array('name'=>'last_call_date'),
        array('name'=>'activation_date'),
        array('name'=>'contract_binding'),
        array (
          'name' => 'current_user_only',
          'label' => 'LBL_CURRENT_USER_FILTER',
          'type' => 'bool',
        ),
      ),

      'advanced_search' => 
      array (
        array('name'=>'msisdn','label' =>'LBL_MSISDN'),
        array('name'=>'last_name','label' =>'LBL_LAST_NAME'),
        array('name'=>'last_call_response'),
        array('name'=>'last_call_date'),
        array('name'=>'activation_date'),
        array('name'=>'contract_binding'),  
        array (
          'name' => 'current_user_only',
          'label' => 'LBL_CURRENT_USER_FILTER',
          'type' => 'bool',
        ),
      ),
    )
);
?>