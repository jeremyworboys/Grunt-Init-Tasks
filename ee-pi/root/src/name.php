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
class {%= class_name %} {

    public $return_data = "";

    /**
     * Constructor
     *
     * @param mixed Settings array or empty string if none exist.
     */
    public function __construct()
    {
        $this->EE =& get_instance();

        // Set output when no method is called
        $return_data = "";
    }


    /**
     * Install
     *
     * Handles {exp:{%= name%}:METHOD}
     */
    public function METHOD()
    {
        // code...
    }
}
// END CLASS
