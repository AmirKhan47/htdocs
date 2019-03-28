<?php

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
    return view('welcome');
});

Route::resource('/test_save', 'TestController');

Route::get('/test', function() {
	// return 'hello';
    $crawler = Goutte::request('GET', 'https://www.reddit.com/r/Android');

    $crawler->filter('.Post')->each(function ($node)
    {
    	// $arrayName = array(
    		// 'posted_by' => , $node->filter('.camSYk')->text(),
    		// 'value' = $node->filter('.dNbgrk ._1rZYMD_4xY3gRcSS3p8ODO')->text();
    	// );
    	$value = $node->filter('.dNbgrk ._1rZYMD_4xY3gRcSS3p8ODO')->text();
    	$posted_by = $node->filter('.camSYk')->text();
    	$title = $node->filter('h2.s1okktje-0.kCqBrs')->text();
      	dump($value);
      	dump($posted_by);
      	dump($title);
    });
    // $crawler->filter('.rpBJOHq2PR60pnwJlUyP0')->each(function ($node)
    // {
    //   	dump($node->text());
    //   	// dd($node->text());
    // });

});
