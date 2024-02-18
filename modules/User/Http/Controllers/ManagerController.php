<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Utils\Responder;
use Modules\RolePermission\Models\Role;
use Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = User::role(Role::ROLE_MANAGER)->get();

        return Responder::response([
            'managers' => $managers
        ]);
    }


    public function show(User $manager)
    {
        return Responder::response(['manager' => $manager]);
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

    public function updateStatus(Request $request, User $user)
    {
        try {
            $user->update([
                'status' => $request->status
            ]);

            return Responder::response([
                'status' => true,
                'data' => ['status' => $user->status],
                'message' => 'اطلاعات با موفقیت بروزرسانی شد'
            ]);
        } catch (\Exception $ex) {
            return 'خطا در انجام عملیات؛ دوباره تلاش کنید';
        }
    }

    public function destroy(User $admin, ImageService $imageService)
    {
        if ($admin->delete()) {
            $imageService->deleteImage($admin->profile_photo_path);
            return redirect()->route('admin.users.admins.index')->with(['success_msg' => 'مدیر با موفقیت حذف شد!']);
        }
    }

}
