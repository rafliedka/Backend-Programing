<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;


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
        
        //membuat variable yang akan menampung data request
        $input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at
        ];
        
        //membuat variable yang akan menggunakan method create yang berisikan inputan tadi
        $pasiens = Pasien::create($input);

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

    #membuat variable yang akan menampikan data pasien secara rinci
    public function show($id){

        //membuat variable pasien
        $pasien = Pasien::find($id);
        
        if ($pasien) {
            $data = [
                'message' => 'Menampilkan data pasien',
                'data' => $pasien
            ];
            return response()->json($data, 200);
        }

        else {
            $data = [
                'message' => 'Data pasien tidak ditemukan'
            ];
            return response()->json($data, 404);
        }
    }

    #membuat variable yang akan menampikan data pasien dengan nama tertentu
    public function getName($name){

        $pasien = Pasien::where('name', 'Like', '%' . $name . '%')->get();
        
        if (count($pasien) < 1) {
            $data = [
                'message' => 'Data pasien tidak ditemukan'
            ];
            return response()->json($data, 404);
        }

        else {

            $data = [
                'message' => 'Menampilkan data pasien',
                'data' => $pasien
            ];
            return response()->json($data, 200);
        }
    }

    #membuat variable yang akan menampikan data pasien dengan status tertentu
    public function getStatus($status){

        //membuat variable pasien
        $pasien = Pasien::where("status", $status)->get();
        
        if ($status == "positif") {
            
            if (count($pasien) < 1) {
                $data = [
                    'message' => 'Data pasien tidak ditemukan'
                ];
                return response()->json($data, 404);
            }
    
            else {
    
                $data = [
                    'message' => 'Menampilkan data pasien positif',
                    'data' => $pasien
                ];
                return response()->json($data, 200);
            }
        }

        elseif ($status == "sembuh") {
            if (count($pasien) < 1) {
                $data = [
                    'message' => 'Data pasien tidak ditemukan'
                ];
                return response()->json($data, 404);
            }
    
            else {
    
                $data = [
                    'message' => 'Menampilkan data pasien sembuh',
                    'data' => $pasien
                ];
                return response()->json($data, 200);
            }
        }

        elseif ($status == "meninggal") {
            if (count($pasien) < 1) {
                $data = [
                    'message' => 'Data pasien tidak ditemukan'
                ];
                return response()->json($data, 404);
            }
    
            else {
    
                $data = [
                    'message' => 'Menampilkan data pasien meninggal',
                    'data' => $pasien
                ];
                return response()->json($data, 200);
            }
        }

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

        $pasien = Pasien::find($id);

        if($pasien){

            $input = [
                'name' => $request->name ?? $pasien->nama,
                'phone' => $request->phone ?? $pasien->phone,
                'address' => $request->address ?? $pasien->address,
                'status' => $request->status ?? $pasien->status,
                'in_date_at' => $request->in_date_at ?? $pasien->in_date_at,
                'out_date_at' => $request->out_date_at ?? $pasien->out_date_at
                
            ];

            $pasien->update($input);

            $data = [
                'message' => 'Data pasien telah diupdate',
                'data' => $pasien
            ];

            return response()->json($data, 201);
        }

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
    
     #membuat method destroy
    public function destroy(Request $request, $id){
        
        $pasien = Pasien::find($id);

        if($pasien){
            $pasien->delete();

        $data = [
            'message' => 'Data pasien telah Dihapus',
            'data' => $pasien
        ];

        return response()->json($data, 201);
        }

        else{
            $data =[
                'message' => 'Data pasien tidak ditemukan'
            ];
              
            return response()->json($data, 404);
        }
    }
}
