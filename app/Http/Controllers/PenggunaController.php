<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PenggunaController extends Controller
{
    public function index(){
        $users = User::with('roles')->get();
        
      
  
        return view('pengguna.index',[
            'title'=>"Pengguna",
            'users' => $users,
            // 'roles' => $us,
        ]);
    }

    public function role($id){
        $user = User::findOrFail($id);
        
        $permission = $user->getDirectPermissions();
        $permissions = json_encode($permission);
        
        
        return view('pengguna.role', [
            'title' => "Pengguna Role"
        ], compact('user','permissions'));
    }

    public function give_permission(Request $request){
        $user = User::findorFail($request->user_id);
        $type  = $request->is_checked;
        $is_checked = filter_var($type, FILTER_VALIDATE_BOOLEAN);
        $value = $request->value;
      
        // dd($request->is_checked === true);
        if ($is_checked == true) { // Gunakan === untuk membandingkan tipe data juga
            $user->givePermissionTo($value);
            return response()->json(['message' => "Berhasil menambah permission $value"]);
        } else {
            $user->revokePermissionTo($value);
            return response()->json(['message' => "Berhasil menghapus permission $value"]);
        }
        
        
    }
}
