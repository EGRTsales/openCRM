<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/json_config.php');

class CallsViewEdit extends ViewEdit
{
 	/**
 	 * @see SugarView::preDisplay()
 	 */
 	public function preDisplay()
 	{
 		if($_REQUEST['module'] != 'Calls' && isset($_REQUEST['status']) && empty($_REQUEST['status'])) {
                    $this->bean->status = 'Held';
 		} //if
                if(!empty($_REQUEST['status']) && ($_REQUEST['status'] == 'Held')) {
                    $this->bean->status = 'Held';
 		}
                if(empty($this->bean->name)){
                    $this->bean->name = 'Vertrags Verlängerung..';
                }
                
 		parent::preDisplay();
 	}

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display()
 	{
 		global $json;
        $json = getJSONobj();
        $json_config = new json_config();
		if (isset($this->bean->json_id) && !empty ($this->bean->json_id)) {
			$javascript = $json_config->get_static_json_server(false, true, 'Calls', $this->bean->json_id);

		} else {
			$this->bean->json_id = $this->bean->id;
			$javascript = $json_config->get_static_json_server(false, true, 'Calls', $this->bean->id);

		}
 		$this->ss->assign('JSON_CONFIG_JAVASCRIPT', $javascript);

 		if($this->ev->isDuplicate){
                    $this->bean->status = $this->bean->getDefaultStatus();
 		} //if
 		parent::display();
 	}
}
