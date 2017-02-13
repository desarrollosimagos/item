<?php

Admin::model(\App\Categorie::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('name', 'Name')->required();
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('id', 'Id');
	Column::string('name', 'Name');
		//Column::yesNo()->myCustomMethod();
});
