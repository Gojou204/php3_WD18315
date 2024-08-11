<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
class AuthenController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $req){

        // $req->validate([
        //     'email' => 'required|email|exists:user,email',
        //     'password' => 'required|min:6',
        // ], [
        //     'email.required' => 'Vui lòng nhập email',
        //     'email.email' => 'Email không đúng định dạng',
        //     'email.exists' => 'Email chưa được đăng ký',
        //     'password.required' => 'Không được để trống password',
        //     'password.min' => 'Password phải có ít nhất 6 ký tự',
        // ]);

        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember = $req->has('remember');

        if(Auth::attempt($dataUserLogin, $remember)){
            // Logout hết các tài khoản khác
            Session::where('user_id', Auth::id())->delete();
            // Tạo phiên đăng nhập mới
            session()->put('user_id', Auth::id());

            // Đăng nhập thành công
            if(Auth::user()->role == '1'){
                return redirect()->route('admin.products.listProduct')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }
            else{
                // Đăng nhập vào User
                echo 'Đăng nhập vào trang User';
            }
        }else{
            // Đăng nhập thất bại
            return redirect()->back()->with([
                'message' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }

    public function register(){
        return view('register');
    }

    public function postRegister(Request $req){
        $check = User::where('email', $req->email)->exists();
        if($check){
            return redirect()->back()->with([
                'message' => 'Tài khoản email đã tồn tại'
            ]);
        }else{
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ];
            $newUser = User::create($data);

            // Auth::login($newUser); // Tự động đăng nhập cho user này
            // return Trang chủ

            return redirect()->route('login')->with([
                'message' => 'Đăng ký thành công, vui lòng đăng nhập'
            ]);
        }
    }
}
