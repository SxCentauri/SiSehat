<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $profile = $request->user()->doctorProfile ?? new DoctorProfile(['user_id' => $request->user()->id]);
        return view('doctor.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'specialization' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'clinic_address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $profile = DoctorProfile::firstOrCreate(['user_id' => $request->user()->id]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar_path'] = $path;
        }

        $profile->update($data);

        return back()->with('ok', 'Profil diperbarui');
    }
}
