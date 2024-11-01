<?php
namespace App\Http\Controllers;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function index()
    {
        $user = UserModel::findOrFail(Auth::id());
        $breadcrumb = (object) [
            'title' => 'Data Profil',
            'list' => [
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'Profil', 'url' => url('/profile')]
            ]
        ];
        $activeMenu = 'profile';
        return view('profile.index', compact('user'), [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }
    public function update(Request $request, $id)
    {
        request()->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama'     => 'required|string|max:100',
            'old_password' => 'nullable|string',
            'password' => 'nullable|min:5',
        ]);
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()
                    ->withErrors(['old_password' => __('Please enter the correct password')])
                    ->withInput();
            }
        }
        if (request()->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(storage_path('app/public/photos/' . $user->profile_image))) {
                Storage::delete('app/public/photos/' . $user->profile_image);
            }
            $file = $request->file('profile_image');
            $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
            $request->profile_image->move(storage_path('app/public/photos'), $fileName);
            $user->profile_image = $fileName;
        }
        $user->save();
        return back()->with('status', 'Profile berhasil diperbarui');
    }

    public function edit_ajax($id)
    {
        $user = UserModel::find($id);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found!']);
        }

        // Load levels for the select box
        $levels = LevelModel::all();
        return view('profile.edit_ajax', compact('user', 'levels'));
    }

    public function update_ajax(Request $request, $id)
    {
        $user = UserModel::find($id);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found!']);
        }

        // Validasi input
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update data pengguna
        $user->username = $request->username;
        $user->nama = $request->nama;

        // Update password jika ada
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('adminlte/dist/img/'), $filename);
            $user->foto = 'adminlte/dist/img/' . $filename;
        }

        $user->level_id = $request->level_id;
        $user->save();

        return response()->json(['status' => true, 'message' => 'Profil berhasil diperbarui!']);
    }

}