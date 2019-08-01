<?php

// use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/lokasi/view/{idLokasi}', 'Api\lokasiController@view');
Route::get('/lokasi/view', 'Api\lokasiController@showAll');
Route::post('/lokasi/add', 'Api\lokasiController@create');
Route::put('/lokasi/update/{idLokasi}', 'Api\lokasiController@update');
Route::delete('/lokasi/delete/{idLokasi}', 'Api\lokasiController@delete');

Route::get('/invoice/view', 'Api\invoiceController@viewAll');
Route::get('/invoice/view/{idInvoice}', 'Api\invoiceController@view');
Route::post('/invoice/add', 'Api\invoiceController@create');
Route::put('/invoice/update/{idInvoice}', 'Api\invoiceController@update');
Route::delete('/invoice/delete/{idInvoice}', 'Api\invoiceController@delete');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
