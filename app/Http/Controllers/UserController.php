<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Post;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function register()
    {
        return view('admin.register');
    }
    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'gmail' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $request['password'] = Hash::make($request->password);
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images'), $file_name);
        }else{
            $file_name = "avatar_profile.jpg";
        }
        $request->merge(['avatar' => $file_name]);
        User::create($request->all());
        return redirect()->route('login')->with('succsess', 'Register Access');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')
                ->with('success', 'Signed in');
        }

        return redirect("login")->with('success', 'Login details are not valid');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function showAll(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.list-user');
    }
    public function changePassword()
    {
        return view('admin.change-password');
    }
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("succsess", "Password changed successfully!");
    }
    public function profile($id)
    {
        $user_id = User::FindOrFail($id);
        return view('admin.profile', compact('user_id'));
    }
    public function editProfile(User $user)
    {
        $user = Auth::user();
        return view('admin.edit-profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {     
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->gmail = $request->input('gmail');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        if ($request->has('file_upload')) {
            $destination = 'images/' . $user->avatar;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file_upload');
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images'), $file_name);
            $user->avatar = $file_name;
        }
        $user->save();
        return redirect()->route('profile', auth()->user()->id)->with('success', 'User updated successfully!');
    }
}
