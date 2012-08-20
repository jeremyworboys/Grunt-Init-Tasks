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
class {%= class_name %}_acc {

    public $name            = {%= upper_name %}_NAME;
    public $id              = {%= upper_name %}_ID;
    public $version         = {%= upper_name %}_VERSION;
    public $description     = '{%= description %}';

    protected $sections     = array();


    /**
     * Constructor
     *
     * @param mixed Settings array or empty string if none exist.
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }


    /**
     * Set Sections
     *
     * Set content for the accessory.
     *
     * The array key will be the section heading, the array contents will be
     *  the accessory’s contents.
     */
    public function set_sections()
    {
        $this->sections['HEADING'] = 'CONTENT';
    }
}
// END CLASS
