<?php

if (!defined('{%= upper_name %}_VERSION')) {
    define('{%= upper_name %}_NAME', '{%= title %}');
    define('{%= upper_name %}_VERSION', '{%= version %}');
}

$config['name'] = {%= upper_name %}_NAME;
$config['version'] = {%= upper_name %}_VERSION;
$config['nsm_addon_updater']['versions_xml'] = 'http://complexcompulsions.com/add-ons/feed/{%= url_name %}/';
