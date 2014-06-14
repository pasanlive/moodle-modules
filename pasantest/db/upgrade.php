<?php

/**
 * This file keeps track of upgrades to the pasantest module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    mod_pasantest
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute pasantest upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_pasantest_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

    
    if ($oldversion < 2014061200) {
	  	echo 'updating db<br />';
    	$table = new xmldb_table('pasantest_course_selection');
    	echo 'table initialized';
    	
    	$field1 = new xmldb_field('studentid', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
    	$field2 = new xmldb_field('courseid', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, 'studentid');
    	$field3 = new xmldb_field('coursename', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'courseid');
    	$field4 = new xmldb_field('timecreated', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0','coursename');
    	$field5 = new xmldb_field('timemodified', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0','timecreated');
    	
    	echo 'fields created<br />';
    	
		$key = new xmldb_key('primary');
		echo 'init primary key<br />';
		
		$key->set_attributes(XMLDB_KEY_PRIMARY, array('studentid', 'courseid'), null, null);
    	
		echo 'key created<br />';

		$table->addField($field1);
    	$table->addField($field2);
    	$table->addField($field3);
    	$table->addField($field4);
    	$table->addField($field5);
    	echo 'field added<br />';
    	
    	
    	$table->addKey($key);
    	echo 'key created<br />';
    	
    	$status = $dbman->create_table($table);
    	echo 'table create status : ' . $status;
    	
    	upgrade_mod_savepoint(true, 2014061200, 'pasantest');
    }   

    return true;
}
