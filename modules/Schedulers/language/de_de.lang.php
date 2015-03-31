<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * Deutsche Sprachdatei für SugarCRM 6.5 (C) iscon group kft. Robert Laussegger
 * Die Weitergabe oder Vervielfältigung dieser Datei ist ausdrücklich verboten
 * Lizensiert für: xxtobereplacedxx--------------------------------------
 * 
 ********************************************************************************/
global $sugar_config;

$mod_strings = array (
// OOTB Scheduler Job Names:
'LBL_OOTB_WORKFLOW'		=> 'Workflow Aufgaben verarbeiten',
'LBL_OOTB_REPORTS'		=> 'Berichte Aufgaben verarbeiten',
'LBL_OOTB_IE'			=> 'Eingehende E-Mail Konten überprüfen',
'LBL_OOTB_BOUNCE'		=> 'Unzustellbare Kampagnen E-Mails verarbeiten (Nacht)',
'LBL_OOTB_CAMPAIGN'		=> 'Kampagnen-Massenmails versenden (Nacht)',
'LBL_OOTB_PRUNE'		=> 'Datenbank am 1. des Monats säubern',
'LBL_OOTB_TRACKER'		=> 'Benutzerverlauf löschen',
'LBL_OOTB_SUGARFEEDS'   => 'SugarFeed Tabellen löschen',
'LBL_UPDATE_TRACKER_SESSIONS' => 'Tracker_sessions Tabelle aktualisieren',
'LBL_OOTB_SEND_EMAIL_REMINDERS'	=> 'E-Mail Erinnerungs Benachrichtigungen laufen lassen',
'LBL_OOTB_CLEANUP_QUEUE' => 'Jobs Warteschlange leeren',
'LBL_OOTB_REMOVE_DOCUMENTS_FROM_FS' => 'Entfernung von Dokumenten aus dem Dateisystem',

// List Labels
'LBL_LIST_JOB_INTERVAL' => 'Intervall:',
'LBL_LIST_LIST_ORDER' => 'Geplante Aufgaben:',
'LBL_LIST_NAME' => 'Geplante Aufgabe:',
'LBL_LIST_RANGE' => 'Bereich:',
'LBL_LIST_REMOVE' => 'Entfernen:',
'LBL_LIST_STATUS' => 'Status:',
'LBL_LIST_TITLE' => 'Aufgaben Liste:',
'LBL_LIST_EXECUTE_TIME' => 'Wird gestartet am:',
// human readable:
'LBL_SUN'		=> 'Sonntag',
'LBL_MON'		=> 'Montag',
'LBL_TUE'		=> 'Dienstag',
'LBL_WED'		=> 'Mittwoch',
'LBL_THU'		=> 'Donnerstag',
'LBL_FRI'		=> 'Freitag',
'LBL_SAT'		=> 'Samstag',
'LBL_ALL'		=> 'Jeden Tag',
'LBL_EVERY_DAY'	=> 'Jeden Tag ',
'LBL_AT_THE'	=> 'Am ',
'LBL_EVERY'		=> 'alle ',
'LBL_FROM'		=> 'Von  ',
'LBL_ON_THE'	=> 'Um  ',
'LBL_RANGE'		=> ' bis  ',
'LBL_AT' 		=> ' um ',
'LBL_IN'		=> ' in ',
'LBL_AND'		=> ' und ',
'LBL_MINUTES'	=> ' Minuten ',
'LBL_HOUR'		=> ' Stunden',
'LBL_HOUR_SING'	=> ' Stunde',
'LBL_MONTH'		=> ' Monat',
'LBL_OFTEN'		=> ' So oft wie möglich.',
'LBL_MIN_MARK'	=> ' Minuten nach',


// crontabs
'LBL_MINS' => 'min',
'LBL_HOURS' => 'h',
'LBL_DAY_OF_MONTH' => 'Datum',
'LBL_MONTHS' => 'Monat',
'LBL_DAY_OF_WEEK' => 'Tag',
'LBL_CRONTAB_EXAMPLES' => 'Das oben stehende verwendet die Standard Crontab Notation.',
'LBL_CRONTAB_SERVER_TIME_PRE' =>  'Die Cron Einstellungen laufen basierend auf der Zeitzone des Servers (',
'LBL_CRONTAB_SERVER_TIME_POST' => '). Bitte stellen Sie die Ausführungszeiten entsprechend ein.',
// Labels
'LBL_ALWAYS' => 'Immer',
'LBL_CATCH_UP' => 'Ausführen wenn versäumt',
'LBL_CATCH_UP_WARNING' => 'Deaktivieren, wenn der Lauf dieses Jobs mehr als einen Moment dauert.',
'LBL_DATE_TIME_END' => 'Enddatum &  Zeit',
'LBL_DATE_TIME_START' => 'Startdatum & Zeit',
'LBL_INTERVAL' => 'Intervall',
'LBL_JOB' => 'Job',
'LBL_JOB_URL' => 'Job URL',
'LBL_LAST_RUN' => 'Letzte erfolgreiche Durchführung',
'LBL_MODULE_NAME' => 'Sugar Zeitplaner',
'LBL_MODULE_TITLE' => 'Geplante Aufgaben',
'LBL_NAME' => 'Job Name',
'LBL_NEVER' => 'Nie',
'LBL_NEW_FORM_TITLE' => 'Neuer Termin',
'LBL_PERENNIAL' => 'andauernd',
'LBL_SEARCH_FORM_TITLE' => 'Geplante Aufgabe Suche',
'LBL_SCHEDULER' => 'Geplante Aufgabe:',
'LBL_STATUS' => 'Status',
'LBL_TIME_FROM' => 'Aktiv von',
'LBL_TIME_TO' => 'Aktiv bis',
'LBL_WARN_CURL_TITLE' => 'cURL Warnung:',
'LBL_WARN_CURL' => 'Warnung:',
'LBL_WARN_NO_CURL' => 'In diesem System sind die cURL Bibliotheken im PHP Modul nicht aktiviert (--with-curl=/pfad/zu/curl_library). Bitte kontaktieren Sie den Administrator zur Lösung dieses Problems. Ohne diese Funktionalität kann der Zeitplaner die Jobs nicht einreihen.',
'LBL_BASIC_OPTIONS' => 'Basis Setup',
'LBL_ADV_OPTIONS'		=> 'Erw. Optionen',
'LBL_TOGGLE_ADV' => 'Zeige erweiterte Optionen',
'LBL_TOGGLE_BASIC' => 'Basisoptionen anzeigen',
// Links
'LNK_LIST_SCHEDULER' => 'Geplante Aufgaben',
'LNK_NEW_SCHEDULER' => 'Neue Aufgabe',
'LNK_LIST_SCHEDULED' => 'Geplante Jobs',
// Messages
'SOCK_GREETING' => "\nDies ist die Oberfläche für die Services des Sugar Zeitplaners. \n[ Verfügbare daemon Kommandos: start|restart|shutdown|status ]\nUm zu verlassen, tippen Sie  'quit'. Um das Service herunterzufahren 'shutdown'.\n",
'ERR_DELETE_RECORD' => 'Zum Löschen des Plans muss eine Datensatznummer angegeben werden.',
'ERR_CRON_SYNTAX' => 'Ungültige Cron Syntax',
'NTC_DELETE_CONFIRMATION' => 'Sind Sie sicher, dass Sie diesen Eintrag löschen wollen?',
'NTC_STATUS' => 'Zum Entfernen dieses Plans von der Terminplaner Auswahlliste setzen Sie den Status auf inaktiv',
'NTC_LIST_ORDER' => 'Setzen Sie die Reihenfolge, in der dieser Plan in der Terminplaner Auswahlliste erscheinen soll.',
'LBL_CRON_INSTRUCTIONS_WINDOWS' => 'Konfiguration des Windows Terminplaners',
'LBL_CRON_INSTRUCTIONS_LINUX' => 'Konfiguration eines crontab Eintrages',
'LBL_CRON_LINUX_DESC' => 'Hinweis: Um den Sugar Zeitplaner auszuführen fügen Sie die folgende Zeile zu Ihrer crontab Datei hinzu: ',
'LBL_CRON_WINDOWS_DESC' => 'Hinweis: Um den Sugar Zeitplaner auszuführen erstellen Sie eine Stapeldatei die Sie mit Windows Geplante Aufgaben ausführen. Die Stapeldatei sollte folgende Kommandos enthalten: ',
'LBL_NO_PHP_CLI' => 'Wenn Ihr Host keine PHP-Binary zur Verfügung stellt, können Sie Ihre Jobs mittels wget oder curl starten:<br>for wget: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;wget --quiet --non-verbose '.$sugar_config['site_url'].'/cron.php > /dev/null 2>&1</b><br>for curl: <b>*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;curl --silent '.$sugar_config['site_url'].'/cron.php > /dev/null 2>&1',
// Subpanels
'LBL_JOBS_SUBPANEL_TITLE'	=> 'Aktive Jobs',
'LBL_EXECUTE_TIME'			=> 'Ausführungszeit',

//jobstrings
'LBL_REFRESHJOBS' => 'Jobs aktualisieren',
'LBL_POLLMONITOREDINBOXES' => 'Eingehende E-Mail Konten überprüfen',
'LBL_PERFORMFULLFTSINDEX' => 'Volltextsuche Systemindexierung',

'LBL_RUNMASSEMAILCAMPAIGN' => 'Kampagnen-Massenmails versenden (Nacht)',
'LBL_POLLMONITOREDINBOXESFORBOUNCEDCAMPAIGNEMAILS' => 'Unzustellbare Kampagnen E-Mails verarbeiten (Nacht)',
'LBL_PRUNEDATABASE' => 'Datenbank am 1. des Monats säubern',
'LBL_TRIMTRACKER' => 'Benutzerverlauf löschen',
'LBL_TRIMSUGARFEEDS'   => 'SugarFeed Tabellen löschen',
'LBL_SENDEMAILREMINDERS'=> 'E-Mail Erinnerungs Benachrichtigungen senden',
'LBL_CLEANJOBQUEUE' => 'Jobs Warteschlange leeren',
'LBL_REMOVEDOCUMENTSFROMFS' => 'Entfernung von Dokumenten aus dem Dateisystem',
);
?>
