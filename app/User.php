<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacionCuenta;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function SendEmailActivate()
    {
        $this->update(['token' => bin2hex(random_bytes(30))]);
        Mail::to($this)->send(new ConfirmacionCuenta($this));
    }

    public static function active($token)
    {
        Auth::logout();
        $user = static::getFromToken($token);
        $user->update(['active' => true]);
        Auth::login($user->get()[0]);
        return redirect()->route('home');
    }

    public static function getFromToken($token)
    {
        return static::where('token', $token);
    }
}
