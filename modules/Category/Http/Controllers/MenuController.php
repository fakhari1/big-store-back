<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Http\Requests\MenuRequest;
use Modules\Category\Models\Menu;
use Modules\Common\Utils\Responder;


class MenuController extends Controller
{
    public function index()
    {

        $menus = Menu::where('parent_id', 0)->with(['children.children.children'])->get();

        return Responder::response([
            'menus' => $menus
        ]);
    }

    public function create()
    {
        $menus = Menu::where('parent_id', '=', '0')->with('children.children.children')->get();

        return Responder::response([
            'menus' => $menus
        ]);
    }

    public function store(MenuRequest $request)
    {
        $inputs = [
            'title' => $request->title,
            'url' => "#",
            'status' => $request->status,
            'parent_id' => $request->parent_id
        ];

        Menu::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function show(Menu $menu)
    {
        return Responder::response([
            'menu' => $menu
        ]);
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $inputs = [
            'title' => $request->title,
            'url' => "#",
            'status' => $request->status,
            'parent_id' => $request->parent_id
        ];

        $menu->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return Responder::response([
            'status' => true,
            'message' => 'منوی مورد نظر با موفقیت حذف شد'
        ]);
    }

    public function updateStatus(Request $request, Menu $menu)
    {
        try {
            $menu->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $menu->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }

    }
}
