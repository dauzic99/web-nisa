<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class AntaresService
{
    protected $client;
    protected $baseUri = 'https://platform.antares.id:8443/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'X-M2M-Origin' => env('APPKEY'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);
    }

    /**
     * Fetch all data.
     *
     * @return mixed
     */
    public function fetchData()
    {
        $response = $this->client->request('GET', '~/antares-cse/antares-id/AQWM/weather_airQuality_nodeCore?fu=1&drt=2&ty=4');
        $datas =  json_decode($response->getBody()->getContents(), true);
        $filteredData = collect($datas['m2m:list'])
            ->map(function ($item) {
                // Check if 'm2m:cin' and 'con' key exists
                if (isset($item['m2m:cin'], $item['m2m:cin']['con'])) {
                    // Parse the 'ct' timestamp with Carbon
                    $timestamp = Carbon::createFromFormat('Ymd\THis', $item['m2m:cin']['ct']);
                    // Format the date using Carbon
                    $formattedDate = $timestamp->format('d-m-Y H:i:s');
                    $content  = json_decode($item['m2m:cin']['con'], true);
                    return [
                        'data' => $content,
                        'timestamp' => $formattedDate
                    ];
                }

                // Return null for items without 'con' key or 'm2m:cin' structure
                return null;
            })
            ->filter() // Removes null values from the collection
            ->values();
        return $filteredData;
    }

    /**
     * Fetch the latest data.
     *
     * @return mixed
     */
    public function fetchLatestData()
    {
        // Adjust header for this specific request
        $response = $this->client->request('GET', '~/antares-cse/antares-id/AQWM/weather_airQuality_nodeCore/la', [
            'headers' => [
                'Content-Type' => 'application/json;ty=4'
            ]
        ]);
        $datas =  json_decode($response->getBody()->getContents(), true);
        $cin = $datas['m2m:cin'];

        // Check if 'con' and 'ct' keys exist
        if (isset($cin['con']) && isset($cin['ct'])) {
            // Parse the 'ct' timestamp with Carbon
            $timestamp = Carbon::createFromFormat('Ymd\THis', $cin['ct'], 'UTC');
            // Format the date using Carbon
            $formattedDate = $timestamp->timezone('Asia/Jakarta')->format('d-M-Y h:i:s');

            // Decode the 'con' JSON string into an associative array
            $content = json_decode($cin['con'], true);

            // Combine the content with the formatted date
            $result = [
                'timestamp' => $formattedDate,
                'data' => $content
            ];
        }

        return $result;
    }
}
