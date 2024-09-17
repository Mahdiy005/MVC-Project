<?php

use App\Controllers\HomeController;
use Bug\Http\Route;

Route::get('/', [HomeController::class, 'index'])
     ->get('/login', function(){
  return 'Login';
});

try {
  echo Route::resolve();
} catch (\Throwable $th) {
  http_response_code(404);
  echo makeViewError('404', ['name' => 'Mohamed Mahdi']);
}
