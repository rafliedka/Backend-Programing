<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
// Use Illuminate\Validation\ValidationException;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     #membuat method indek untuk mengambil seluruh data pasien
     public function index(){
        
        //variable yang akan menampung data dari static method all()
        $pasiens = Pasien::all();
        
        //membuat variable untuk menampung teks report dan data pasien
        $data = [
            'message' => 'Menampilkan seluruh pasien',
            'data' => $pasiens
        ];

        //data ditampilkan dengan format json dan menampilkan code response
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     #membuat method store untuk menambahkan data
    public function store(Request $request){
        
        //membuat variable yang akan menampung data request sekaligus divalidasi

        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required',
            'status' => 'required|string',
            'in_date_at' => 'required',
            'out_date_at' => 'required'
        ]);
        
        //membuat variable yang akan menggunakan method create yang berisikan inputan tadi
        $pasiens = Pasien::create($validated);

        //membuat variable data yang akan berisi message dan data dari variabel pasien
        $data = [
            'message' => 'data pasien berhasil ditambahkan',
            'data' => $pasiens
        ];

        //data ditampilkan dengan format json dan menampilkan code response
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */

    #membuat method yang akan menampikan data lengkap dari pasien tertentu
    public function show($id){

        //membuat variable pasien
        $pasien = Pasien::find($id);
        
        //membuat kondisi jika data pasien ditemukan
        if ($pasien) {
            $data = [
                'message' => 'Menampilkan data pasien',
                'data' => $pasien
            ];
            return response()->json($data, 200);
        }

        //kondisi dimana jika data pasien tidak ditemukan
        else {
            $data = [
                'message' => 'Data pasien tidak ditemukan'
            ];
            return response()->json($data, 404);
        }
    }

    #membuat method yang akan menampikan data pasien dengan nama tertentu
    public function getName($name){

        //membuat variable pasien yang akan digunakan untuk mencari data pasien dengan nama/karakter tertentu
        $pasien = Pasien::where('name', 'Like', '%' . $name . '%')->get();
        
        //membuat kondisi dimana jika ddata pasien yang dicari tidak ditemukan
        if (count($pasien) < 1) {
            $data = [
                'message' => 'Data pasien tidak ditemukan'
            ];
            return response()->json($data, 404);
        }

        //membuat kondisi dimana jika data pasien yang dicari ditemukan
        else {

            $data = [
                'message' => 'Menampilkan data pasien',
                'data' => $pasien
            ];
            return response()->json($data, 200);
        }
    }

    #membuat method yang akan menampikan data pasien dengan status tertentu
    public function getStatus($status){

        //membuat variable pasien yang akan digunakan untuk mencari data dengan kunci status
        $pasien = Pasien::where("status", $status)->get();
        
        //membuat kondisi dimana kunci yang dimasukan benar "positif"
        if ($status == "positif") {
            
            //membuat kondisi didalam kondisi jika data yang dicari kosong
            if (count($pasien) < 1) {
                $data = [
                    'message' => 'Data pasien tidak ditemukan'
                ];
                return response()->json($data, 404);
            }
            
            //membuat kondisi didalam kondisi jika data yang dicari tersedia
            else {
    
                $data = [
                    'message' => 'Menampilkan data pasien positif',
                    'data' => $pasien
                ];
                return response()->json($data, 200);
            }
        }

        //membuat kondisi dimana kunci yang dimasukan benar "sembuh"
        elseif ($status == "sembuh") {

            //membuat kondisi didalam kondisi jika data yang dicari kosong
            if (count($pasien) < 1) {
                $data = [
                    'message' => 'Data pasien tidak ditemukan'
                ];
                return response()->json($data, 404);
            }
            
            //membuat kondisi didalam kondisi jika data yang dicari tersedia
            else {
    
                $data = [
                    'message' => 'Menampilkan data pasien sembuh',
                    'data' => $pasien
                ];
                return response()->json($data, 200);
            }
        }

        //membuat kondisi dimana kunci yang dimasukan benar "meninggal"
        elseif ($status == "meninggal") {

            //membuat kondisi didalam kondisi jika data yang dicari kosong
            if (count($pasien) < 1) {
                $data = [
                    'message' => 'Data pasien tidak ditemukan'
                ];
                return response()->json($data, 404);
            }
            
            //membuat kondisi didalam kondisi jika data yang dicari tersedia
            else {
    
                $data = [
                    'message' => 'Menampilkan data pasien meninggal',
                    'data' => $pasien
                ];
                return response()->json($data, 200);
            }
        }

        //membuat kondisi dimana kunci yang dimasukan tidak benar/tidak tepat
        else {
            $data = [
                'message' => 'Status tidak ditemukan / salah'
            ];
            return response()->json($data, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    
    #membuat method update
    public function update(Request $request, $id){

        //membuat variabel pasien yang akan digunakan untuk mencari id pasien
        $pasien = Pasien::find($id);

        //membuat kondisi jika id pasien yang dicari ditemukan
        if($pasien){

            //inputan akan diterima dan disimpan kedalam variable input
            $input = [
                'name' => $request->name ?? $pasien->nama,
                'phone' => $request->phone ?? $pasien->phone,
                'address' => $request->address ?? $pasien->address,
                'status' => $request->status ?? $pasien->status,
                'in_date_at' => $request->in_date_at ?? $pasien->in_date_at,
                'out_date_at' => $request->out_date_at ?? $pasien->out_date_at
                
            ];

            //lalu membuat property dengan menggunakan method update yang akan mengupdate data dari proprty input
            $pasien->update($input);

            //membuat property yang aka menampilkan pesan jika data telah diupdate
            $data = [
                'message' => 'Data pasien telah diupdate',
                'data' => $pasien
            ];

            return response()->json($data, 201);
        }

        //kondisi kedua dimana data yang dicari tidak ditemukan
        else {
            $data = [
                'message' => 'Id Pasien tidak ditemukan',
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    
     #membuat method destroy untuk menghapus data pasien tertentu
    public function destroy(Request $request, $id){
        
        //membuat property untuk menemukan id yang dicari
        $pasien = Pasien::find($id);

        //membuat kondisi dimana jika id pasien yang dicari ditemukan maka
        if($pasien){

            //data pasien tersebut akan di hapus dengan method delete
            $pasien->delete();

            //membuat poperty untuk mengirimkan pesan jika data berhasil dihapus
            $data = [
                'message' => 'Data pasien telah Dihapus',
                'data' => $pasien
            ];

            return response()->json($data, 201);
        }

        //kondisi jika data pasien yang dicari tidak ditemukan
        else{
            $data =[
                'message' => 'Data pasien tidak ditemukan'
            ];
              
            return response()->json($data, 404);
        }
    }
}
