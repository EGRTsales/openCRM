<?php
class CallLogicHook{
	
	function CallLogicHook(){
		
	}

	public function after_save(&$bean, $event, $arguments){
            global $timedate;
            
            if($_REQUEST['relate_to'] == 'TRSubscribers' || $_REQUEST['return_module'] == 'TRSubscribers'){

                if($_REQUEST['relate_to'] == 'TRSubscribers')
                    $trsubscriber = BeanFactory::getBean("TRSubscribers", $_REQUEST['relate_id']);
                if($_REQUEST['return_module'] == 'TRSubscribers'){
                    $query="select * from calls where id = '".$bean->id."' and deleted = 0";
                    $dbObject = $GLOBALS['db']->query($query);
                    $res = $GLOBALS['db']->fetchByAssoc($dbObject);
                    $trsubscriber = BeanFactory::getBean("TRSubscribers", $res['parent_id']);
                }

                if(is_object($trsubscriber)){
                    $trsubscriber->last_call_response = $bean->status;
                    $date = explode (' ',$bean->date_modified);
                    
                    switch($bean->status){
                        case 'Held' :
                            $trsubscriber->activation_date = $date[0];
                            $trsubscriber->contract_binding = $_REQUEST['contract_binding'];
                            break;
                    }
                    
                    $trsubscriber->last_call_date = $date[0];
                    $trsubscriber->save();
                    unset($trsubscriber);
                }
            }
	}
}
?>
