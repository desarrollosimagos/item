<?php

Admin::model(\App\Portofolio::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::select('page_id', 'Page')
		->list(\App\Page::class)
		->required();
	FormItem::select('categorie_id', 'Categorie')
		->list(\App\Categorie::class)
		->required();
	FormItem::text('title', 'Title')->required();
	FormItem::image('file', 'Image');
	FormItem::text('date', 'Date');
	FormItem::text('short_describe', 'Describe Short');
	FormItem::text('html', 'HTML');
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('id', 'Id');
	Column::string('page_id', 'Page');
	Column::string('categorie_id', 'Categorie');
	Column::string('title', 'Title');
	Column::image('file');
		//Column::yesNo()->myCustomMethod();
});
