<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = User::query()->latest();

        if ($role = $request->string('role')->toString()) {
            $q->where('role', $role);
        }

        if ($s = $request->string('q')->toString()) {
            $q->where(function ($qq) use ($s) {
                $qq->where('name','like',"%{$s}%")
                   ->orWhere('email','like',"%{$s}%");
            });
        }

        $users = $q->paginate(20)->withQueryString();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // batasi role supaya admin tidak dibuat via UI
        $roles = ['user' => 'Pasien', 'doctor' => 'Dokter', 'perawat' => 'Perawat'];
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:120',
            'email'    => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => ['required','string', Rule::in(['user','doctor','perawat'])],
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => $data['role'],
        ]);

        return to_route('admin.users.index')->with('success','User created');
    }

    public function edit(User $user)
    {
        $roles = ['user' => 'Pasien', 'doctor' => 'Dokter', 'perawat' => 'Perawat'];
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:120',
            'email'    => ['required','email:rfc,dns', Rule::unique('users','email')->ignore($user->id)],
            'password' => 'nullable|string|min:6',
            'role'     => ['required','string', Rule::in(['user','doctor','perawat'])],
        ]);

        $payload = [
            'name'  => $data['name'],
            'email' => $data['email'],
            'role'  => $data['role'],
        ];

        if (!empty($data['password'])) {
            $payload['password'] = Hash::make($data['password']);
        }

        $user->update($payload);

        return to_route('admin.users.index')->with('success','User updated');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error','Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();
        return back()->with('success','User deleted');
    }
}
