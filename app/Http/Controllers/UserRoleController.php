<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    public function index()
    {
        $roles = UserRole::all();
        return view('admin-panel.user-roles.index', compact('roles'));
    }

    public function storeform()
    {
        return view('admin-panel.user-roles.storeform');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:user_roles',
            'description' => 'nullable|string'
        ]);

        UserRole::create($request->all());
        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function editform($id)
    {
        $role = UserRole::findOrFail($id);
        return view('admin-panel.user-roles.editform', compact('role'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:user_roles,name,' . $id,
            'description' => 'nullable|string'
        ]);

        $role = UserRole::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = UserRole::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }

    public function getCategoryFields($catSlug = null)
    {
        $fields = DB::table('fields')
            ->where('category_slug', $catSlug)
            ->select('id', 'name')
            ->get();
        return response()->json($fields);
    }
}
