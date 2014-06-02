<?php
/**
 * Definition of log events
 *
 * @package    mod_pasantest
 */

defined('MOODLE_INTERNAL') || die();

global $DB;

$logs = array(
    array('module'=>'pasantest', 'action'=>'add', 'mtable'=>'pasantest', 'field'=>'name'),
    array('module'=>'pasantest', 'action'=>'update', 'mtable'=>'pasantest', 'field'=>'name'),
    array('module'=>'pasantest', 'action'=>'view', 'mtable'=>'pasantest', 'field'=>'name'),
    array('module'=>'pasantest', 'action'=>'view all', 'mtable'=>'pasantest', 'field'=>'name')
);
