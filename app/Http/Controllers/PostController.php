<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        return Post::all();
    }

    public function post_by_id(Request $request)
    {
       $id=  $request->id;
       return User::find($id)->posts;
    }

    public function api()
    {
        $url = 'https://restcountries.com/v3.1/all';
        $collection_name = 'RapidAPI';
        $request_url = $url . '/' . $collection_name;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_HTTPHEADER, [
//            'X-RapidAPI-Host: kvstore.p.rapidapi.com',
//            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxx',
//            'Content-Type: application/json'
//        ]);
        $response = curl_exec($curl);
        $data = json_decode($response, true);


        var_dump($data[0]['name']); echo "</br>";echo "</br>";

        var_dump($data[1]['name']);



        curl_close($curl);
    }

    public function check()
    {
        dd('check');
    }
}
