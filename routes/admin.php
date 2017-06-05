<?php

Route::get('/home', function () {
//    $users[] = Auth::user();
//    $users[] = Auth::guard()->user();
//    $users[] = Auth::guard('admin')->user();

    //dd($users);
    return redirect(route('admin.home.index'));
//    return view('admin.home');
})->name('home');

