<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
class ContactController extends Controller
{
    public function create(Request $request) {
       
        // Validate dữ liệu đầu vào
        $request->validate([
            'contact.name'  => 'required|string|max:255',
            'contact.email' => 'required|email',
            'contact.phone' => 'nullable|regex:/^[0-9]{10,12}$/',
            'contact.body'  => 'required|string',
        ]);

        // Lấy dữ liệu từ input "contact"
        $data = $request->input('contact');

        // Lưu vào database
        $contact = Contact::create([
            'name'  => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'body'  => $data['body'],
        ]);
        flash()->success('Thắc mắc của bạn đã được gửi đi');
        return redirect()->route('home.contact');
    
    }

    public function index(Request $request){
        $query = Contact::query();
        
        // Lọc theo từ khóa
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%")
                    ->orWhere('body', 'LIKE', "%$keyword%");
            });
        }
    
        // Lấy số lượng bản ghi từ request, nếu không có thì mặc định là 10
        $perPage = (int) $request->query('perpage', 10);
    
        // Phân trang
        $contacts = $query->paginate($perPage)->appends($request->query());
    
        $template = 'backend.contact.index';
        return view('backend.dashboard.layout', compact('template','contacts'));
    }
    

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $template = 'backend.contact.detail';
        return view('backend.dashboard.layout', compact('contact','template'));
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Xóa liên hệ thành công.');
    }
}
