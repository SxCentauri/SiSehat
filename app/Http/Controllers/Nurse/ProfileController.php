<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\NurseProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil perawat.
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = NurseProfile::firstOrCreate(['user_id' => $user->id]);
        return view('nurse.profile.edit', compact('profile'));
    }

    /**
     * Menyimpan perubahan pada profil perawat.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = NurseProfile::firstOrCreate(['user_id' => $user->id]);

        $data = $request->validate([
            'department' => 'nullable|string|max:255',
            'bio'        => 'nullable|string',
            'phone'      => 'nullable|string|max:50',
            'avatar'     => 'nullable|image|max:10048', // Batas 2MB
        ]);

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($profile->avatar_path) {
                Storage::disk('public')->delete($profile->avatar_path);
            }
            // Simpan avatar baru dan dapatkan path-nya
            $data['avatar_path'] = $request->file('avatar')->store('avatars', 'public');
        }

        $profile->update($data);

        return back()->with('ok', 'Profil berhasil diperbarui!');
    }
}
