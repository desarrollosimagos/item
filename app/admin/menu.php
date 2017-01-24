<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu(\App\Administrator::class)->icon('fa-user')->label('Administrador');
Admin::menu(\App\Site::class)->icon('fa-user')->label('Sites');
Admin::menu(\App\Page::class)->icon('fa-user')->label('Pages');
Admin::menu(\App\Template::class)->icon('fa-user')->label('Templates');
Admin::menu(\App\Section::class)->icon('fa-user')->label('Sections');
Admin::menu(\App\Link::class)->icon('fa-user')->label('Links');
Admin::menu(\App\Content::class)->icon('fa-user')->label('Contents');