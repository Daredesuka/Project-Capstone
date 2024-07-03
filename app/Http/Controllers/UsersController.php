<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    public function index()
    {
        $data['users'] = User::paginate(3);
        return view('admin.users.index', $data);
    }
    public function create()
    {
        $data['level'] = Level::all();
        return view('admin.users.add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'officer_name' => 'required|min:2|max:20',
            'username' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'phone_number' => 'required',
            'level_id' => 'required',
            'photo' => 'required',
        ]);
        $user = new User;
        $user->officer_name = $request->officer_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = time() . '_' . uniqid() . '.' . $photo->extension(); // atau bisa juga $photo->getClientOriginalExtension()
        
            // Simpan file dengan nama yang telah ditentukan di folder 'avatar_report' di disk S3
            $path = $photo->storeAs('avatar', $photo_name, 's3');
        
            // Atur nama file ke atribut 'photo' pada model 'Report'
            $user->photo = $photo_name;
        
            // Set file menjadi publik agar bisa diakses melalui URL
            Storage::disk('s3')->setVisibility($path, 'public');
        }
        
        $user->phone_number = $request->phone_number;
        $user->level_id = $request->level_id;
        $user->save();
        if ($request->submit == "more") {
            return redirect()->route('users.create')->with(['success' => 'User has been saved !']);
        } else {
            return redirect()->route('users.index')->with(['success' => 'User has been saved']);
        };
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User has been deleted']);
    }

    public function edit($id)
    {
        $data['level'] = Level::all();
        $data['user'] = User::findOrFail($id);
        return view('admin.users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'officer_name' => 'required|min:2|max:20',
            'username' => 'required|min:2|max:20',
            'email' => 'required|email',
            'phone_number' => 'required',
            'level_id' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->officer_name = $request->officer_name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->get('password') != '') {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = time() . '_' . uniqid() . '.' . $photo->extension(); // atau bisa juga $photo->getClientOriginalExtension()
        
            // Simpan file dengan nama yang telah ditentukan di folder 'avatar_report' di disk S3
            $path = $photo->storeAs('avatar', $photo_name, 's3');
        
            // Atur nama file ke atribut 'photo' pada model 'Report'
            $user->photo = $photo_name;
        
            // Set file menjadi publik agar bisa diakses melalui URL
            Storage::disk('s3')->setVisibility($path, 'public');
        }
        
        $user->phone_number = $request->phone_number;
        $user->level_id = $request->level_id;
        $result = $user->save();
        if ($result) {
            return redirect()->route('users.index')->with(['success' => 'User has been updated']);
        } else {
            return redirect()->back();
        }
    }

    public function deleteCheckedStudents(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', $ids)->delete();
        return response()->json(['success' => "Students have been deleted!"]);
    }
}