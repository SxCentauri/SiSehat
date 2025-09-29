<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // UI -> DB dan DB -> UI maps (jangan ubah Model/DB, cukup mapping di sini)
    private const UI_TO_DB = ['patient' => 'user', 'doctor' => 'doctor', 'nurse' => 'perawat'];
    private const DB_TO_UI = ['user' => 'patient', 'doctor' => 'doctor', 'perawat' => 'nurse', 'admin' => 'admin'];
    private const UI_ROLES = ['patient', 'doctor', 'nurse'];               // yang tampil di dropdown
    private const DB_ROLES = ['user', 'doctor', 'perawat'];                // yang valid di DB

    public function index(Request $request)
    {
        $q = User::query()->latest();

        if ($role = $request->string('role')->toString()) {
            $role = strtolower($role);
            // terima filter dari UI (patient/doctor/nurse) atau langsung nilai DB
            $roleDb = self::UI_TO_DB[$role] ?? $role;
            $q->where('role', $roleDb);
        }

        if ($s = $request->string('q')->toString()) {
            $q->where(function ($qq) use ($s) {
                $qq->where('name', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%");
            });
        }

        $users = $q->paginate(20)->withQueryString();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = self::UI_ROLES; // ['patient','doctor','nurse']
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // mapping lebih dulu supaya validasi cocok dengan enum DB
        $roleUi = strtolower($request->input('role', ''));
        $roleDb = self::UI_TO_DB[$roleUi] ?? $roleUi;
        $request->merge(['role' => $roleDb]);

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:120'],
            'email'    => ['required', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role'     => ['required', 'string', Rule::in(self::DB_ROLES)], // hanya 3 sesuai DB
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => $data['role'], // sudah nilai DB (user/doctor/perawat)
        ]);

        return to_route('admin.users.index')->with('success', 'User created');
    }

    public function edit(User $user)
    {
        $roles = self::UI_ROLES; // dropdown UI
        $roleSelected = self::DB_TO_UI[$user->role] ?? $user->role; // konversi DB->UI untuk selected
        return view('admin.users.edit', compact('user', 'roles', 'roleSelected'));
    }

    public function update(Request $request, User $user)
    {
        // kalau ini admin, kunci role-nya
        $roleRule = ($user->role === 'admin')
            ? ['nullable', 'string']  // abaikan role dari form
            : ['required', 'string', Rule::in(self::DB_ROLES)];

        // mapping role dari UI ke DB dulu (kecuali admin)
        if ($user->role !== 'admin') {
            $roleUi = strtolower($request->input('role', ''));
            $roleDb = self::UI_TO_DB[$roleUi] ?? $roleUi;
            $request->merge(['role' => $roleDb]);
        }

        $data = $request->validate([
            'name'     => ['required', 'string', 'max:120'],
            'email'    => ['required', 'email:rfc,dns', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'role'     => $roleRule,
        ]);

        $payload = [
            'name'  => $data['name'],
            'email' => $data['email'],
        ];

        if (!empty($data['password'])) {
            $payload['password'] = Hash::make($data['password']);
        }

        if ($user->role !== 'admin' && isset($data['role'])) {
            $payload['role'] = $data['role']; // nilai DB
        }

        $user->update($payload);

        return to_route('admin.users.index')->with('success', 'User updated');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }
        $user->delete();
        return back()->with('success', 'User deleted');
    }
}
