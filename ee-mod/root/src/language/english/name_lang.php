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

$lang = array(

'{%= name %}_module_name' => {%= upper_name %}_NAME,
'{%= name %}_module_description' => '{%= description %}',

// Additional Key => Value pairs go here

''=>''
);
// END $lang
