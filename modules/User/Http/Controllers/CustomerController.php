<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Images\ImageService;
use Modules\Common\Utils\Responder;
use Modules\User\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::query()->where('user_type', '=', 0)->get();
        return view('admin.users.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.users.customer.create');
    }

    public function show(User $customer) {
        return Responder::response([
            'customer' => $customer
        ]);
    }

    public function store(Request $request, ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('profile_photo_path')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));

            if ($result == false) {
                return redirect()->route('admin.users.customer.index')->with(['error_msg' => 'خطا در عملیات آپلود تصویر.']);
            }

            $inputs['profile_photo_path'] = $result;
        }

        $inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = 0;
        $user = User::create($inputs);


        // Details for NewUserRegistered notification
        $details = [
            'message' => 'یک کاربر جدید در سایت ثبت نام کرد'
        ];

        // Select user
        $adminUser = User::findOrFail(1);
        $adminUser->notify(new NewUserRegistered($details));

        return redirect()->route('admin.users.customer.index')->with(['success_msg' => 'مشتری جدید با موفقیت ثبت شد']);
    }
}
