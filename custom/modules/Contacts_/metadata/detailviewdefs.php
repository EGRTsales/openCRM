<?php
$viewdefs['Contacts']['DetailView'] = array(
'templateMeta' => array('form' => array('buttons'=>array('EDIT', 'DUPLICATE', 'DELETE', 'FIND_DUPLICATES',
                                                         array('customCode'=>'<input type="submit" class="button" title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" onclick="this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}"/>',
                                                             //Bug#51778: The custom code will be replaced with sugar_html. customCode will be deplicated.
                                                             'sugar_html' => array(
                                                                 'type' => 'submit',
                                                                 'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                                                                 'htmlOptions' => array(
                                                                     'class' => 'button',
                                                                     'id' => 'manage_subscriptions_button',
                                                                     'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                                                                     'onclick' => 'this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';',
                                                                     'name' => 'Manage Subscriptions',
                                                                 ),
                                                             ),

                                                         ),
                                                        ),
                                       ),
                        'maxColumns' => '2',
                        'widths' => array(
                                        array('label' => '10', 'field' => '30'),
                                        array('label' => '10', 'field' => '30')
                                        ),

						'includes'=> array(
                            			array('file'=>'modules/Leads/Lead.js'),
                         				),
                        ),



    'panels' =>
    array (
      'lbl_contact_information' =>
      array (
        array(
            array('name' => 'msisdn','label' => 'LBL_MSISDN',),
            array('name'=>'activation_date'),
        ),

        array (
            array ('name' => 'full_name','label' => 'LBL_NAME',),
            array('name'=>'last_call_date'),            
        ),
        array (
          null,
          array('name'=>'last_call_response')
        ),
        array (
            null,
            array('name'=>'customer_pwd')
        ),
        array (
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'primary',
            ),
          ),

          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALTERNATE_ADDRESS',
            'type' => 'address',
            'displayParams' =>
            array (
              'key' => 'alt',
            ),
          ),
        ),

        array (
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),

        array (
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),

      'LBL_PANEL_ADVANCED' =>
      array (
        array (
            array('name'=>'count_gsm', 'type'=>'readonly'),
            null
        ),  
        array (
            array('name'=>'customer_id', 'type'=>'readonly'),
            array('name'=>'suberscriber_id', 'type'=>'readonly'),
        ),  
          
          
        array (
          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),
          array (
            'name' => 'do_not_call',
            'comment' => 'An indicator of whether contact can be called',
            'label' => 'LBL_DO_NOT_CALL',
          ),
        ),


      ),
      'LBL_PANEL_ASSIGNMENT' =>
      array (

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