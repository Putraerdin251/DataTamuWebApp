@extends('layout.app')

@section('content')
    <div class="mt-5">
        <div class="mt-5 mb-5 row justify-content-center">
            <div class="col-md-8 card bg-light p-4">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text" name="tujuan" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Instansi</label>
                                <input type="text" name="instansi" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>No</label>
                                <input type="text" name="no" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan di tengah -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mt-4 w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
