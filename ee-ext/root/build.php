#!/usr/bin/php
<?php echo "\n";


$addon_name = basename(dirname(__FILE__));
$has_themes = (file_exists('src/theme') && is_dir('src/theme'));


// VERSSION
echo "Trying to determine build version...\n";
preg_match('/[0-9a-f]{7} [(](?:HEAD, )?tag: v([^,]+)/', `git log --oneline --decorate`, $m);

if (isset($m[1])) {
    $version = $m[1];
    echo "Found version $version...\n";
}
else {
    echo "Could not determine version...\n";
    echo "Exiting...\n";
    exit(1);
}
echo "\n";


// PREP
echo "Cleaning previous build...\n";
`rm -rf tmp build/`;

echo "Creating clean structure...\n";
`mkdir -p build/system/expressionengine/third_party`;


// ADD-ON
echo "Copying and renaming add-on into clean structure...\n";
`cp -R src/ build/system/expressionengine/third_party/$addon_name`;


// THEME
if ($has_themes) {
    echo "Creating theme structure...\n";
    `mkdir -p build/themes/third_party`;

    echo "Moving theme into place...\n";
    `mv build/system/expressionengine/third_party/$addon_name/theme build/themes/third_party/$addon_name`;
}
echo "\n";


// ZIP
echo "Zipping build...\n";
`cd build; zip -r $addon_name-$version.zip *`;

