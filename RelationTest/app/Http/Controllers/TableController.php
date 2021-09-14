<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;


class TableController extends Controller
{
    public function test()
    {
        Table::find(1)->message;
    }
}
