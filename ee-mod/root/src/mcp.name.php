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
class {%= class_name %}_mcp {

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();

        // Add an extra level of navigation
        $this->EE->cp->set_right_nav(array(
            'METHOD_NAME' => BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module={%= name %}'.AMP.'method=METHOD_NAME'
        ));
    }


    /**
     * Control Panel module homepage
     *
     * This is displayed when the user click on the module in in add-ons -> modules
     *
     * @return string The HTML to be displayed on this page
     */
    public function index()
    {
        $this->EE->cp->set_variable('cp_page_title', $this->EE->lang->line('{%= name %}_module_name')); // This also sets the current breadcrumb text

        // Prepare data to be sent to the view file
        $vars = array();

        // Generally you will load a view file to display the page
        return $this->EE->load->view('index', $vars, true);
    }


    /**
     * CONTROL PANEL PAGE
     *
     * DESCRIPTION
     *
     * @return string The HTML to be displayed on this page
     */
    public function METHOD_NAME()
    {
        $this->EE->cp->set_variable('cp_page_title', $this->EE->lang->line('METHOD_NAME_title')); // This also sets the current breadcrumb text
        $this->EE->cp->set_breadcrumb(BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=module_name', $this->EE->lang->line('{%= name %}_module_name'));

        // Prepare data to be sent to the view file
        $vars = array();

        // Generally you will load a view file to display the page
        return $this->EE->load->view('index', $vars, true);
    }
}
// END CLASS
