<?php

Admin::model(\App\Site::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name')->required()->unique();
	FormItem::textAddon('domain', 'Url')->addon('http://site.com/')->placement('before')->required();
	FormItem::select('status', 'Status')->list(['Active', 'Inactive'])->enum(['0', '1'])->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('name', 'Name');
	Column::string('domain', 'Domain');
	Column::string('status', 'Status');
		//Column::yesNo()->myCustomMethod();
});
