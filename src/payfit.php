<?php

$c = $_GET["c"];
$u = $_GET["u"];

if (!$c) {
    header('HTTP/1.1 400 Bad Request');
    return;
}

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename="calendar-filtered.ics"');

$fn = fopen("https://api.payfit.com/hr/public/calendar/ics/$c","r");
$pattern = "UID:$u";

$started = false;
$buffer = "";
$display = false;

while(! feof($fn))  {
    $result = fgets($fn);
    if (!$result) break;
    
    $result = trim($result);

    if ($result == "BEGIN:VEVENT") {
        $started = true;
        $display = $u ? false : true;
        $buffer = "";
    }

    if ($started) {
        $buffer .= "$result\n";
        if (strncmp($result, $pattern, strlen($pattern)) == 0) $display = true;
    } else {
        echo("$result\n");
    }

    if ($result == "END:VEVENT") {
        if ($display) echo($buffer);
        $started = false;
    }
}

fclose($fn);
?>
