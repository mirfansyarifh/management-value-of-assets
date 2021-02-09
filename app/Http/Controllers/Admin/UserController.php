<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Auth\User\User;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(IndexUserRequest $request)
    {
        $users = User::all()->whereNotIn('role', ['sadmin', 'system']);

        return view('admin.users.index', compact('users'));
    }

    public function create(CreateUserRequest $request)
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $role = Role::findById($request->get('role_id') ?? 'karyawan');
            $user = new User([
                'name' => $request->get('name'),
                'nip' => $request->get('nip'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'jabatan' => $request->get('jabatan')
            ]);
            $user->assignRole($role);
            $user->save();
            $notification = array(
                'message' => 'User sukses dibuat!',
                'alert-type' => 'success'
            );
                
            Session::flash('flash', json_encode(__('messages.success-create', ['model'=>'User'])));
            return response()->redirectToRoute('user.index')->with($notification);
        } catch (\Exception $exception) {
            Session::flash('flash', json_encode(__('messages.error', ['model'=>'User', 'code'=>$exception->getCode()])));
            return response()->redirectToRoute('user.create');
        }
    }

    public function show(ShowUserRequest $request, int $id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function edit(EditUserRequest $request, int $id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->nip = $request->get('nip');
        if ($user->email !== $request->get('email')) $user->email = $request->get('email');
        //$user->password = bcrypt($request->get('password')) ?? $user->password;
        $user->password = !is_null($request->get('password')) ? bcrypt($request->get('password')) : $user->password;
        $user->jabatan = $request->get('jabatan');
        $role = Role::findById($request->get('role_id') ?? 'karyawan');
        $user->assignRole($role);
        $user->save();
        $notification = array(
            'message' => $request->user()->can('user-edit') ? 'User sukses diupdate!' : 'Data pribadi sukses diupdate',
            'alert-type' => 'warning'
        );
        return $request->user()->can('user-edit')
            ? redirect()->to('user')->with($notification)
            : redirect()->to('home')->with($notification);

    }

    public function destroy(DeleteUserRequest $request, int $id)
    {
        try {
            User::findOrFail($id)->delete();
            return response('success');
        } catch (\Exception $e) {
            return response('User not found', 400);
        }
    }
}
