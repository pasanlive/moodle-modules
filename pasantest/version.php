<?php

/**
 * Defines the version of pasantest
 *
 * This code fragment is called by moodle_needs_upgrading() and
 * /admin/index.php
 *
 * @package    mod_pasantest
 */

defined('MOODLE_INTERNAL') || die();

//$module->version   = 0.0.1;               // If version == 0 then module will not be installed
$module->version   = 2014050300;      // The current module version (Date: YYYYMMDDXX)
$module->requires  = 2010031900;      // Requires this Moodle version
$module->cron      = 0;               // Period for cron to check this module (secs)
$module->component = 'mod_pasantest'; // To check on upgrade, that module sits in correct place
