<?php include_once "./pagespeed/pagespeed.php";

$settingFileName = 'settings.json';

if (isset($argv[1]) && !empty($argv[1])) {
    $newFileName = "settings-{$argv[1]}.json";
    if (file_exists(basename(__DIR__) . "/../{$newFileName}")) {
        $settingFileName = $newFileName;
    }
}

$parseSettings = file_get_contents($settingFileName);
$settings      = json_decode($parseSettings);

if (empty($settings)) {
    echo "settings.json does't exist or is empty!";
    return;
}

$apiKey = $settings->api_key ?? '';
$sites  = $settings->sites ?? [];

define( 'API_KEY', $apiKey );

$strategies = [
    'mobile',
    'desktop'
];

$csv = "";

if (!empty($sites)) {
    foreach( $sites as $site ) {
        foreach( $strategies as $strategy ) {
            echo "Fetching scores for [{$site->url}] Strategy [{$strategy}]";

            $result = parseResults( checkPageSpeed( $site->url, $strategy ) );

            echo " [DONE]\n";

            print_r($result);

            $csv .= implode(",", $result) . ",";

            sleep(2);
        }

        sleep(2);
    }
}


echo "\n\nCSV Output:\n\n";
echo substr($csv, 0, -1);
echo "\n\n\n";
