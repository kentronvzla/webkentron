<?php

namespace App;

use Illuminate\Auth\Authenticatable;
//use Illuminate\Database\Eloquent\Model;
//use Cartalyst\Sentry\Users\Eloquent\User;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Sentry;

/**
 * App\User
 *
 * @property-read mixed $activated
 * @property mixed $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentry\Groups\Eloquent\Group[] $groups
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $activation_code
 * @property \Carbon\Carbon $activated_at
 * @property \Carbon\Carbon $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePermissions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereActivationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereActivatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePersistCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereResetPasswordCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends \Cartalyst\Sentry\Users\Eloquent\User implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;
    
    public static function boot() {
        self::$hasher = new \Cartalyst\Sentry\Hashing\NativeHasher;
    }

    public function isCurrent() {
        if (!Sentry::check()){
            return false;
        }

        return Sentry::getUser()->id == $this->id;
    }

    public static function getLogged() {
        if (!Sentry::check()){
            return false;
        }

        return self::find(Sentry::getUser()->id);
    }

    public static function getUserIdLogged() {
        if (!Sentry::check()){
            return false;
        }

        return Sentry::getUser()->id;
    }

}
