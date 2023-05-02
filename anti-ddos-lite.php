<?php

require 'src/anti-ddos-lib.php';

// Define constants for configuration options
define('ANTI_DDOS_PROTECTION_ENABLE', true);
define('ANTI_DDOS_DEBUG', true);
define('TEST_NOT_RATED_UA', false);
define('SECURE_COOKIE_DAYS', 180);
define('REDIRECT_DELAY', 3);
define('SECURE_LABEL', 'ct_anti_ddos_key');
define('ANTI_DDOS_SALT', '4xU9mn2X7iPZpeW2');

/**
 * Main entry point for the anti-DDoS protection.
 */
function runAntiDdosProtection()
{
    // Get the visitor's IP address
    $remoteIp = $_SERVER['REMOTE_ADDR'];

    // Define the data array with configuration options and other data
    $data = [
        'anti_ddos_protection_enable' => ANTI_DDOS_PROTECTION_ENABLE,
        'anti_ddos_debug' => ANTI_DDOS_DEBUG,
        'test_not_rated_ua' => TEST_NOT_RATED_UA,
        'secure_cookie_days' => SECURE_COOKIE_DAYS,
        'redirect_delay' => REDIRECT_DELAY,
        'remote_ip' => $remoteIp,
        'secure_label' => SECURE_LABEL,
        'test_headless' => true,
        'anti_ddos_salt' => ANTI_DDOS_SALT,
    ];

    // Run the anti-DDoS protection
    if (ANTI_DDOS_PROTECTION_ENABLE || antiDdosCheckDatFileExist()) {
        antiDdosProtectionMain($data);
    }
}

// Run the anti-DDoS protection
runAntiDdosProtection();
