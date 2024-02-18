<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Responder;
use Illuminate\Http\Request;
use Modules\Category\Http\Requests\TicketCategoryRequest;
use Modules\Category\Models\TicketCategory;

class TicketCategoryController extends Controller
{
    public function index()
    {
        $categories = TicketCategory::orderBy('created_at', 'desc')->get();

        return Responder::response([
            'categories' => $categories,
        ]);
    }

    public function store(TicketCategoryRequest $request)
    {
        $inputs = [
            'title' => $request->title,
            'status' => $request->status,
        ];

        TicketCategory::create($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function show(TicketCategory $ticketCategory)
    {
        return Responder::response(['category' => $ticketCategory]);
    }

    public function update(TicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        $inputs = [
            'title' => $request->title,
            'status' => $request->status,
        ];

        $ticketCategory->update($inputs);

        return Responder::response([
            'status' => true,
            'message' => 'اطلاعات با موفقیت ذخیره شد'
        ]);
    }

    public function updateStatus(Request $request, TicketCategory $ticketCategory)
    {

        try {
            $ticketCategory->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $ticketCategory->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function destroy(TicketCategory $ticketCategory)
    {
        $ticketCategory->delete();

        return Responder::response([
            'status' => true,
            'message' => 'دسته بندی تیکت با موفقیت حذف شد'
        ]);
    }
}
