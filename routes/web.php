<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use MongoDB\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $books = Book::where("name", "اندیشه ورزان صبا تامین")->get();

    ini_set('memory_limit', '400M');

    // dd("sdf");
    $startDate = '1402-05-05T00:00:00.000+00:00';
    $endDate = '1402-05-13T00:00:00.000+00:00';

    $documents = Book::where('jdate', '>=', new MongoDB\BSON\UTCDateTime(strtotime($startDate) * 1000))
        ->where('jdate', '<', new MongoDB\BSON\UTCDateTime(strtotime($endDate) * 1000))
        ->get();

    dd($documents);

    // return view('welcome');


    // Requires the MongoDB PHP Driver
    // https://www.mongodb.com/docs/drivers/php/

    // $client = new Client('mongodb://localhost:27017/');
    // $collection = $client->selectCollection('fipi', 'data');
    // $cursor = $collection->find([]);

    // $i = 0;
    // foreach ($cursor as $key => $value) {
    //     # code...
    //     $i++;
    //     var_dump([$value, $i]);
    // }



});
