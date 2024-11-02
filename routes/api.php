<?php

use Illuminate\Support\Facades\Route;
// php artisan route:list --path=api/v1
Route::prefix('v1')->group(base_path('routes/v1/api.php'));
