<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function index()
    {
        $managers = User::query()->hasRole('manager')->get();
        return Responder::response([
            'managers' => $managers
        ]);
    }

    public function create()
    {
        return view('admin.users.admin.create');
    }

    public function store(Request $request, ImageService $imageService)
    {
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'admins');
            $result = $imageService->save($request->file('image'));

            if (!$result) {
                return redirect()->route('admin.users.admins.create')->with(['error_msg' => 'خطا در آپلود عکس؛ دوباره تلاش کنید!']);
            }
        }

        $inputs = [
            'email' => $request->email,
            'mobile' => $request->mobile,
            'national_code' => $request->national_code,
            'password' => $request->password, /*Hash::make($request->password)*/
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'slug' => $request->username,
            'user_type' => 1,
            'profile_photo_path' => $result,
            'activation' => 0,
            'status' => $request->status
        ];

        User::create($inputs);
        return redirect()->route('admin.users.admins.index')->with(['success_msg' => 'مدیر جدید ایجاد شد!']);
    }

    public function show(User $user)
    {

    }

    public function edit(User $admin)
    {
        return view('admin.users.admin.edit', compact('admin'));
    }

    public function update(Request $request, User $admin, ImageService $imageService)
    {
        $inputs = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'slug' => $request->id,
            'mobile' => $request->mobile,
            'national_code' => $request->national_code,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'admins');
            $result = $imageService->save($request->file('image'));

            if ($result) {
                $imageService->deleteImage($admin->profile_photo_path);
                $inputs['profile_photo_path'] = $result;
            } else {
                return redirect()->route('admin.users.admins.create')->with(['error_msg' => 'خطا در آپلود عکس؛ دوباره تلاش کنید!']);
            }
        }

        if (!is_null($request->password)) {
            $inputs['password'] = Hash::make($request->password);
        }

        $admin->update($inputs);
        return redirect()->route('admin.users.admins.index')->with(['success_msg' => 'مدیر مذکور بروزرسانی شد!']);
    }

    public function destroy(User $admin, ImageService $imageService)
    {
        if ($admin->delete()) {
            $imageService->deleteImage($admin->profile_photo_path);
            return redirect()->route('admin.users.admins.index')->with(['success_msg' => 'مدیر با موفقیت حذف شد!']);
        }
    }

    public function status(User $admin)
    {
        $admin->status = $admin->status == 0 ? 1 : 0;

        if ($admin->save()) {
            if ($admin->status == 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true,
                ]);
            }

            return response()->json([
                'status' => true,
                'checked' => false
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }

    public function activation(User $admin)
    {
        $admin->activation = $admin->activation == 0 ? 1 : 0;

        if ($admin->save()) {
            if ($admin->activation == 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true,
                ]);
            }

            return response()->json([
                'status' => true,
                'checked' => false
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
