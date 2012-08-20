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
class {%= class_name %} {

    public $return_data = '';


    /**
     * Constructor
     *
     * Handles {exp:{%= name%}}
     */
    public function __construct()
    {
        $this->EE =& get_instance();

        // Set output when no method is called
        $this->return_data = '';
    }


    /**
     * METHOD
     *
     * Handles {exp:{%= name%}:METHOD}
     */
    public function METHOD()
    {
        $this->return_data = '';
    }
}
// END CLASS
