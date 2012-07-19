<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require PATH_THIRD.'{%= name %}/config.php';

/**
 * {%= title %}
 *
 * @package    {%= name %}
 * @author     {%= author_name %} <{%= author_email %}>
 * @link       {%= homepage %}
 * @copyright  Copyright (c) {%= grunt.template.today('yyyy') %} {%= author_name %}
 * @license    Licensed under the ☺ license <http://licence.visualidiot.com/>
 */
class {%= class_name %}_ext {

    public $name            = {%= upper_name %}_NAME;
    public $version         = {%= upper_name %}_VERSION;
    public $description     = '{%= description %}';
    public $settings_exist  = 'y';
    public $docs_url        = {%= homepage %};

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
     * HOOK TITLE
     *
     * DESCRIPTION
     */
    public function hook_name()
    {
        // code...
    }
}
// END CLASS
