<?php

namespace App\Http\Controllers\Api;

use App\Models\percetakan;
use App\Http\Controllers\Controller;
use App\Http\Resources\percetakanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class percetakanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $percetakans = percetakan::all(); // Pastikan Anda mengambil semua data percetakan
        // return view('Tugas2', ['data' => $percetakans]);  // Adjust the view if needed
        return new percetakanResource(true, 'List Data percetakans', $percetakans);
    }

    /**
     * store
     *
     * @param mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tipe_cetak' => 'required|string',
            'harga_cetak' => 'required|integer',
            'gambar_cetak' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Upload actor photo
        $gambar_cetak = $request->file('gambar_cetak');
        $gambar_cetak->storeAs('public/percetakans', $gambar_cetak->hashName());

        // Simpan data actor
        $percetakan = percetakan::create([
            'tipe_cetak' => $request->tipe_cetak,
            'harga_cetak' => $request->harga_cetak,
            'gambar_cetak' => $gambar_cetak->hashName(),
        ]);

        return new percetakanResource(true, 'Data Actor Berhasil Ditambahkan!', $percetakan);
    }

    /**
     * update
     *
     * @param mixed $request
     * @param mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tipe_cetak' => 'required|string',
            'harga_cetak' => 'required|integer',
            'gambar_cetak' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cari percetakan berdasarkan ID
        $percetakan = percetakan::find($id);

        if (!$percetakan) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        if ($request->hasFile('gambar_cetak')) {
            // Upload gambar baru
            $gambar_cetak = $request->file('gambar_cetak');
            $gambar_cetak->storeAs('public/percetakans', $gambar_cetak->hashName());

            // Hapus gambar lama
            Storage::delete('public/percetakans/' . basename($percetakan->gambar_cetak));

            // Update data dengan gambar baru
            $percetakan->update([
                'tipe_cetak' => $request->tipe_cetak,
                'harga_cetak' => $request->harga_cetak,
                'gambar_cetak' => $gambar_cetak->hashName(),
            ]);
        } else {
            // Update data tanpa gambar baru
            $percetakan->update([
                'tipe_cetak' => $request->actor_name,
                'harga_cetak' => $request->ranking
            ]);
        }

        return new percetakanResource(true, 'Data percetakan Berhasil Diubah!', $percetakan);
    }

    /**
     * destroy
     *
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $percetakan = percetakan::find($id);

        if (!$percetakan) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus gambar
        Storage::delete('public/percetakans/' . basename($percetakan->gambar_cetak));

        // Hapus data actor
        $percetakan->delete();

        return new percetakanResource(true, 'Data percetakan Berhasil Dihapus!', null);
    }
}
