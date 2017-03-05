<?php

Admin::model(\App\Language::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	// Describing elements in create and editing forms
	FormItem::select('site_id', 'Site')
		->list(\App\Site::class)
		->required();
	FormItem::text('language', 'Name')->required();
	FormItem::text('cod', 'Cod')->required();
    FormItem::select('status', 'Status')->list(['Active', 'Inactive'])->enum(['0', '1'])->required();

})
	->columns(function ()
{
	Column::string('site_id', 'Site Id');
	Column::string('language', 'Name');
	Column::string('cod', 'Cod');
    Column::string('status', 'Status');
});
