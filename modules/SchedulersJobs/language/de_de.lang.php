<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * Deutsche Sprachdatei für SugarCRM 6.5 (C) iscon group kft. Robert Laussegger
 * Die Weitergabe oder Vervielfältigung dieser Datei ist ausdrücklich verboten
 * Lizensiert für: xxtobereplacedxx--------------------------------------
 * 
 ********************************************************************************/

$mod_strings = array (
'LBL_NAME' => 'Job Name',
'LBL_EXECUTE_TIME'			=> 'Ausführungszeit',
'LBL_SCHEDULER_ID' 	=> 'Zeitplaner',
'LBL_STATUS' 	=> 'Job Status',
'LBL_RESOLUTION' 	=> 'Resultat',
'LBL_MESSAGE' 	=> 'Nachrichten',
'LBL_DATA' 	=> 'Job Daten',
'LBL_REQUEUE' 	=> 'Bei Fehlschlag wiederholen',
'LBL_RETRY_COUNT' 	=> 'Maximale Wiederholungen',
'LBL_FAIL_COUNT' 	=> 'Fehlschläge',
'LBL_INTERVAL' 	=> 'Minimum Intervall zwischen Versuchen',
'LBL_CLIENT' 	=> '??Eingentümer',
'LBL_PERCENT'	=> 'Prozent erledigt',
// Errors
'ERR_CALL' 	=> "Kann diese Funktion nicht aufrufen: %s",
'ERR_CURL' => "Kein CURL - Kann URL Jobs nicht durchführen",
'ERR_FAILED' => "Unerwarteter Fehler, bitte überprüfen Sie die Logs von Sugar und php.",
'ERR_PHP' => "%s [%d]: %s in %s auf Zeile %d",
'ERR_NOUSER' => "Für diesen Job wurde keine Benutzer ID angegeben",
'ERR_NOSUCHUSER' => "Benutzer ID %s nicht gefunden",
'ERR_JOBTYPE' 	=> "Unbekannter Jobtyp: %s",
'ERR_TIMEOUT' => "Erzwungener Fehler durch Zeitablauf",
'ERR_JOB_FAILED_VERBOSE' => 'Job %1$s (%2$s) im CRON Lauf fehlgeschlagen',
);
