<?php 
 $GLOBALS["dictionary"]["TRSubscriber"]=array (
  'table' => 'trsubscribers',
  'audited' => true,
  'unified_search' => true,
  'full_text_search' => true,
  'unified_search_default_enabled' => true,
  'duplicate_merge' => true,
  'comment' => '',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'varchar',
      'len' => 50,
      'required' => false,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'trsubscribers_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'trsubscribers_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'trsubscribers_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'msisdn' => 
    array (
      'required' => false,
      'name' => 'msisdn',
      'vname' => 'LBL_MSISDN',
      'type' => 'varchar',
      'audited' => true,
      'len' => 25,
    ),
    'lead_source' => 
    array (
      'name' => 'lead_source',
      'vname' => 'LBL_LEAD_SOURCE',
      'type' => 'enum',
      'options' => 'lead_source_dom',
      'len' => '255',
      'comment' => 'How did the subscriber come about',
    ),
    'salutation' => 
    array (
      'name' => 'salutation',
      'vname' => 'LBL_SALUTATION',
      'type' => 'enum',
      'options' => 'salutation_dom',
      'massupdate' => false,
      'len' => '255',
      'comment' => 'Contact salutation (e.g., Mr, Ms)',
    ),
    'first_name' => 
    array (
      'name' => 'first_name',
      'vname' => 'LBL_FIRST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'First name of the contact',
      'merge_filter' => 'selected',
    ),
    'last_name' => 
    array (
      'name' => 'last_name',
      'vname' => 'LBL_LAST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'Last name of the contact',
      'merge_filter' => 'selected',
      'required' => true,
      'importable' => 'required',
    ),
    'customer_pwd' => 
    array (
      'name' => 'customer_pwd',
      'vname' => 'LBL_CUSTOMER_PWD',
      'type' => 'varchar',
      'len' => '50',
      'comment' => '',
    ),
    'customer_id' => 
    array (
      'name' => 'customer_id',
      'vname' => 'LBL_CUSTOMER_ID',
      'type' => 'varchar',
      'len' => '50',
      'comment' => '',
    ),
    'suberscriber_id' => 
    array (
      'name' => 'suberscriber_id',
      'vname' => 'LBL_SUBSCRIBER_ID',
      'type' => 'varchar',
      'len' => '50',
      'comment' => '',
    ),
    'subscriber_source' => 
    array (
      'name' => 'subscriber_source',
      'type' => 'varchar',
      'len' => '50',
      'vname' => 'LBL_SUBSCRIBER_SOURCE',
    ),
    'activation_date' => 
    array (
      'massupdate' => false,
      'name' => 'activation_date',
      'vname' => 'LBL_ACTIVATION_DATE',
      'type' => 'date',
      'comment' => '',
    ),
    'contract_binding_date' => 
    array (
      'massupdate' => false,
      'name' => 'contract_binding_date',
      'vname' => 'LBL_CONTRACT_BINDING_DATE',
      'type' => 'date',
      'comment' => '',
    ),
    'contract_binding' => 
    array (
      'name' => 'contract_binding',
      'vname' => 'LBL_CONTRACT_BINDING',
      'type' => 'enum',
      'len' => 2,
      'options' => 'call_contract_binding_dom',
      'required' => false,
      'importable' => 'required',
      'default' => '',
    ),
    'count_gsm' => 
    array (
      'massupdate' => false,
      'name' => 'count_gsm',
      'vname' => 'LBL_COUNT_GSM',
      'type' => 'int',
      'comment' => '',
    ),
    'last_call_date' => 
    array (
      'massupdate' => false,
      'name' => 'last_call_date',
      'vname' => 'LBL_LAST_CALL_DATE',
      'type' => 'date',
      'comment' => '',
    ),
    'last_call_response' => 
    array (
      'massupdate' => false,
      'name' => 'last_call_response',
      'vname' => 'LBL_LAST_CALL_RESPONSE',
      'type' => 'enum',
      'options' => 'call_status_dom',
      'comment' => '',
    ),
    'subscriber_tarif' => 
    array (
      'name' => 'subscriber_tarif',
      'type' => 'varchar',
      'len' => '150',
      'vname' => 'LBL_SUBSCRIBER_TARIF',
    ),
    'do_not_call' => 
    array (
      'name' => 'do_not_call',
      'vname' => 'LBL_DO_NOT_CALL',
      'type' => 'bool',
      'default' => '0',
      'audited' => true,
      'comment' => 'An indicator of whether contact can be called',
    ),
    'email_address' => 
    array (
      'name' => 'email_address',
      'type' => 'varchar',
      'len' => '250',
      'vname' => 'LBL_EMAIL_ADDRESS',
    ),
    'primary_address_street' => 
    array (
      'name' => 'primary_address_street',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'primary_address',
      'comment' => 'Street address for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_street_2' => 
    array (
      'name' => 'primary_address_street_2',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'primary_address_street_3' => 
    array (
      'name' => 'primary_address_street_3',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'primary_address_city' => 
    array (
      'name' => 'primary_address_city',
      'vname' => 'LBL_PRIMARY_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'City for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_state' => 
    array (
      'name' => 'primary_address_state',
      'vname' => 'LBL_PRIMARY_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'State for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_postalcode' => 
    array (
      'name' => 'primary_address_postalcode',
      'vname' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'primary_address',
      'comment' => 'Postal code for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_country' => 
    array (
      'name' => 'primary_address_country',
      'vname' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'primary_address',
      'comment' => 'Country for primary address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street' => 
    array (
      'name' => 'alt_address_street',
      'vname' => 'LBL_ALT_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'alt_address',
      'comment' => 'Street address for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street_2' => 
    array (
      'name' => 'alt_address_street_2',
      'vname' => 'LBL_ALT_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'alt_address_street_3' => 
    array (
      'name' => 'alt_address_street_3',
      'vname' => 'LBL_ALT_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
    ),
    'alt_address_city' => 
    array (
      'name' => 'alt_address_city',
      'vname' => 'LBL_ALT_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'City for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_state' => 
    array (
      'name' => 'alt_address_state',
      'vname' => 'LBL_ALT_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'State for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_postalcode' => 
    array (
      'name' => 'alt_address_postalcode',
      'vname' => 'LBL_ALT_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'alt_address',
      'comment' => 'Postal code for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_country' => 
    array (
      'name' => 'alt_address_country',
      'vname' => 'LBL_ALT_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'alt_address',
      'comment' => 'Country for alternate address',
      'merge_filter' => 'enabled',
    ),
    'contact_id' => 
    array (
      'name' => 'contact_id',
      'rname' => 'id',
      'id_name' => 'contact_id',
      'vname' => 'LBL_CONTACT_ID',
      'type' => 'relate',
      'table' => 'contacts',
      'isnull' => 'true',
      'module' => 'Contacts',
      'dbType' => 'id',
      'reportable' => false,
      'massupdate' => false,
      'required' => false,
      'duplicate_merge' => 'disabled',
    ),
    'contact_link' => 
    array (
      'name' => 'contact_link',
      'type' => 'link',
      'relationship' => 'contact_trsubscribers',
      'link_type' => 'one',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACT_LINK',
      'duplicate_merge' => 'disabled',
    ),
    'contact_name' => 
    array (
      'name' => 'contact_name',
      'rname' => 'name',
      'id_name' => 'contact_id',
      'vname' => 'LBL_CONTACT_NAME',
      'join_name' => 'contacts',
      'type' => 'relate',
      'link' => 'contact_link',
      'table' => 'contacts',
      'isnull' => 'true',
      'module' => 'Contacts',
      'dbType' => 'varchar',
      'len' => '255',
      'source' => 'non-db',
      'unified_search' => true,
      'required' => false,
    ),
    'account_id' => 
    array (
      'name' => 'account_id',
      'rname' => 'id',
      'id_name' => 'account_id',
      'vname' => 'LBL_ACCOUNT_ID',
      'type' => 'relate',
      'table' => 'accounts',
      'isnull' => 'true',
      'module' => 'Accounts',
      'dbType' => 'id',
      'reportable' => false,
      'massupdate' => false,
      'required' => false,
      'duplicate_merge' => 'disabled',
    ),
    'account_link' => 
    array (
      'name' => 'account_link',
      'type' => 'link',
      'relationship' => 'account_trsubscribers',
      'link_type' => 'one',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNT_LINK',
      'duplicate_merge' => 'disabled',
    ),
    'account_name' => 
    array (
      'name' => 'account_name',
      'rname' => 'name',
      'id_name' => 'account_id',
      'vname' => 'LBL_ACCOUNT_NAME',
      'join_name' => 'accounts',
      'type' => 'relate',
      'link' => 'account_link',
      'table' => 'accounts',
      'isnull' => 'true',
      'module' => 'Accounts',
      'dbType' => 'varchar',
      'len' => '255',
      'source' => 'non-db',
      'unified_search' => true,
      'required' => false,
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'trsubscribers_calls',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
  ),
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'trsubscriberspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    0 => 
    array (
      'name' => 'idx_trsubscriber_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'id',
        1 => 'deleted',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_trsubscriber_name_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_trsubscriber_msisdn_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'msisdn',
        1 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'idx_trsubscriber_contact_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contact_id',
      ),
    ),
    4 => 
    array (
      'name' => 'idx_trsubscriber_contact_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contact_id',
        1 => 'deleted',
      ),
    ),
    5 => 
    array (
      'name' => 'idx_trsubscriber_account_id',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'account_id',
      ),
    ),
    6 => 
    array (
      'name' => 'idx_trsubscriber_account_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'account_id',
        1 => 'deleted',
      ),
    ),
  ),
  'relationships' => 
  array (
    'trsubscribers_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'TRSubscribers',
      'rhs_table' => 'trsubscribers',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'trsubscribers_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'TRSubscribers',
      'rhs_table' => 'trsubscribers',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'trsubscribers_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'TRSubscribers',
      'rhs_table' => 'trsubscribers',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'contact_trsubscribers' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'TRSubscribers',
      'rhs_table' => 'trsubscribers',
      'rhs_key' => 'contact_id',
      'relationship_type' => 'one-to-many',
    ),
    'account_trsubscribers' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'TRSubscribers',
      'rhs_table' => 'trsubscribers',
      'rhs_key' => 'account_id',
      'relationship_type' => 'one-to-many',
    ),
    'trsubscribers_calls' => 
    array (
      'lhs_module' => 'TRSubscribers',
      'lhs_table' => 'trsubscribers',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'TRSubscribers',
    ),
  ),
  'optimistic_locking' => true,
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);