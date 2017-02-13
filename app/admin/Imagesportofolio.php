<?php

Admin::model(\App\Imagesportofolio::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::select('portofolio_id', 'Portofolio')
		->list(\App\Portofolio::class)
		->required();
	FormItem::text('title', 'Title');
	FormItem::image('file', 'Image');
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('portofolio_id', 'Portofolio');
	Column::image('file');
	Column::string('title', 'Title');
		//Column::yesNo()->myCustomMethod();
});
