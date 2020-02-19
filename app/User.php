<?php

namespace Framework;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public static function getUserById($id){

        $user =  User::where('id',$id)->first();
        return $user;
    }

    public static function getUserList(){
        return User::where(['role'=>'user','is_deleted'=>0])->paginate(10);
    }
     
    public static function deleteUser($post){
        $data = [];
        $user = User::where('id',$post['id'])->first();
        if(empty($user)){
            //$user->is_deleted = 1;
            $user->save();
            $data['success'] = true;
            $data['message'] = 'User was deleted successfully';
        }else {
          $data['success'] = false;
          $data['message'] = 'Something went wrong, Please try again later.';
       }
       return $data;

    }

    public static function updateUser($post){
        $user = User::where('id',$post['id'])->first();
    if(!empty($user)){
            $user->name = $post['name'];
            $user->email = $post['email'];
            $user->save();
            $data['success'] = true;
            $data['message'] = 'User was update successfully.';
        }else {
          $data['success'] = true;
          $data['message'] = 'Something went wrong.';
       }
       return $data;

    }

}
