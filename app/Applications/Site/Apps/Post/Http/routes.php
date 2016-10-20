<?php

Route::get('/', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
