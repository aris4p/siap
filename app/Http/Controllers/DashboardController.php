<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view("dashboard", [
            "title"=> "Dashboard",
        ]);
    }

    public function akun(){
        $user = Auth::user();
        return view("akun.index", [
            "title"=> "Akun",
        ], compact("user"));
    }

    public function upload_foto(Request $request){

        $request->validate ([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Atau jika Anda ingin menyimpan URL gambar dalam database:
            // $imageUrl = 'storage/images/' . $imageName;

            $user->gambar = $imageName;
            $user->update();


            return response()->json(['success' => 'Berhasil mengunggah foto'],200);
        }

        return response()->json(['error'=> 'Terjadi kesalahan saat mengunggah gambar.'],400);
    }

    public function update(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',

        ], [
            'firstName.required' => 'Kolom nama depan wajib diisi.',
            'lastName.required' => 'Kolom nama belakang wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Harap masukkan alamat email yang valid.',
            'nohp.required' => 'Kolom nomor telepon wajib diisi.',
            'alamat.required' => 'Kolom alamat wajib diisi.',
            'kota.required' => 'Kolom kota wajib diisi.',
        ]);

        $data = [
            'namadepan' => $request->firstName,
            'namabelakang' => $request->lastName,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
        ];
        $user = Auth::user();
        $user->update($data);
        return back()->with('success', 'Berhasil update akun!');




    }
}
