<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class SiteApiController extends Controller
{
    public function getApiData($apiType, array $options = [])
    {
        $apiURL = 'https://jsonplaceholder.typicode.com/posts';

        $client = new Client();
        $response = $client->request($apiType, $apiURL, $options);

        return $response;
    }

    public function index()
    {
        try {
            $getData = json_decode($this->getApiData('GET', [])->getBody()->getContents());
            $data = collect($getData);
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        return view('sites', compact('data'));
    }

    public function store()
    {
        try {
            $response = $this->getApiData('POST', [
                'headers' => ['Content-Type'  => 'application/json'],
                'json' => [
                    'title' => request('title'),
                    'body' => request('body'),
                    'user_id' => request('user_id')
                ]
            ]);
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        dd($response);
    }

    public function detail($id)
    {
        try {
            $getData = json_decode($this->getApiData('GET', [])->getBody()->getContents());
            $data = collect($getData)->where('id', $id)->firstOrFail();
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }

        return view('detailsites', compact('data'));
    }
}
