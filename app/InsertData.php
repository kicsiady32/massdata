<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InsertData extends Model
{
    protected $fillable = [
        'file','dataname','user_id'
    ];
    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false) {
            $query->where('Channel','like','%' . request('search') . '%');
        }
    }
    public static function insertData($data){
        DB::table('insert_data')->insert($data);
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
}
