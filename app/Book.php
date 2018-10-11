<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Advert
{
    use Notifiable;

    protected $table = 'books';
    public $timestamps = false;
}
