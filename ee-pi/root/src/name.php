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
 * @license    Licensed under the {%= licenses %} license.
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


   /**
     * Usage
     *
     * @return string How to use this plugin.
     */
    public function usage()
    {
        ob_start(); ?>

Simple MailChimp
===========================

...


Parameters
===========================

The tag has xxxx possible parameters:

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

- ...

    <?php
        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }
}
// END CLASS
