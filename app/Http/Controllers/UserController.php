<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class UserController extends Controller
{
	public function profile(User $user)
	{
		
		$user = Auth::user();

		return view('user.profile', compact('user'));
	}

	public function updateProfile(User $user, Request $request)
	{
		if (Auth::user()->id != $user->id) {
			$authUser = Auth::user();
			$authUser->spam_count += 1;
			$authUser->update();
			return back()->with('error', 'Permission denied.');
		}

		$request->validate([
			'name' => 'required',
			'mobile' => 'required',
			'email' => 'required|email|max:255|exists:users',
		]);

		$user->name = $request->name;
		$user->mobile = $request->mobile;
		$user->address = $request->address;
		$user->gender = $request->gender;
		$user->update();

		return back()->with('success', 'Profile updated successfully.');
	}
	public function index(){
		$users = User::with('roles')->paginate(20);
		return view('user.index',compact('users'));
	}

	public function destroy(User $user){
	$user->delete();
		return redirect()->back()->with('success','User deleted');
	}
	public function changePasswordShow(User $user){
        return view('user.change-password',compact('user'));
    }
    public function changePassword(User $user, ChangePasswordRequest $request){
        if (Hash::check($request->current, Auth::user()->password)) {
                $user->update(['password' => Hash::make($request->new)]);
            return redirect()->back()->with('success', "Password change successfull");
        } else {
            return redirect()->back()->with('error', "Incorrect your current password");
        }
	}	
	public function changeRoleShow(User $user){
		$roles=ModelsRole::get();
		return view('user.change-role',compact(['user','roles']));
	}
	public function changeRole(User $user,Request $request){
        if (Hash::check($request->current, Auth::user()->password)) {
                $user->syncRoles($request->roles);
            return redirect()->back()->with('success', "Role change successfull");
        } else {
            return redirect()->back()->with('error', "Incorrect your current password");
        }
	}
}
