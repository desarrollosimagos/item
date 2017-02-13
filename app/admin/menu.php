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

Admin::menu()->label('Admin Configurations')->icon('fa-book')->items(function ()
{
	Admin::menu(\App\Administrator::class)->icon('fa-user')->label('Administrador');
	Admin::menu(\App\Site::class)->icon('fa-user')->label('Sites');
	Admin::menu(\App\Template::class)->icon('fa-user')->label('Templates');
});

Admin::menu()->label('Contents Configurations')->icon('fa-book')->items(function ()
{
	Admin::menu(\App\Page::class)->icon('fa-user')->label('Pages');
    Admin::menu(\App\Section::class)->icon('fa-user')->label('Sections');
	Admin::menu(\App\Link::class)->icon('fa-user')->label('Links');
	Admin::menu(\App\Content::class)->icon('fa-user')->label('Contents');
});


Admin::menu()->label('Sites Configurations')->icon('fa-book')->items(function ()
{
    Admin::menu(\App\Meta::class)->icon('fa-user')->label('Configurations');
	Admin::menu(\App\Imagesite::class)->icon('fa-user')->label('Image for Site');
});

Admin::menu()->label('Portofolio')->icon('fa-book')->items(function ()
{
    Admin::menu(\App\Categorie::class)->icon('fa-user')->label('Categorie');
	Admin::menu(\App\Portofolio::class)->icon('fa-user')->label('Portofolio');
	Admin::menu(\App\Metaportofolio::class)->icon('fa-user')->label('Fields for Portofolio');
	Admin::menu(\App\Imagesportofolio::class)->icon('fa-user')->label('Images for Portofolio');
});
