<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/index', [CrudController::class, 'index']);
route::post('/add-product', [CrudController::class, 'create']);
route::post('/edit-product', [CrudController::class, 'edit']);
route::get('/delete-product', [CrudController::class, 'delete']);
route::get('/display-product/{productid}', [CrudController::class, 'display']);


