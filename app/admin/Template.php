<?php

Admin::model(\App\Template::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	// Describing elements in create and editing forms
	FormItem::select('site_id', 'Sites')
		->list(\App\Site::class)
		->required();
	FormItem::text('name', 'Name')->required();
	FormItem::text('route', 'Route')->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('site_id', 'Site Id');
	
	//Column::lists('sites.domain', 'Domain');
	Column::string('name', 'Name');
	Column::string('route', 'Route');
		//Column::yesNo()->myCustomMethod();
});
