<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Readlist extends Model
{
    protected $fillable = ['user_id', 'novel_id'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}