<?php

/*
|--------------------------------------------------------------------------
| Web Routesjml
|;
--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     echo "Selamat Datang";
// });

// Route::get('/', 'HomeController@index');
Route::get('/','HomeController@index');
Route::post('/hallo', 'HomeController@proses')->name('hallo');
// Route::get('/hallo/{nama}/{umur}/', 'HomeController@index')->where(['umur'=>'[0-9]+','nama'=>'[A-Za-z]+']);

Auth::routes();

Route::get('/home/admin','HomeController@indexAdmin')->middleware('cekAdmin');
Route::get('/home/user', 'HomeController@indexUser')->middleware('cekUser');


Route::get('/waiter','waiterController@index');
Route::post('/waiterOrder',function(){
	$data = Input::all();
	// echo "<pre>";
	// var_dump($data);
	// echo "</pre>";

	$storeOrder = DB::table('orders')->insert(
		[
			'tableid'=>$data['orderTable'],
			'customer_name'=>$data['nama'],
			'statusOrder'=> 'order',
			'dateOrder'=>date("Y-m-d h:i:s")
		]
	);


	if ($storeOrder) {
		DB::table('tables')
            ->where('tableid', $data['orderTable'])
			->update(['status' => 0]);
			

			$order = DB::table('orders')
			->orderBy('orderid', 'desc')
			->limit(1)
			->get();


			for ($i=0; $i < count($data['orderItem']) ; $i++) { 
				if ($data['jml'][$i]) {
					DB::table('orders_recipes')->insert(
						[
							'orderid'=>$order[0]->orderid,
							'recipeid'=>$data['orderItem'][$i],
							'qtyOrderItem'=> $data['jml'][$i]
						]
						);	
				}
			}
			
						
	} else {
		echo "STORE ORDER GAGAL";
	}



})->name('waiterOrder');

Route::get('/chef','chefController@index');

Route::post('/createRecipe',function(){
	$data = Input::all();
	// echo "<pre>";
	// var_dump($data);
	// echo "</pre>";


	$storeRecipes = DB::table('recipes')->insert(
		[
			'title'=>$data['title'],
			'price'=>$data['price'],
			'description'=>$data['desc']
		]
	);

	$recipe = DB::table('recipes')
		->orderBy('recipeid', 'desc')
		->limit(1)
		->get();
	
		for ($i=0; $i < count($data['ingredientid']) ; $i++) { 
			if ($data['qtyOrderIngredients'][$i]!= NULL) {
				DB::table('recipes_ingredients')->insert(
								[
									'ingredientid'=>$data['ingredientid'][$i],
									'recipeid'=>$recipe[0]->recipeid,
									'qtyOrderIngredients'=> $data['qtyOrderIngredients'][$i]
								]
							);
			}
		}
		
	}


// }
)->name('createRecipe');

Route::get('/chefOrder','chefController@order');