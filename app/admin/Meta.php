<?php

Admin::model(\App\Meta::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::select('site_id', 'Site')
		->list(\App\Site::class)
		->required();
	FormItem::text('name', 'Name')->required()->unique();
	FormItem::text('value', 'Value')->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('site_id', 'Site');
	Column::string('name', 'Name');
	Column::string('value', 'Value');
		//Column::yesNo()->myCustomMethod();
});
