<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeComponent;

class HomeComponentController extends Controller
{
    public function index()
    {   
        $components = HomeComponent::orderBy('order')->get();
        $template = 'backend.home_manager.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'components'
        ));
    }

    public function create()
    {
        $template = 'backend.home_manager.create';
        return view('backend.dashboard.layout', compact(
            'template'
        ));
    }
    public function update_index($id)
    {
        $template = 'backend.home_manager.create';
        return view('backend.dashboard.layout', compact(
            'template'
        ));
    }
    
    public function delete($id)
    {
        $homeComponent = HomeComponent::find($id); // Sửa tên biến
        if (!$homeComponent) {
            return redirect()->route('home-components.index')->with('error', 'Không tìm thấy thành phần.');
        }
        $template = 'backend.home_manager.delete';
        return view('backend.dashboard.layout', compact(
            'template',
            'homeComponent'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'props' => 'nullable|array',
            'order' => 'required|integer',
            'active' => 'boolean',
        ]);

        HomeComponent::create($data);
        return redirect()->route('home-components.index')->with('success', 'Thêm thành phần thành công');
    }

    public function update(Request $request, HomeComponent $homeComponent)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'props' => 'nullable|array',
            'order' => 'required|integer',
            'active' => 'boolean',
        ]);

        $homeComponent->update($data); // Sửa cú pháp update
        return redirect()->route('home-components.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(HomeComponent $homeComponent)
    {
        $homeComponent->delete();
        return redirect()->route('home-components.index')->with('success', 'Xóa thành công');
    }
}