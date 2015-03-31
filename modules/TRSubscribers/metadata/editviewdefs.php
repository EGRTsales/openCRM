<?php
$viewdefs['TRSubscribers']['EditView'] = array(
    'templateMeta' => array(
        'form'=>array(
            'hidden'=>array(
            )
        ),
        'maxColumns' => '2',
        'widths' => array(
            array('label' => '10', 'field' => '30'),
            array('label' => '10', 'field' => '30'),
        ),
    ),

    'panels' => array (
        'lbl_subscriber_information' => array (
            array(
                array('name' => 'msisdn','label' => 'LBL_MSISDN', 'type'=>'readonly'),
                array('name' => 'activation_date', 'label'=>'LBL_ACTIVATION_DATE_CONTRACT_BINDING', 'fields' => array(
                    array('name' => 'activation_date'),
                    array('name' => 'contract_binding')
                )),
            ),
            array (
                array ('name' => 'first_name',
                    'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}' 
                    . '&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
                ),
                array('name'=>'contract_binding_date')
            ),  
            array (
                array('name' => 'last_name',),
                array('name'=>'last_call_date'),
            ),
            array (
                array('name'=>'customer_pwd'),
                array('name' => 'last_call_response'),
            ),
            array (
                array (
                    'name' => 'do_not_call',
                    'comment' => 'An indicator of whether contact can be called',
                    'label' => 'LBL_DO_NOT_CALL',
                ),
                array('name'=>'subscriber_source')
            ),
            array (
                array('name' => 'email_address'),
                array (
                    'name' => 'lead_source',
                    'comment' => 'How did the contact come about',
                    'label' => 'LBL_LEAD_SOURCE',
                ),
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
                array ( 'name' => 'primary_address_street', 'hideLabel' => true, 'type' => 'address', 
                    'displayParams' => array (
                        'key' => 'primary',
                        'rows' => 2,
                        'cols' => 30,
                        'maxlength' => 150,
                    ),
                ),
                array ( 'name' => 'alt_address_street', 'hideLabel' => true, 'type' => 'address',
                    'displayParams' => array (
                        'key' => 'alt',
                        'copy' => 'primary',
                        'rows' => 2,
                        'cols' => 30,
                        'maxlength' => 150,
                    ),
                ),
            ),
        ),
        'LBL_DESCRIPTION' => array(
            array (
                array ('name' => 'description', 'label' => 'LBL_DESCRIPTION')
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
                array('name' => 'assigned_user_name','label' => 'LBL_ASSIGNED_TO_NAME',),
                null
            ),
        ),
    )
);
?>