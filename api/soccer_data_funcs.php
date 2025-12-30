<?php
require_once "config.php";

function getLeagueMatches(string $league, int $weekOffset): array {

    // Check input
    if (!preg_match("/^[A-Z0-9]+$/", $league)) {
        return [];
    }

    $startDate = date("Y-m-d", strtotime("today +{$weekOffset} week"));
    $endDate = date("Y-m-d", strtotime("{$startDate} 1 week"));

    // Test dates
    //echo $startDate;
    //echo $endDate;

    $url = "https://api.football-data.org/v4/matches?" . "competitions=$league" .
           "&dateFrom=$startDate" . "&dateTo=$endDate";

    // API Request
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => ["X-Auth-Token: " . apikey], CURLOPT_TIMEOUT => 10]);    
    $response = curl_exec($ch);
    curl_close($ch);

    // Check if response is successful
    if (!$response){
        return [];
    }

    $data = json_decode($response, true);
    return $data["matches"] ?? [];
}

function formatDate(string $utcDate, string $timezone = "America/New_York"): string {
    try {
        $date = new DateTime($utcDate, new DateTimeZone("UTC"));
        $date->setTimezone(new DateTimeZone($timezone));
        return $date->format("D M j, g:i A T");
    } catch (Exception $e) {
        return (new DateTime($utcDate))->format("D M j, g:i A") . " UTC";
    }
}







?>