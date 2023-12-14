<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormLogin;

class LoginController extends Controller
{
    public function index()
    {
        // hien thi view(giao dien) cho nguoi dung
        return view("login.index");
    }

    public function logout(Request $request)
    {
        $request->session()->forget("idUserAdmin");
        $request->session()->forget("roleIdUserAdmin");
        $request->session()->forget("emailUserAdmin");
        $request->session()->forget("usernameAdmin");
        return redirect()->route('admin.login');
    }

    public function login(PostFormLogin $request)
    {
        $username = $request->username;
        $password = $request->password;
        if(empty($username) || empty($password)){
            // dieu huong chuyen trang ve lai giao dien dang nhap
            return redirect()->route("admin.login",["state" => "error"]);
        } else {
            $user = Account::where([
                'username' => $username,
                'password' => $password,
                'role_id' => 1,
                'status' => 1
            ])->first();
            if($user === null){
                // dang nhap linh tinh
                $request->session()->flash("loginFail", "Account invalid");
                return redirect()->route('admin.login',['state'=>'failure']);
            } else {
                // dang nhap thanh cong
                // luu thong tin nguoi dung vao session
                $request->session()->put("idUserAdmin", $user->id);
                $request->session()->put("roleIdUserAdmin", $user->role_id);
                $request->session()->put("emailUserAdmin",$user->email);
                $request->session()->put("usernameAdmin",$user->username);
                return redirect()->route("admin.dashboard");
            }
        }
    }
}
