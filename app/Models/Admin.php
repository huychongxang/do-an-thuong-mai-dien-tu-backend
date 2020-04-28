<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::deleting(function ($admin) {
            $admin->syncRoles();
            $admin->syncPermissions();
        });
    }

    public function getRolesHtml()
    {
        $roles = $this->roles;
        $html = '';
        foreach ($roles as $role) {
            $html .= "<span class=\"badge bg-success\">{$role->label}</span>";
        }
        return $html;
    }

    public function getPermissionsHtml()
    {
        $permissions = $this->permissions;
        $html = '';
        foreach ($permissions as $permission) {
            $html .= "<span class=\"badge bg-success\">{$permission->label}</span>";
        }
        return $html;
    }

    public function isDefault()
    {
        return $this->getOriginal('is_default');
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
