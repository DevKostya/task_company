<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['column_name', 'company_id', 'comment', 'date','user_id'];
    protected $hidden = ['created_at','updated_at'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function currentUser()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id')
            ->where('id', '=', Auth::id());
    }
}
