<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['TRSubscribers'] = array(
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array(
        'activities' => array(
            'order' => 10,
            'sort_order' => 'desc',
            'sort_by' => 'date_start',
            'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
            'type' => 'collection',
            'subpanel_name' => 'activities',   //this values is not associated with a physical file.
            'module'=>'Activities',

            'top_buttons' => array(
                //array('widget_class' => 'SubPanelTopCreateTaskButton'),
                //array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
                array('widget_class' => 'SubPanelTopScheduleCallButtonCustom'),
                //array('widget_class' => 'SubPanelTopComposeEmailButton'),
            ),
            'collection_list' => array(
                /*
                'tasks' => array(
                    'module' => 'Tasks',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'tasks',
                ),
                'tasks_parent' => array(
                    'module' => 'Tasks',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'tasks_parent',
                ),
                'meetings' => array(
                    'module' => 'Meetings',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'meetings',
                ),
                */
                'calls' => array(
                    'module' => 'Calls',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'calls',
                ),
            )
        ),
        'history' => array(
            'order' => 20,
            'sort_order' => 'desc',
            'sort_by' => 'date_entered',
            'title_key' => 'LBL_HISTORY_SUBPANEL_TITLE',
            'type' => 'collection',
            'subpanel_name' => 'history',   //this values is not associated with a physical file.
            'module'=>'History',

            'top_buttons' => array(
                //array('widget_class' => 'SubPanelTopCreateNoteButton'),
                //array('widget_class' => 'SubPanelTopArchiveEmailButton'),
                //array('widget_class' => 'SubPanelTopSummaryButton'),
            ),

            'collection_list' => array(
                /*
                'tasks' => array(
                    'module' => 'Tasks',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'tasks',
                ),
                'tasks_parent' => array(
                    'module' => 'Tasks',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'tasks_parent',
                ),
                'notes_parent' => array(
                    'module' => 'Notes',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'notes_parent',
                ),
                'meetings' => array(
                    'module' => 'Meetings',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'meetings',
                ),
                 */
                'calls' => array(
                    'module' => 'Calls',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'calls',
                ),
                /*
                'notes' => array(
                    'module' => 'Notes',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'notes',
                ),*/
            )
        ),

    )
);
?>
