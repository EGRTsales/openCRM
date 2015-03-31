<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * Deutsche Sprachdatei für SugarCRM 6.5 (C) iscon group kft. Robert Laussegger
 * Die Weitergabe oder Vervielfältigung dieser Datei ist ausdrücklich verboten
 * Lizensiert für: xxtobereplacedxx--------------------------------------
 * 
 ********************************************************************************/

$mod_strings = array (
  'LBL_MODULE_NAME' => 'Währungen',
  'LBL_LIST_FORM_TITLE' => 'Währungen',
  'LBL_CURRENCY' => 'Währung',
  'LBL_ADD' => 'Hinzufügen',
  'LBL_MERGE' => 'Zusammenführen',
  'LBL_MERGE_TXT' => 'Bitte wählen Sie die Währungen aus, die Sie zusammenführen möchten. Dieser Befehl löscht alle ausgewählten Währungen, nachdem die betreffenden Einträge neu zugeordnet wurden..',
  'LBL_US_DOLLAR' => 'Euro',
  'LBL_DELETE' => 'Löschen',
  'LBL_LIST_SYMBOL' => 'Währungssymbol',
  'LBL_LIST_NAME' => 'Währungsname',
  'LBL_LIST_ISO4217' => 'ISO 4217 Code',
  'LBL_LIST_ISO4217_HELP' => 'Geben Sie den 3-stelligen ISO 4217 Code ein der den Währungsnamen und -symbol definiert.',
  'LBL_UPDATE' => 'Aktualisieren',
  'LBL_LIST_RATE' => 'Wechselkurs',
  'LBL_LIST_RATE_HELP' => 'Das Verhältnis der Heimatwährung zu dieser Währung - wenn EUR die Heimatwährung ist dann tragen Sie hier ein, wie viele Währungseinheiten der neuen Währung einem EUR entsprechen (bei USD z.Zt. etwa 1,36)',
  'LBL_LIST_STATUS' => 'Status',
  'LNK_NEW_CONTACT' => 'Neuer Kontakt',
  'LNK_NEW_ACCOUNT' => 'Neue Firma',
  'LNK_NEW_OPPORTUNITY' => 'Neue Verkaufschance',
  'LNK_NEW_CASE' => 'Neuer Fall',
  'LNK_NEW_NOTE' => 'Neue Notiz oder Anlage',
  'LNK_NEW_CALL' => 'Neuer Anruf',
  'LNK_NEW_EMAIL' => 'Neue E-Mail',
  'LNK_NEW_MEETING' => 'Neues Meeting',
  'LNK_NEW_TASK' => 'Neue Aufgabe',
  'NTC_DELETE_CONFIRMATION' => 'Möchten Sie diesen Datensatz wirklich löschen? Es ist wahrscheinlich besser, den Status dieser Währung auf \'Inaktiv\' zu ändern, ansonsten werden alle Einträge in der Datenbank, welche diese Währung verwenden, automatisch in die Standardwährung konvertiert.',
  'LBL_BELOW_MIN' => 'Umrechnungskurs muss > 0 sein',
  'currency_status_dom' => 
  array (
    'Active' => 'Aktiv',
    'Inactive' => 'Inaktiv',
  ),
  'LBL_CREATED_BY' => 'Erstellt von:',
	'LBL_EDIT_LAYOUT' => 'Layout bearbeiten' /*for 508 compliance fix*/,
);


?>