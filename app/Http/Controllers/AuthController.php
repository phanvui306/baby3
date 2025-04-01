<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Đăng ký tài khoản
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Tạo tài khoản thành công!',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    // Đăng nhập
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Email hoặc mật khẩu không đúng!'], 401);
        }
    
        // Xóa token cũ (nếu có) trước khi tạo token mới
        $user->tokens()->delete();
    
        // Tạo token mới
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Chào ' . $user->name . '! Chúc bạn một ngày tốt lành!',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    

    // Đăng xuất
    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Bạn đã đăng xuất thành công và token đã bị xóa!'
        ]);
    }

    // Lấy thông tin người dùng đang đăng nhập
    public function userProfile(Request $request) {
        return response()->json([
            'user' => $request->user()
        ]);
    }
    // Lấy danh sách tất cả người dùng
public function listUsers() {
    $users = User::all(); // Lấy tất cả user từ database

    return response()->json([
        'users' => $users
    ]);
}

}
