@extends('main')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h4>Owned Vehicles</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">

                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add New Truck
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped mt-1">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Jenis</th>
                        <th class="text-center" scope="col">Plat Nomor</th>
                        <th class="text-center" scope="col">Tipe BBM</th>
                        <th class="text-center" scope="col">Penggunaan BBM</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($kendaraans as $kendaraan)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td class="">{{ $kendaraan['nama_kendaraan'] }}</td>
                            <td>{{ $kendaraan['jenis_kendaraan'] }}</td>
                            <td>{{ $kendaraan['plat_nomor'] }}</td>
                            <td>{{ $kendaraan['tipe_BBM'] }}</td>
                            <td>{{ $kendaraan['penggunaan_BBM'] }}</td>
                            <td>{{ $kendaraan['status_kendaraan'] }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Truck</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- form validasi -->
                        <form action="/trucks/create" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nama_kendaraan">Nama Kendaraan</label>
                                <input class="form-control" type="text" name="nama_kendaraan">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <input class="form-control" type="text" name="jenis_kendaraan">
                            </div>
                            <div class="form-group">
                                <label for="plat_nomor">Plat Nomor</label>
                                <input class="form-control" type="text" name="plat_nomor">
                            </div>
                            <div class="form-group">
                                <label for="tipe_BBM">Tipe BBM</label>
                                <input class="form-control" type="text" name="tipe_BBM">
                            </div>
                            <br>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="me-2 btn btn-sm btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit-->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Truck</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- form validasi -->
                        <form action="/trucks/update" method="GET">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nama_kendaraan">Nama Kendaraan</label>
                                <input class="form-control" type="text" name="nama_kendaraan">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <input class="form-control" type="text" name="jenis_kendaraan">
                            </div>
                            <div class="form-group">
                                <label for="plat_nomor">Plat Nomor</label>
                                <input class="form-control" type="text" name="plat_nomor">
                            </div>
                            <div class="form-group">
                                <label for="tipe_BBM">Tipe BBM</label>
                                <input class="form-control" type="text" name="tipe_BBM">
                            </div>
                            <br>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="me-2 btn btn-sm btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        edit() {
            alert("hahahah");
        }
        $("#modalEdit").on(click(), function(e) {
            var sourceElement = e.relatedTarget;
            /*e.relatedTarget gives you which element invoked modal*/
            var id = $(sourceElement).closest('tr').find("td:first").text();
            /*using sourceElement you can easily fetch id */

        });
    </script>
@endsection
