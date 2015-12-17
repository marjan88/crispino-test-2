<?php

namespace Modules\User\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Modules\User\Entities\UserInterface;
use Modules\Task\Entities\Task;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract, UserInterface {

    use Authenticatable,
        Authorizable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'first_name', 'last_name', 'location'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function tasks() {
        return $this->hasMany('Modules\Task\Entities\Task', 'user_id');
    }
    
    public function isUserTask(Task $task)
    {
        return (bool) $this->tasks()->where('id', $task->id)->count();
    }
    
    public function getNameOrUsername() {
        return ($this->first_name) ? $this->first_name : $this->username;
    }

    public function getFullName() {
        return ($this->first_name && $this->last_name) ? $this->first_name . ' ' . $this->last_name : $this->username;
    }

    public function getAvatarUrl($size = 200) {
        return 'http://www.gravatar.com/avatar/' . md5($this->email) . '?d=mm&s=' . $size;
    }

    public static function getUserByUsername($username) {
        $users = User::where('username', $username)->first();
        if ($users) {
            return $users;
        }
        return false;
    }

    public static function storeUser() {
        ;
    }

    public static function updateUser($request, $id) {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return true;
        }
        return false;
    }

    public static function deleteUser() {
        
    }

}
