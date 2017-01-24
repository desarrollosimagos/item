<?php

namespace App;

use SleepingOwl\Admin\Columns\Interfaces\ColumnInterface;

class YesNoColumn implements ColumnInterface
{

    public function renderHeader()
    {
        return '<th>Yes/no</th>';
    }

    public function render($instance, $totalCount)
    {
        $content = ($instance->bool) ? 'yes' : 'no';
        return '<td>' . $content . '</td>';
    }

    public function getName()
    {
        return 'columng-name';
    }

    public function isHidden()
    {
        // return false to display this column
        // return true to hide this column (used for column appendants)
        return false;
    }

    public function myCustomMethod()
    {
		
    }

}