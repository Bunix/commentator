<?php

namespace Plmrlnsnts\Commentator\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;

class Commentator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'commentator';
    }

    /**
     * Register comment routes.
     *
     * @return void
     */
    public static function routes()
    {
        Route::get('/{commentable}/comments', 'CommentsController@index')->name('comments.index');
        Route::post('/{commentable}/comments', 'CommentsController@store')->name('comments.store');
        Route::patch('/comments/{comment}', 'CommentsController@update')->name('comments.update');
        Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');
    }
}
