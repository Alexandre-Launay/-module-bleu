<?php

use Illuminate\Support\Facades\Route;

route::get('login', function () {
    return view('auth.login');
})->name('login');

route::get('logout', function () {
    return view('auth.logout');
})->name('logout');