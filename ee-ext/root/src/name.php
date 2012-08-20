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
class {%= class_name %}_ext {

    public $name            = {%= upper_name %}_NAME;
    public $version         = {%= upper_name %}_VERSION;
    public $description     = '{%= description %}';
    public $settings_exist  = 'y';
    public $docs_url        = '{%= homepage %}';

    protected $settings     = array();

    private $hooks          = array();


    /**
     * Constructor
     *
     * @param mixed Settings array or empty string if none exist.
     */
    public function __construct($settings='')
    {
        $this->EE =& get_instance();

        $this->settings = $settings;
    }


    /**
     * HOOK TITLE
     *
     * DESCRIPTION
     */
    public function hook_name()
    {
        // code...
    }


    // -------------------------------------------------------------------------


    /**
     * Activate Extension
     *
     * This function enters the extension into the exp_extensions table
     */
    public function activate_extension()
    {
        $this->settings = array();

        foreach ($this->hooks as $hook) {
            $this->EE->db->insert('extensions', array(
                'class'     => __CLASS__,
                'method'    => $hook,
                'hook'      => $hook,
                'settings'  => serialize($this->settings),
                'priority'  => 10,
                'version'   => $this->version,
                'enabled'   => 'y'
            ));
        }
    }


    /**
     * Disable Extension
     *
     * This method removes information from the exp_extensions table
     */
    public function disable_extension()
    {
        $this->EE->db
            ->where('class', __CLASS__)
            ->delete('extensions');
    }


    /**
     * Update Extension
     *
     * This function performs any necessary db updates when the extension
     * page is visited
     *
     * @return mixed Void on update / false if none
     */
    function update_extension($current = '')
    {
        if ($current == '' OR $current == $this->version) {
            return FALSE;
        }

        if ($current < '1.0.0') {
            // Update to version 1.0.0
        }

        $this->EE->db
            ->where('class', __CLASS__)
            ->update('extensions', array(
                'version' => $this->version
            ));
    }
}
// END CLASS
