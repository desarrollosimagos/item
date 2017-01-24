<?php

Admin::model(\App\Administrator::class)
	->form(function ()
{
	// Describing elements in create and editing forms
	FormItem::text('username', 'Usuario');
	FormItem::text('password', 'Contraseña');
	FormItem::text('name', 'Nombre');
})
	->columns(function ()
{
	// Describing columns for table view
	Column::string('username', 'Usuario');
	Column::string('name', 'Nombre');
});
