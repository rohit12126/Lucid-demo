<?php

namespace Framework\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;
use Illuminate\Http\Response;
Use Framework\User;
use Framework\Http\Requests\UserRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /*
     *
    */    
    public function getUserList(){
        $users = User::getUserList();
        $html = View::make('_user_list',['users' =>$users])->render();
        return response()->json(['html'=>$html]);
    }

    public function editUser($id){
        $user = User::getUserById($id);
        if(!empty($user)){
            return view('update_form',['user'=>$user]);
        }
        abort(404);
    }

    public function deleteUser(Request $resquest){
        $post = $resquest->all();
        $result = User::deleteUser($post);
        if($result['success']){
            return response()->json(['success'=>true,'message'=>$result['message']]);
        }else{
            return response()->json(['success'=>false,'message'=>$result['message']]);
        }
        
    }

    public function updateUser(UserRequest $request){
        $post = $request->all();
        $result = User::updateUser($post);
        if($result['success']){
            Session::flash('success', true); 
            Session::flash('message', $result['message']); 
            return redirect('/home');
        }
    }

}
