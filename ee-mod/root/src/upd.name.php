<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'{%= name %}/config.php';

/**
 * {%= title %}
 *
 * @package    {%= name %}
 * @author     {%= author_name %} <{%= author_email %}>
 * @link       {%= homepage %}
 * @copyright  Copyright (c) {%= grunt.template.today('yyyy') %} {%= author_name %}
 */
class {%= class_name %}_upd {

    public $version     = {%= upper_name %}_VERSION;
    public $module_name = '{%= class_name %}';


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }

    /**
     * Install
     *
     * Create any db tables
     *
     * @return bool Always true
     */
    public function install()
    {
        $this->EE->db->insert('modules', array(
            'module_name' => $this->module_name,
            'module_version' => $this->version,
            'has_cp_backend' => 'y', // the module has a control panel
            'has_publish_fields' => 'y' // the module adds tabs/fields to the publish page
        ));

        // If the module needs to invoke actions based on frontend behavior such
        // as form submission
        $this->EE->db->insert('actions', array(
            'class'  => $this->module_name,
            'method' => 'method_to_call'
        ));

        // This is ONLY used if the module adds a tab to the publish page and it
        // requires the tabs() function
        $this->EE->load->library('layout');
        $this->EE->layout->add_layout_tabs($this->tabs(), $this->module_name);

        return true;
    }


    /**
     * Update
     *
     * Update any db tables
     *
     * @param string The last recorded version of the module in the exp_modules table
     * @return bool False if no update was necessary, true otherwise
     */
    public function update($current = '')
    {
        if (version_compare($current, $this->version, '=')) {
            return false;
        }

        if (version_compare($current, '1.0.0', '<')) {
            // Do your update code here
        }

        return true;
    }


    /**
     * Uninstall
     *
     * Remove any db tables
     *
     * @return bool Always true
     */
    public function uninstall()
    {
        $query = $this->EE->db
            ->select('module_id')
            ->get_where('modules', array('module_name' => $this->module_name));

        $this->EE->db
            ->where('module_id', $query->row('module_id'))
            ->delete('module_member_groups');

        $this->EE->db
            ->where('module_name', $this->module_name)
            ->delete('modules');

        // If the module needs to invoke actions based on frontend behavior such
        // as form submission
        $this->EE->db
            ->where('class', $this->module_name)
            ->delete('actions');


        // This is ONLY used if the module adds a tab to the publish
        $this->EE->load->library('layout');
        $this->EE->layout->delete_layout_tabs($this->tabs(), $this->module_name);

        return true;
    }


    /**
     * Tabs
     *
     * Called on install and uninstall when updating custom publish page layouts
     *
     * @return array The top level key is the name of the tab. Within that
     *  array, each field name acts is a key, and contains the default display
     *  states to be added to any existing custom layouts
     */
    function tabs()
    {
        $tabs['tab_name'] = array(
            'field_name'  => array(
                'visible'     => 'true',
                'collapse'    => 'false',
                'htmlbuttons' => 'false',
                'width'       => '100%'
            )
        );

        return $tabs;
    }
}
// END CLASS
