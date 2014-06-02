<?php
/**
 * Prints a particular instance of pasantest
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_pasantest 
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // pasantest instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('pasantest', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $pasantest  = $DB->get_record('pasantest', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $pasantest  = $DB->get_record('pasantest', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $pasantest->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('pasantest', $pasantest->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = context_module::instance($cm->id);

add_to_log($course->id, 'pasantest', 'view', "view.php?id={$cm->id}", $pasantest->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/pasantest/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($pasantest->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');
//$PAGE->add_body_class('pasantest-'.$somevar);

// Output starts here
echo $OUTPUT->header();

if ($pasantest->intro) { // Conditions to show the intro can change to look for own settings or whatever
    echo $OUTPUT->box(format_module_intro('pasantest', $pasantest, $cm->id), 'generalbox mod_introbox', 'pasantestintro');
}

// Replace the following lines with you own code
echo $OUTPUT->heading('Yay! It works!');

// Finish the page
echo $OUTPUT->footer();
