<?php

Admin::model(\App\Link::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('label', 'Label')->required();
	FormItem::text('route', 'Route');
	FormItem::text('order', 'Order');
	//FormItem::text('menu_id', 'Menu Top');
	FormItem::select('menu_id', 'Menu Top')
		->list(\App\Link::class);
	FormItem::select('section_id', 'Section')
		->list(\App\Section::class)
		->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('label', 'Label');
	Column::string('menu_id', 'Menu Top');
	Column::string('order', 'Order');
	Column::string('section_id', 'Section');
		//Column::yesNo()->myCustomMethod();
});
