<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Notifiable;
    //
    /*use HasRoles;*/

    protected $guard_name = 'web';
    protected $fillable=
        [
            'name','email','photo','user_id'
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*public function baanches()
    {
        return $this->hasMany('App\Branch');
    }*/
}
