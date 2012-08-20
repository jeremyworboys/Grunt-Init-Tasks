<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require PATH_THIRD.'{%= name %}/config.php';

/**
 * Plugin Info
 *
 * @var array
 */
$plugin_info = array(
    'pi_name'           => {%= upper_name %}_NAME,
    'pi_version'        => {%= upper_name %}_VERSION,
    'pi_author'         => '{%= author_name %}',
    'pi_author_url'     => '{%= author_url %}',
    'pi_description'    => '{%= description %}',
    'pi_usage'          => {%= class_name %}::usage()
);

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


   /**
     * Usage
     *
     * @return string How to use this plugin
     */
    public function usage()
    {
        ob_start(); ?>

{%= name %}
===========================

{%= description %}


Tags
===========================

tag name
---------------------------

The tag has the following parameters:

- ...


Single Variables
===========================

{tag}
---------------------------

...


Conditional Variables
===========================

var name
---------------------------

...


Example
===========================

...


Changelog
===========================

Version {%= version %}
---------------------------

- Initial release

    <?php
        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }
}
// END CLASS
