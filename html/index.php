<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$userIP = getUserIP();
$geoData = file_get_contents("http://api.ipstack.com/$userIP?access_key=69d1c6a59b8cfb849eceea17a8d2a2c2");
$geoData = json_decode($geoData, true);

if (isset($geoData['country_code']) && $geoData['country_code'] === 'US') {
    header("Location: https://roastandrelish.store");
} else {
    header("Location: https://www.amazon.com/Simple-Joys-Carters-Short-Sleeve-Bodysuit/dp/B07GY1RRZF");
}

exit();
