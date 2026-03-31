@extends('layouts.template')

@section('styles')
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card">
        <div class="card-header">
            <h3>Tabel Data</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Bunderan UGM</td>
                        <td>Jalan Pancasila</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Alun-alun utara</td>
                        <td>Halaman depan keraton Jogja</td>
                    </tr>   
                    <tr>
                        <th scope="row">3</th>
                        <td>Gembira Loka Zoo</td>
                        <td>Kebun Binatang</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Bandara Adisucipto</td>
                        <td>Bandara Internasional</td>
                    </tr>
        </div>
    </div>
@endsection