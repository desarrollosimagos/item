<?php

Admin::model(\App\Acces::class)
	->form(function ()
{
	FormItem::select('site_id', 'Sites')
		->list(\App\Site::class)
		->required();
	FormItem::text('ip', 'IP')->required();
})
	->columns(function ()
{
	Column::string('site_id', 'Site Id');
	Column::string('ip', 'IP');
});
