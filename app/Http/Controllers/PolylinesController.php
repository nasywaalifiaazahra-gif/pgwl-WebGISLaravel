<?php

namespace App\Http\Controllers;

use App\Models\polylinesModel;
use Illuminate\Http\Request;

class PolylinesController extends Controller
{
    protected $polylines; // <-- TAMBAHKAN INI

    public function __construct()
    {
        $this->polylines = new polylinesModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi input
        $request->validate(
        [
            'geometry_polyline' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'geometry_polyline.required' => 'Field geometry polyline harus diisi.',
            'name.required' => 'Field name harus diisi.',
            'name.string' => 'Field name harus berupa string.',
            'name.max' => 'Field name tidak boleh lebih dari 255 karakter.',
            'image.image' => 'File image harus berupa file gambar.',
            'image.mimes' => 'File gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2048kb.',
        ]

        );

        //Create directory for images if it doesn't exit
        if (!is_dir('storage/images')) {
        mkdir('./storage/images', 0777);
        }

        //Get te upload image
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name_image = time() . "_polyline." . strtolower($image->getClientOriginalExtension());
        $image->move('storage/images', $name_image);
        } else {
        $name_image = null;
        }

        $data = [
            'geom' => $request-> geometry_polyline,
            'name' => $request-> name,
            'description' => $request-> description,
            'image'=> $name_image,
        ];

        //Simpan data ke database
        if (!$this->polylines->create($data)){
            return redirect()->route('peta')->with('error', 'Gagal menyimpan data point.');
        }

        return redirect()->route('peta')->with('success', 'Data point berhasil disimpan');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Mencari nama file gambar berdasrakan ID polyline
        $image = $this->polylines->find($id)->image;


        //Menghapus data dari database
        if (!$this->polylines->destroy($id)){
            return redirect()->route('peta')->with('error', 'Gagal Menghapus data polyline.');
        }

        //Hapus file gambar jika ada
        if ($image !=null) {
            if (file_exists('./storage/images/' . $image)) {
                unlink('./storage/images/' . $image);
            }
        }

        //Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Data polyline berhasil dihapus.');
    }
}
