<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Traits\AdminBuilder;

class Category extends Model
{
    use ModelTree, AdminBuilder;

}
