<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 28/3/2564
 * Time: 23:37
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GoogleMapAPIController extends Controller
{
    public function getGoogleMapAPI(Request $request){
        $key = 'AIzaSyAZkmZb2eX3xez31iSW12gnAUplJ9e5xDM';
        $location = $request['location'] ? $request['location'] : '13.803181,100.5393292';
        $api = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$location&radius=1500&type=restaurant&key=$key";
        $data = @file_get_contents($api);
        return $data;
    }
    public function getPhotoReference(Request $request){
        $key = 'AIzaSyAZkmZb2eX3xez31iSW12gnAUplJ9e5xDM';
        $photoreference = $request['photo_reference'];
        $api = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoreference&key=$key";
        $contents = file_get_contents($api);
        $image = base64_encode($contents);
        $rawImageString = base64_decode($image);
        return response($rawImageString)->header('Content-Type', 'image/png');
    }
}