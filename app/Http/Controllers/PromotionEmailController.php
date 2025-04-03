<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromotionEmail;

class PromotionEmailController extends Controller
{
    /**
     * Lưu email vào bảng promotion_emails.
     */
    public function index(){
        $emails = PromotionEmail::paginate(10); 
        $template = 'backend.request_email.index';

        return view('backend.dashboard.layout',compact('emails','template',));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:promotion_emails,email', // Kiểm tra email hợp lệ và duy nhất
            'full_name' => 'nullable|string|max:255', // full_name là tùy chọn, nếu có thì phải là chuỗi với độ dài tối đa 255
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được đăng ký.',
        ]);
    
        // Lưu thông tin vào bảng promotion_emails
        PromotionEmail::create([
            'name' => $request->full_name, // Lưu full_name (có thể là null)
            'email' => $request->email,    // Lưu email
        ]);
    

        return response()->json(['message' => 'Đăng ký nhận khuyến mãi thành công!']);
    }
}
