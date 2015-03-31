<?php
$searchdefs['Contacts'] = array(
  		  'templateMeta' => array(
  		  					'maxColumns' => '3', 
							'maxColumnsBasic' => '4',
                            'widths' => array('label' => '10', 'field' => '30'), 
                           ),
		  'layout' => array (
		    'basic_search' => 
		    array (
		      array('name'=>'search_name','label' =>'LBL_NAME', 'type' => 'name'),
                      array('name'=>'last_call_response'),
                      array('name'=>'last_call_date'),
                      array('name'=>'activation_date'),
		      array (
		        'name' => 'current_user_only',
		        'label' => 'LBL_CURRENT_USER_FILTER',
		        'type' => 'bool',
		      ),
		    ),
                      
		    'advanced_search' => 
		    array (
		      array('name'=>'search_name','label' =>'LBL_NAME', 'type' => 'name'),
                      array('name'=>'last_call_response'),
                      array('name'=>'last_call_date'),
                      array('name'=>'activation_date'),
		      array (
		        'name' => 'current_user_only',
		        'label' => 'LBL_CURRENT_USER_FILTER',
		        'type' => 'bool',
		      ),
		    ),
		  )
);
?>