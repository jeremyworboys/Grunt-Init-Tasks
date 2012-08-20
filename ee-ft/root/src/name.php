<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require PATH_THIRD.'{%= name %}/config.php';

/**
 * {%= title %}
 *
 * @package    {%= name %}
 * @author     {%= author_name %} <{%= author_email %}>
 * @link       {%= homepage %}
 * @copyright  Copyright (c) {%= grunt.template.today('yyyy') %} {%= author_name %}
 */
class {%= class_name %}_ft extends EE_Fieldtype {

    /**
     * Fieldtype Info
     *
     * @var array
     */
    public $info = array(
        'name'    => {%= upper_name %}_NAME,
        'version' => {%= upper_name %}_VERSION
    );


    /**
     * Replace Tag
     *
     * This method replaces the field tag on the front-end.
     *
     * @param  array  The field data (or prepped data, if using pre_process)
     * @param  array  The field parameters (if any)
     * @param  string The data between tag (for tag pairs)
     * @return string The text/HTML to replace the tag
     */
    public function replace_tag($data, $params=array(), $tagdata=FALSE)
    {
        // code...
    }


    /**
     * Display Field
     *
     * This method runs when displaying the field on the publish page in the CP
     *
     * @param  array  The data previously entered into this field
     * @return string The HTML output to be displayed for this field
     */
    public function display_field($field_data)
    {
        // code...
    }


    /**
     * Prepare for Saving the Field
     *
     * This method prepares the data to be saved to the entries table in the
     * database
     *
     * @param  array  The data entered into this field
     * @return string The data to be stored in the database
     */
    public function save($data)
    {
        // code...
    }


    // -------------------------------------------------------------------------


    /**
     * Install
     *
     * Create any db tables
     */
    public function install()
    {
        // code...
    }


    /**
     * Uninstall
     *
     * Remove any db tables
     */
    public function uninstall()
    {
        // code...
    }


    /**
     * Update
     *
     * Update any db tables
     */
    public function update()
    {
        // code...
    }
}
// END CLASS
