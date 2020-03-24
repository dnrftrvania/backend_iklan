<?php

namespace App\Http\Controllers;
use App\Iklan;
use Illuminate\Http\Request;
use Auth;

class IklanController extends Controller
{
    public function index() {
        $data = Iklan::all();
        return response($data);
    }

    public function show($id) {
        $data = Iklan::where('id',$id)->get();
        return response ($data);
    }

    public function store (Request $request) {
        try {
            $data = new Iklan();
            $data->nama_barang = $request->input('nama_barang');
	        $data->harga = $request->input('harga');
			$data->gambar = $request->input('gambar');
			$data->lokasi = $request->input('lokasi');
			$data->deskripsi = $request->input('deskripsi');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah data iklan berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Tambah data iklan gagal!'
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        try{
            $data = Iklan::where('id',$id)->first();
            $data->nama_barang = $request->input('nama_barang');
	        $data->harga = $request->input('harga');
		    $data->gambar = $request->input('gambar');
		    $data->lokasi = $request->input('lokasi');
		    $data->deskripsi = $request->input('deskripsi');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah data iklan berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Ubah data iklan gagal!'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Iklan::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data iklan berhasil!'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'    => '0',
                'message'   => 'Hapus data iklan gagal!'
            ]);
        }
    }
}
