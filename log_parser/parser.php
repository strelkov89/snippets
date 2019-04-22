<?php

set_time_limit(120);

$fileName = $argv[1];

$views = 0;
$traffic = 0;
$crawlers = [];
$statusCodes = [];
$hosts = [];

$botUserAgents = [
    'Googlebot' => 'Google',
    'Bingbot' => 'Bing',
    'Slurp' => 'Yahoo',
    'DuckDuckBot' => 'DuckDuckGo',
    'Baiduspider' => 'Baidu',
    'YandexBot' => 'Yandex',
    'Sogou' => 'Sogou',
    'Konqueror' => 'Exalead',
    'Exabot' => 'Exalead',
    'facebot' => 'Facebook',
    'facebookexternalhit' => 'Facebook',
    'ia_archiver' => 'Alexa'
];

function getIntNumber(string $str, int $start, int $length = null): int
{
    if ($length) {
        $result = (int)trim(substr($str, $start, $length));
    } else {
        $result = (int)trim(substr($str, $start));
    }
    return $result;
}

$file = fopen($fileName, "r") or die("Couldn't open file");

if ($file) {
    while (!feof($file)) {
        $line = fgets($file, 4096);
        if (empty($line)) {
            continue;
        }

        $views++;
        $lineParts = explode('"', $line);

        if (!empty($lineParts[3])) {
            $host = parse_url($lineParts[3], PHP_URL_HOST);

            if (!empty($host) && !in_array($host, $hosts)) {
                $hosts[] = $host;
            }
        }

        $traffic += getIntNumber($lineParts[2], 4);

        $code = getIntNumber($lineParts[2], 0, 4);
        if ($code != 0) {
            if (array_key_exists($code, $statusCodes)) {
                $statusCodes[$code]++;
            } else {
                $statusCodes[$code] = 1;
            }
        }

        foreach ($botUserAgents as $botUserAgent => $organization) {
            if (strpos($lineParts[5], $botUserAgent) !== false) {
                if (array_key_exists($organization, $crawlers)) {
                    $crawlers[$organization]++;
                } else {
                    $crawlers[$organization] = 1;
                }
                break;
            }
        }

    }
    fclose($file);
}

$url = count($hosts);

echo json_encode([
    'views' => $views,
    'urls' => $url,
    'traffic' => $traffic,
    'crawlers' => $crawlers,
    'statusCodes' => $statusCodes
]);
