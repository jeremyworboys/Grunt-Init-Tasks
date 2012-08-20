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
class {%= class_name %}_tab {

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();
    }


    /**
     * Publish Tabs
     *
     * Create the fields that will be displayed on the publish page
     *
     * @param string The channel_id the entry is currently being created in
     * @param string The entry_id if this is an edit, empty otherwise
     * @return array The display settings and values associated with each of the fields
     */
    public publish_tabs($channel_id, $entry_id = '')
    {
        $settings = array();
        $selected = array();
        $existing_files = array();

        $query = $this->EE->db->get('download_files');

        foreach ($query->result() as $row) {
            $existing_files[$row->file_id] = $row->file_name;
        }

        if ($entry_id != '') {
            $query = $this->EE->db->get_where('download_posts', array('entry_id' => $entry_id));

            foreach ($query->result() as $row) {
                $selected[] = $row->file_id;
            }
        }

        $id_instructions = lang('id_field_instructions');

        // Load the module lang file for the field label
        $this->EE->lang->loadfile('download');

        $settings[] = array(
            'field_id'             => '',      // The name of the field
            'field_label'          => '',      // The field label (typically a language variable is used here)
            'field_required'       => 'n',     // Indicates whether to include the 'required' class next to the field label
            'field_data'           => array(), // The current data, if applicable
            'field_list_items'     => '',      // An array of select options, otherwise an empty string
            'field_show_fmt'       => 'n',     // Determines whether the field format dropdown is shown: y/n. Note- if 'y', you must specify the options available in field_fmt
            'field_fmt'            => '',      // Allowed field format options, if applicable: an associative array or empty string
            'field_instructions'   => '',      // Instructions to be displayed for this field in the publish page
            'field_pre_populate'   => '',      // Allows you to pre-populate a field when it is a new entry
            'field_text_direction' => 'ltr',   // The direction of the text: ltr/rtl
            'field_type'           => ''       // May be any existing field type
        );

        return $settings;
    }


    /**
     * Validate Publish Tab Data
     *
     * Validate the data after the publish form has been submitted but before any additions to the database
     *
     * @param array All of the data available on the current submission
     * @return mixed False if there are no errors, an array of errors otherwise
     */
    public validate_publish($params)
    {
        $errors = array();

        if (!isset($params[0]['revision_post']['field_name'])) {
            $errors[lang('required')] = 'field__name_one');
        }

        return empty($errors) ? false : $errors;
    }


    /**
     * Publish Publish Tab Data
     *
     * Insert the data after the core insert/update has been done, thus making available the current $entry_id
     *
     * @param array The top level arrays consisting of: 'meta', 'data', 'mod_data', and 'entry_id'
     */
    public publish_data_db($params)
    {
        if (!isset($params['mod_data']['field_name_one']) OR $params['mod_data']['field_name_one'] == '') {
            return;
        }

        $data = array(
            'entry_id' => $params['entry_id'],
            'file_id' => $params['mod_data']['field_name_one']
        );

        $this->EE->db->insert('table_name', $data);
    }


    /**
     * Delete Publish Tab Data
     *
     * Called near the end of the entry delete function, this allows you to sync your records if any are tied to channel entry_ids
     *
     * @param array The entry_id's being deleted
     */
    public publish_data_delete_db($params)
    {
        // code...
    }
}
// END CLASS
