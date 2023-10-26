<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as DataTables;

class SupplierController extends Controller
{
    public function index(){
        
        
        return view('supplier.index',[
            'title'=>"Supplier"
        ]);
    }

    public function datatables(){
        $supplier = Supplier::query();

        return DataTables::of($supplier)
        ->addIndexColumn()
        ->addColumn("aksi", function($supplier){
            return '<a href="#" data-id="' . $supplier->id . '" class="btn btn-warning btn-edit">Edit</a> | <a href="#" data-id="' . $supplier->id . '" class="btn btn-danger btn-delete">Hapus</a>';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function create(Request $request){
        $request->validate([
            'kodesupplier' => 'required',
            'namasupplier' => 'required',
            'nosupplier' => 'required|numeric',
            'alamatsupplier' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required|numeric',
            'negara' => 'required',
        ]);

        $data = [
            'kodesupplier' => $request->kodesupplier,
            'namasupplier' => $request->namasupplier,
            'nosupplier' => $request->nosupplier,
            'alamatsupplier' => $request->alamatsupplier,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos,
            'negara' => $request->negara,
        ];

        $supplier = Supplier::create($data);
        return response()->json(['message'=>"Berhasil menambah supplier !!!"]);
    }

    public function get_supplier_byid($id){
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    public function update(Request $request){
        $request->validate([
            'kodesupplier' => 'required',
            'namasupplier' => 'required',
            'nosupplier' => 'required|numeric',
            'alamatsupplier' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required|numeric',
            'negara' => 'required',
        ]);

        $data = [
            'kodesupplier' => $request->input('kodesupplier'),
            'namasupplier' => $request->input('namasupplier'),
            'nosupplier' => $request->input('nosupplier'),
            'alamatsupplier' => $request->input('alamatsupplier'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi'),
            'kodepos' => $request->input('kodepos'),
            'negara' => $request->input('negara'),
        ];

        $update = Supplier::findOrFail($request->id);
        $update->update($data);

        return response()->json(['message'=> "Berhasil update supplier !!!"]);
    }

    public function delete(Request $request){
        $supplier = Supplier::findOrFail($request->id);
        $supplier->delete();
        return response()->json(['message'=>"Berhasil Hapus Data Supplier !!!"]);
    }
}
