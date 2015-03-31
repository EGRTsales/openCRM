<?php
$viewdefs['TRSubscribers']['DetailView'] = array(
    'templateMeta' => array(
        'form' => array(
            'buttons'=>array(
                'EDIT', 
                'DELETE', 
            ),
        ),
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30')
        ),

        'includes'=> array(
        ),
    ),

    'panels' => array (
        'lbl_subscriber_information' => array (
            array(
                array('name'=>'msisdn','label' => 'LBL_MSISDN',),
                array('name'=>'activation_date', 'fields'=>array('activation_date',' / ', 'contract_binding')),
            ),
            array (
                array('name'=>'full_name','label' => 'LBL_NAME','customCode'=>'{$fields.salutation.options[$fields.salutation.value]} {$fields.first_name.value} {$fields.last_name.value}'),
                array('name'=>'contract_binding_date')
            ),
            array (
                null,
                array('name'=>'last_call_date'),     
            ),
            array (
                array('name'=>'customer_pwd'),
                array('name'=>'last_call_response')
            ),
            array (
                array ('name'=>'do_not_call','label'=>'LBL_DO_NOT_CALL',),
                array('name'=>'subscriber_source')
            ),
            array (
                array('name' => 'email_address'),
                array ('name'=>'lead_source','label'=>'LBL_LEAD_SOURCE',),
            )            
        ),
        'LBL_RELATED_OBJECTS' => array(
            array(
                array ('name' => 'account_name'),
                array ('name' => 'contact_name'),
            ),
        ),
        'LBL_ADDRESS_INFORMATION' => array(    
            array (
                array (
                  'name' => 'primary_address_street',
                  'label' => 'LBL_PRIMARY_ADDRESS',
                  'type' => 'address',
                  'displayParams' => array ('key' => 'primary',),
                ),

                array (
                  'name' => 'alt_address_street',
                  'label' => 'LBL_ALTERNATE_ADDRESS',
                  'type' => 'address',
                  'displayParams' => array ('key' => 'alt',),
                ),
            ),
        ),
        'LBL_DESCRIPTION' => array(        
            array (
              array (
                'name' => 'description',
                'comment' => 'Full text of the note',
                'label' => 'LBL_DESCRIPTION',
              ),
              null
            ),
        ),
        'LBL_PANEL_ADVANCED' => array (
            array (
                array('name'=>'count_gsm', 'type'=>'readonly'),
                null
            ),  
            array (
                array('name'=>'customer_id', 'type'=>'readonly'),
                array('name'=>'suberscriber_id', 'type'=>'readonly'),
            ),  
        ),
        'LBL_PANEL_ASSIGNMENT' => array (
            array (
                array (
                  'name' => 'assigned_user_name',
                  'label' => 'LBL_ASSIGNED_TO_NAME',
                ),
                array (
                  'name' => 'date_modified',
                  'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                  'label' => 'LBL_DATE_MODIFIED',
                ),
            ),
            array (
                array (
                  'name' => 'date_entered',
                  'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                  'label' => 'LBL_DATE_ENTERED',
                ),
            ),
        ),
    )
);
?>