<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class SiteApiController extends Controller
{
    public function getApiData($apiType)
    {
        $apiURL = 'https://jsonplaceholder.typicode.com/posts';

        $client = new Client();
        $response = $client->request($apiType, $apiURL);

        return $response;
    }

    public function index()
    {
        try {
            $getData = json_decode($this->getApiData('GET')->getBody()->getContents());
            $data = collect($getData)->where('userId', 1);
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        return view('sites', compact('data'));
    }

    public function detail($id)
    {
        try {
            $getData = json_decode($this->getApiData('GET')->getBody()->getContents());
            $data = collect($getData)->where('id', $id)->firstOrFail();
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        return view('detailsites', compact('data'));
    }
}
