
// Basic template description.
exports.description = 'Create an ExpressionEngine fieldtype.';

// Template-specific notes to be displayed before question prompts.
exports.notes = '_Project name_ be all lowercase and words separated by underscores. ' +
  '_Project title_ should be a human-readable title. For example, ' +
  'an fieldtype titled "Awesome Fieldtype" might have the name "awesome_fieldtype".';

// Any existing file or directory matching this wildcard will cause a warning.
exports.warnOn = '*';

// The actual init template.
exports.template = function(grunt, init, done) {

    var prompts = grunt.helper('prompt_for_obj');

    grunt.helper('prompt', {},
        [
            // Prompt for these values.
            grunt.helper('prompt_for', 'name'),
            grunt.helper('prompt_for', 'title'),
            grunt.helper('prompt_for', 'description'),
            grunt.helper('prompt_for', 'version'),
            grunt.helper('prompt_for', 'homepage'),
            grunt.helper('prompt_for', 'author_name'),
            grunt.helper('prompt_for', 'author_email'),
            grunt.helper('prompt_for', 'author_url')
        ],
        function(err, props) {

            props.class_name = props.name.charAt(0).toUpperCase() + props.name.slice(1);
            props.url_name =   props.name.replace(/[^a-z0-9]+/ig, '-');
            props.upper_name = props.name.toUpperCase();

            // Files to copy (and process).
            var files = init.filesToCopy(props);

            // Actually copy (and process) files.
            init.copyAndProcess(files, props);

            // All done!
            done();
        }
    );

};
