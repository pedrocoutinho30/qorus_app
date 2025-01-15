<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
class Page extends Model
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['title', 'body', 'slug' , 'excerpt'];

}
