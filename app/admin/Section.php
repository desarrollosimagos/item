<?php

Admin::model(\App\Section::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name')->required();
	FormItem::text('position', 'Position')->required();
	FormItem::select('template_id', 'Template')
		->list(\App\Template::class)
		->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('name', 'Name');
	Column::string('position', 'Position');
	Column::string('template_id', 'Template');
		//Column::yesNo()->myCustomMethod();
});
