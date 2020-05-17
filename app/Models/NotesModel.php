<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotesModel extends Model
{
    protected $table = 'notes';
    public $primaryKey = 'id';
    public $timestamps = false;
}
