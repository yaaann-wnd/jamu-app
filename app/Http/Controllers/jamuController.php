<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jamu');
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
    public function store(Request $request)
    {
        $keluhan1 = $request->keluhan1;
        $keluhan2 = $request->keluhan2;
        $tahun = $request->tahun;

        $class = new saran($keluhan1, $keluhan2, $tahun);

        $data = [
            'jamu' => $class->namaJamu(),
            'umur' => $class->hitungUmur(),
            'saran' => $class->Saran(),
            'khasiat' => $class->khasiat()
        ];

        return view('jamu', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Jamu
{
    public function __construct($keluhan1, $keluhan2, $tahunLahir)
    {
        $this->keluhan1 = $keluhan1;
        $this->keluhan2 = $keluhan2;
        $this->tahun = $tahunLahir;
    }

    public function namaJamu()
    {
        if ($this->keluhan1 == 'keseleo' && $this->keluhan2 == 'kurang nafsu makan') {
            return 'Beras kencur';
        } elseif ($this->keluhan1 == 'pegal-pegal') {
            return 'Kunyit asam';
        } elseif ($this->keluhan1 == 'darah tinggi' && $this->keluhan2 == 'gula darah') {
            return 'Brotowali';
        } elseif ($this->keluhan1 == 'kram perut' && $this->keluhan2 == 'masuk angin') {
            return 'Temulawak';
        } else {
            return 'terserah udah mau minum apa';
        }
    }
}

class saran extends Jamu
{
    public function hitungUmur()
    {
        return 2022 - $this->tahun;
    }

    public function Saran()
    {        
        if ($this->namaJamu() == 'Beras kencur' && $this->keluhan1 == 'keseleo') {
            return 'Dioleskan';
        } elseif ($this->namaJamu() == 'terserah udah mau minum apa') {
            return 'Gausah minum, jamunya gak ketemu';
        } else {
            if ($this->hitungUmur() <= 10) {
                return 'Dikonsumsi 1x';
            } else {
                return 'Dikonsumsi 2x';
            }
        }
    }

    public function khasiat(){
        if($this->namaJamu() == 'terserah udah mau minum apa'){
            return 'Khasiat tidak ditemukan';
        } else {
            return 'Menyembuhkan penyakit (S&K berlaku)';
        }
    }
}
