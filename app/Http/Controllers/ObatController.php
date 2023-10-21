<?php

namespace App\Http\Controllers;

use App\Models\Obats;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables as DataTables;

class ObatController extends Controller
{
    public function index(){

        return view("obat.index",[
            "title"=> "Data Obat",
        ]);
    }

    public function datatables(){
        $obat = Obats::query();

        return DataTables::of($obat)
        ->addIndexColumn()
        ->addColumn("aksi", function($obat){
            return '<a href="#" data-id="' . $obat->id . '" class="btn btn-warning btn-edit">Edit</a> | <a href="#" data-id="' . $obat->id . '" class="btn btn-danger btn-delete">Hapus</a>';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function get_dataobat_by_id($id){
        $obat = Obats::find($id);
        return response()->json($obat);
    }

    public function create(Request $request){
        $request->validate([
            'createkodeobat' => 'required',
            'createnamaobat' => 'required',
            'createjenisobat' => 'required',
            'createdosisobat' => 'required',
            'createdeskripsiobat' => 'required',
            'createsatuandosisobat' => 'required',
            'createhargajualobat' => 'required|numeric',
            'createhargabeliobat' => 'required|numeric',
            'createstokobat' => 'required|numeric',
            'createkategoriobat' => 'required',
            'creategambarobat' => 'required|image|mimes:jpeg,png,jpg,gif',
            'createtanggalkadaluarsaobat' => 'required|date',
        ]);

        $image = $request->file('creategambarobat');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/gambarobat', $imageName);

        $data = [
            'kodeObat' => $request->input('createkodeobat'),
            'namaObat' => $request->input('createnamaobat'),
            'jenisObat' => $request->input('createjenisobat'),
            'dosisObat' => $request->input('createdosisobat'),
            'deskripsiObat' => $request->input('createdeskripsiobat'),
            'satuandosisObat' => $request->input('createsatuandosisobat'),
            'hargajualObat' => $request->input('createhargajualobat'),
            'hargabeliObat' => $request->input('createhargabeliobat'),
            'stokObat' => $request->input('createstokobat'),
            'kategoriObat' => $request->input('createkategoriobat'),
            'gambarObat' => $request->input('creategambarobat'),
            'tanggalkadaluarsaObat' => $request->input('createtanggalkadaluarsaobat'),
            // You might also want to handle the 'gambarobat' field for file upload here.
        ];

        $image = Obats::create($data);

        return response()->json(["message"=>"Berhasil tambah data obat !!!"]);

    }
    public function update(Request $request){


        $request->validate([
            'kodeobat' => 'required',
            'namaobat' => 'required',
            'jenisobat' => 'required',
            'dosisobat' => 'required',
            'deskripsiobat' => 'required',
            'satuandosisobat' => 'required',
            'hargajualobat' => 'required|numeric',
            'hargabeliobat' => 'required|numeric',
            'stokobat' => 'required|numeric',
            'kategoriobat' => 'required',
            'tanggalkadaluarsaobat' => 'required|date',
        ]);
        $data = [
            'kodeObat' => $request->input('kodeobat'),
            'namaObat' => $request->input('namaobat'),
            'jenisObat' => $request->input('jenisobat'),
            'dosisObat' => $request->input('dosisobat'),
            'deskripsiObat' => $request->input('deskripsiobat'),
            'satuandosisObat' => $request->input('satuandosisobat'),
            'hargajualObat' => $request->input('hargajualobat'),
            'hargabeliObat' => $request->input('hargabeliobat'),
            'stokObat' => $request->input('stokobat'),
            'kategoriObat' => $request->input('kategoriobat'),
            'tanggalkadaluarsaObat' => $request->input('tanggalkadaluarsaobat'),
            // You might also want to handle the 'gambarobat' field for file upload here.
        ];

        $obat = Obats::findOrFail($request->id);
        $obat->update($data);
        return response()->json(['message'=>"Data Obat Telah Diperbarui!!!"]);


    }

    public function delete(Request $request){
        $obat = Obats::findOrFail($request->id);
        $obat->delete();
        return response()->json(["message"=> "Hapus berhasil !!!"]);
    }

}
