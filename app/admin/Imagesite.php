<?php

Admin::model(\App\Imagesite::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::select('site_id', 'Site')
		->list(\App\Site::class)
		->required();
	FormItem::text('title', 'Title')->required();
	FormItem::image('file', 'Image');
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('site_id', 'Site');
	Column::image('file');
	Column::string('title', 'Title');
		//Column::yesNo()->myCustomMethod();
});
