<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class TRSubscriber extends Basic {

    var $field_name_map = array();
    var $module_dir = 'TRSubscribers';
    var $object_name = "TRSubscriber";
    var $table_name = "trsubscribers";
    var $importable = true;
    var $new_schema = true;
    var $tracker_visibility = false;
    // Stored fields
    var $id;
    var $name;
    var $date_entered;
    var $date_modified;
    var $modified_by_name;
    var $modified_user_id;
    var $assigned_user_id;
    var $created_by;
    var $created_by_name;
    var $currency_id;
    var $description;
    // FieldDefs

    // This is used to retrieve related fields from form posts.
    var $additional_column_fields = Array('assigned_user_name', 'assigned_user_id', 'msisdn');
    
    // var $relationship_fields = Array('account_id' => 'account_link');

    function TRSubscriber() {
        parent::SugarBean();

        foreach ($this->field_defs as $field) {
            if (isset($field['name'])) {
                $this->field_name_map[$field['name']] = $field;
            }
        }
    }

    function get_summary_text() {
        return $this->msisdn;
    }
    
    function bean_implements($interface){
        switch($interface){
                case 'ACL':return true;
        }
        return false;
    }  
    
    function save($check_notify = FALSE){
        
        if(!empty($this->contract_binding)){
            $next_vvl_date = new DateTime($this->activation_date);
            $interval = new DateInterval('P'.$this->contract_binding.'M');
            $next_vvl_date->add($interval);
            $this->contract_binding_date = $next_vvl_date->format('Y-m-d');
        }
        
        parent::save();
        return $this->id;
    }
    
    
}
