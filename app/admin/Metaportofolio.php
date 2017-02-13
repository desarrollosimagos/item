<?php

Admin::model(\App\Metaportofolio::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::select('portofolio_id', 'Portofolio')
		->list(\App\Portofolio::class)
		->required();
	FormItem::text('group', 'Group');
	FormItem::text('name', 'Name')->required();
	FormItem::text('value', 'Value')->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('portofolio_id', 'Portofolio');
	Column::string('group', 'Group');
	Column::string('name', 'Name');
	Column::string('value', 'Value');
		//Column::yesNo()->myCustomMethod();
});
