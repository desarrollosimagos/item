<?php

Admin::model(\App\Page::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	// Describing elements in create and editing forms
	FormItem::select('site_id', 'Site')
		->list(\App\Site::class)
		->required();
	FormItem::select('template_id', 'Template')
		->list(\App\Template::class)
		->required();
	FormItem::text('name', 'Name')->required();
	FormItem::text('title', 'Title')->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('site_id', 'Site Id');
	Column::string('template_id', 'Template Id');
	//Column::lists('sites.domain', 'Domain');
	Column::string('name', 'Name');
	Column::string('title', 'Title');
		//Column::yesNo()->myCustomMethod();
});
