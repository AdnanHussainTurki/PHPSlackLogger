<?php

use myPHPnotes\SlackLogger;


require "vendor/autoload.php";
require "SlackLogger.php";

$slacklogger = new SlackLogger("https://hooks.slack.com/services/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");

try {
    $hello = "Adnan"
} catch (Error $e) {
    $slacklogger->logError($e);
}