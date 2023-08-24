@extends('main')

@section('content')
    @if (session('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
    @endif

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

        {{-- table --}}
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
                        <tr class="dataRows">
                            <th scope="row">{{ $no++ }}</th>
                            <td scope="row" style="display:none;">{{ $kendaraan['id'] }}</td>
                            <td scope="row">{{ $kendaraan['nama_kendaraan'] }}</td>
                            <td scope="row">{{ $kendaraan['jenis_kendaraan'] }}</td>
                            <td scope="row">{{ $kendaraan['plat_nomor'] }}</td>
                            <td scope="row">{{ $kendaraan['tipe_BBM'] }}</td>
                            <td scope="row">{{ $kendaraan['penggunaan_BBM'] }}</td>
                            <td scope="row">{{ $kendaraan['status_kendaraan'] }}</td>
                            <td scope="row">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit" id="editPopUp">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- end of table --}}

        <!-- Modal tambah -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Truck</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
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
        {{-- end of modal tambah --}}

        <!-- Modal Edit-->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Truck</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <!-- form validasi -->
                        <form id="formEdit" action="/trucks/update" method="GET">
                            <div class="form-group">
                                <label for="nama_kendaraan">Nama Kendaraan</label>
                                <input class="form-control" type="text" name="nama_kendaraan" value="">
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
                            <div class="form-group">
                                <label for="penggunaan_BBM">Penggunaan BBM</label>
                                <input class="form-control" type="text" name="penggunaan_BBM">
                            </div>
                            <div class="form-group">
                                <label for="status_kendaraan">Status</label>
                                <input class="form-control" type="text" name="status_kendaraan">
                            </div>
                            {{ csrf_field() }}
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
        <!-- end of Modal Edit-->
    </div>
    <script>
        // Get all "Edit" buttons with the class "btn-warning"
        const editButtons = document.querySelectorAll('.btn-warning');
        const formEdit = document.querySelector('#formEdit');

        // Attach a click event handler to each "Edit" button
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get the parent row of the clicked "Edit" button
                const row = this.closest('.dataRows'); // Assumes "dataRows" class is used for rows

                // Get data from the row cells
                const rowData = [];
                const cells = row.querySelectorAll('td');
                cells.forEach(cell => {
                    rowData.push(cell.textContent);
                });

                // You can now use rowData for further processing or display
                console.log(rowData);

                // You can also populate the data in a modal for editing
                const editModal = document.querySelector(
                    '#modalEdit'); // Assuming you have a modal with id "modalEdit"
                const modalFields = editModal.querySelectorAll(
                    'input'); // Assuming you use input fields in the modal

                // Populate modal input fields with corresponding data
                for (let i = 0; i < modalFields.length; i++) {
                    modalFields[i].value = rowData[i + 1]; // Skip the first cell which is the row number
                }

                formEdit.action = "/trucks/update/" + rowData[0];
            });
        });
    </script>
@endsection
