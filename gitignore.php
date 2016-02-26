#!/usr/bin/env php
<?php
error_reporting(-1);
ini_set('display_errors', 'on');
define('API_URL', 'https://www.gitignore.io/api/');
define('TEMPLATE_URL', 'https://www.gitignore.io/dropdown/templates.json');
define('TEMPLATE_CACHE_FILE', $_SERVER['HOME'] . '/.gitignore_template_cache');
define('TEMPLATE_CACHE_TIME', 600);
define('METAPHONE_LENGTH', 5);
if (is_file(TEMPLATE_CACHE_FILE) && (filemtime(TEMPLATE_CACHE_FILE) + TEMPLATE_CACHE_TIME) >= time()) {
    $data = unserialize(file_get_contents(TEMPLATE_CACHE_FILE));

} else {
    $data = [];
    foreach (json_decode(file_get_contents(TEMPLATE_URL)) as $tpl) {
        $data[] = $tpl->id;
    }
    file_put_contents(TEMPLATE_CACHE_FILE, serialize($data));
}

if (array_key_exists(1, $_SERVER['argv']) && $_SERVER['argv'][1] == '_AC_') {

    $cmdline = $_SERVER['argv'];
    $command = array_shift($cmdline);
    $acParameter = array_shift($cmdline);
    $cursorPosition = array_shift($cmdline);
    @$activeWord = $cmdline[$cursorPosition];
    $ret = [];
    if ($activeWord) {
        foreach ($data as $d) {

            if (strpos($d, $activeWord) !== false) {
                $ret[] = $d;
            } elseif (strpos(metaphone($d, METAPHONE_LENGTH), metaphone($activeWord, METAPHONE_LENGTH)) !== false) {
                $ret[] = $d;
            }
        }
    }
    echo 'COMPREPLY=(';
    foreach ($ret as $r) {
        echo escapeshellarg($r);
        echo ' ';
    }
    echo ")\n";
    exit;
}
array_shift($_SERVER['argv']);
$url = API_URL . implode(',', $_SERVER['argv']);
echo '### generated from gitignore cli with parameter: ';
echo implode("\n", $_SERVER['argv']);
echo "\n";
readfile($url);
