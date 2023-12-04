<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Admin\Content\Menu;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent', 'children')->paginate(15);
        return view('admin.content.menu.index', compact("menus"));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.content.menu.create', compact('menus'));
    }

    public function store(MenuRequest $request)
    {
        $inputs = [
            'name' => $request->name,
            'url' => "#",
            'status' => $request->status,
            'parent_id' => $request->parent_id
        ];

        Menu::create($inputs);

        return redirect()->route('admin.content.menu.index')->with(['success_msg' => "منوی جدید با موفقیت ایجاد شد!"]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::all();
        return view('admin.content.menu.edit', compact('menus', 'menu'));
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $inputs = [
            'name' => $request->name,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'url' => '#'
        ];

        $menu->update($inputs);

        return redirect()->route('admin.content.menu.index')->with(['success_msg' => 'رکورد مورد نظر با موفقیت بروزرسانی شد!']);
    }

    public function destroy(Menu $menu)
    {
        if ($menu->delete()) {
            return redirect()->back()->with(['success_msg' => 'رکورد مورد نظر حذف شد']);
        }
    }

    public function status(Menu $menu)
    {
        $menu->status = $menu->status == 0 ? 1 : 0;

        if ($menu->save()) {
            if ($menu->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            }
            return response()->json(['status' => true, 'checked' => true]);
        }

        return response()->json(['status' => false]);
    }
}
