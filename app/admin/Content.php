<?php

Admin::model(\App\Content::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	// Describing elements in create and editing forms
	FormItem::select('page_id', 'Page')
		->list(\App\Page::class)
		->required();
	FormItem::text('name', 'Name')->required();
	FormItem::textarea('content', 'Content')->required();
	FormItem::text('order', 'Order')->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('page_id', 'Page Id');
	Column::string('name', 'Name');
	//Column::lists('sites.domain', 'Domain');
	Column::string('order', 'Order');
		//Column::yesNo()->myCustomMethod();
});
