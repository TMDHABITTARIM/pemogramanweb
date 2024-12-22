<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use App\Http\Controllers\Controller;
use App\Http\Resources\productResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = product::all(); // Pastikan Anda mengambil semua data percetakan
        // return view('Tugas2', ['data' => $products]);  // Adjust the view if needed
        return new productResource(true, 'List Data product', $products);
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
            'nama_produk' => 'required|string',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Upload gambar produk
        $gambar_produk = $request->file('gambar_produk');
        $gambar_produk->storeAs('public/products', $gambar_produk->hashName());

        // Simpan data produk
        $product = product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'gambar_produk' => $gambar_produk->hashName()
        ]);

        return new productResource(true, 'Data product Berhasil Ditambahkan!', $product);
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
           'nama_produk' => 'required|string',
           'deskripsi_produk' => 'required|string',
           'harga_produk' => 'required|integer',
           'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cari percetakan berdasarkan ID
        $product = product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        if ($request->hasFile('gambar_produk')) {
            // Upload gambar baru
            $gambar_produk = $request->file('gambar_produk');
            $gambar_produk->storeAs('public/products', $gambar_produk->hashName());

            // Hapus gambar lama
            Storage::delete('public/products/' . basename($product->gambar_produk));

            // Update data dengan gambar baru
            $product->update([
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'harga_produk' => $request->harga_produk,
                'gambar_produk' => $gambar_produk->hashName()
            ]);
        } else {
            // Update data tanpa gambar baru
            $product->update([
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'harga_produk' => $request->harga_produk
            ]);
        }

        return new productResource(true, 'Data product Berhasil Diubah!', $product);
    }

    /**
     * destroy
     *
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $product = product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // Hapus gambar
        Storage::delete('public/products/' . basename($product->gambar_produk));

        // Hapus data actor
        $product->delete();

        return new productResource(true, 'Data product Berhasil Dihapus!', null);
    }
}
