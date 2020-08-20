<?php

use App\Models\Category;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('categories', function() {

    $categories = Category::take(3)->orderByRaw('rand()')->get();
    $ids = $categories->pluck('id')->toArray();

    $posting = Posting::orderByRaw('rand()')->first();

    $posting->categories()->attach($ids);

    $category = Category::find(7);
    $category->postings;

    // $categories->first()->postings()->attach($posting->id);
});

Artisan::command('friends', function() {

    // https://laravel.com/docs/7.x/eloquent-relationships#many-to-many

    $userA = User::find(1);
    $userB = User::find(2);

    $userA->followers()->attach($userB->id);
    // $userB->leaders()->attach($userA->id);
});
