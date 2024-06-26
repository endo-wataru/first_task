<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; //ソート機能を使います

class Task extends Model
{
    use HasFactory;

    use Sortable;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    //User モデルとの多対 1 の関係を定義します。
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
