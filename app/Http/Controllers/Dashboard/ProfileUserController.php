<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileUserController extends Controller
{
    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        if ($user) {
            return redirect()
                ->route('profile.index')
                ->with([
                    'success' => 'Password anda berhasil diubah'
                ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Password anda gagal dibuat'
            ]);
        }
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $data['title'] = 'Profile';
        return view('dashboard.profile.index', $data, compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::findOrFail($id);

        if (request()->hasFile('image')) {
            if ($user->image && file_exists(storage_path('app/public/images/' . $user->image))) {
                Storage::delete('app/public/images/' . $user->image);
            }

            $file = $request->file('image');
            $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images'), $fileName);
            $user->image = $fileName;
        }

        if (!is_null($request->password)) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
            ]);
        }

        if ($user) {
            return redirect()
                ->route('profile.index')
                ->with([
                    'success' => 'Data anda berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data anda gagal diubah'
                ]);
        }
    }
}
