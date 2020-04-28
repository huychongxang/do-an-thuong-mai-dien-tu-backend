<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\Admin\StoreRequest;
use App\Http\Requests\Cms\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected $limit = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with(['roles', 'permissions'])->paginate($this->limit);
        return view('admin.pages.admins.list', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::where('guard_name', 'admin')->get();
        return view('admin.pages.admins.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $admin = Admin::create($request->all());
        if ($admin) {
            $admin->syncRoles($request->role_ids);
            $admin->syncPermissions($request->permission_ids);
            alert()->success('Tạo quản trị viên', 'Thành công');
        } else {
            alert()->error('Tạo quản trị viên', 'Thất bại!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();
        $permissions = Permission::where('guard_name', 'admin')->get();
        $currentPermissionIds = array_column($admin->getDirectPermissions()->toArray(), 'id');
        $currentRoleIds = array_column($admin->roles->toArray(), 'id');
        return view('admin.pages.admins.edit', compact('admin', 'roles', 'permissions', 'currentPermissionIds', 'currentRoleIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $admin = Admin::find($id);
        $update = $admin->update($request->all());
        if ($update) {
            $admin->syncRoles($request->role_ids);
            $admin->syncPermissions($request->permission_ids);
            alert()->success('Cập nhật quản trị viên', 'Thành công');
        } else {
            alert()->error('Cập nhật quản trị viên', 'Thất bại!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $delete = $admin->delete();
        if ($delete) {
            alert()->success('Xóa quản trị viên', 'Thành công');
        } else {
            alert()->error('Xóa quản trị viên', 'Thất bại');
        }
        return redirect()->back();
    }
}
