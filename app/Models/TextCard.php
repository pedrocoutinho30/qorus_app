<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
class TextCard extends Model
{
    
    use HasFactory;
    use Translatable;

    protected $table = 'textcards';

    protected $translatable = ['title', 'text'];
}
