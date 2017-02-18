<?php

Admin::model(\App\Customer::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('customer', 'Customer')->required();
	FormItem::image('file', 'Image');
	FormItem::text('date', 'Date');
	FormItem::text('url', 'URL site');
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('id', 'Id');
	Column::string('customer', 'Customer');
	Column::string('date', 'date');
	Column::string('url', 'URL site');
	Column::image('file');
		//Column::yesNo()->myCustomMethod();
});
