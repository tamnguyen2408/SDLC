<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\PostFormLogin;
use App\Models\Account;

class UserLoginController extends Controller
{
    public function index()
    {
        // hien thi view(giao dien) cho nguoi dung
        return view("login.user");
    }

    public function login(PostFormLogin $request)
    {
        $username = $request->username;
        $password = $request->password;
        if(empty($username) || empty($password)){
            // dieu huong chuyen trang ve lai giao dien dang nhap
            return redirect()->route("user.login",["state" => "error"]);
        } else {
            $user = Account::where([
                'username' => $username,
                'password' => $password,
                'role_id' => 2,
                'status' => 1
            ])->first();
            if($user === null){
                // dang nhap linh tinh
                $request->session()->flash("loginFail", "Account invalid");
                return redirect()->route('user.login',['state'=>'failure']);
            } else {
                // dang nhap thanh cong
                // luu thong tin nguoi dung vao session
                $request->session()->put("idUserUser", $user->id);
                $request->session()->put("roleIdUserUser", $user->role_id);
                $request->session()->put("emailUserUser",$user->email);
                $request->session()->put("usernameUser",$user->username);
                return redirect()->route("user.index");
            }
        }
    }
}
