<?php
namespace App\Http\Controllers\Backend;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class UserController extends Controller {
    public function __construct() {
        $this->middleware('permission:users_read', ['only' => ['index']]);
        $this->middleware('permission:users_create', ['only' => ['create']]);
        $this->middleware('permission:users_update', ['only' => ['edit']]);
        $this->middleware('permission:users_delete', ['only' => ['destroy']]);
    }
    public function index(Request $request) {
        $users = User::whereRoleIs('admin')->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
        })->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        //dd($request->all());
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]);
            $request_data = $request->except(['password', 'password_confirmation', 'permissions']);
            $request_data['password'] = bcrypt($request->password);
            $user = User::create($request_data);
            $user->attachRole('admin');
            $user->syncPermissions($request->permissions);
            return redirect()->route('users.index')->with([
                'message' => 'تم اضافة المستخدم بنجاح',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$user->id,
            ]);
            $request_data = $request->except(['permissions']);
            $user->update($request_data);
            $user->syncPermissions($request->permissions);
            return redirect()->route('users.index')->with([
                'message' => 'تم تحديث المستخدم بنجاح',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function destroy(User $user) {
        try {
            $user->delete();
            return redirect()->route('users.index')->with([
                'message' => 'تم حذف المستخدم بنجاح',
                'alert-type' => 'success'
            ]);
        } catch(\Exception $ex) {
            return redirect()->route('users.index')->with([
                'message' => 'عفواً حدث خطأ ما',
                'alert-type' => 'danger'
            ]);
        }
    }
}
