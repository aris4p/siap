@extends('layouts.admin.main')

@section('body')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ $title }}</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Data Obat</h5>
                <div class="px-2 mb-4">
                    <button class="btn btn-primary btn-lg" id="tambahobat"  aria-pressed="true">Tambah Data Obat</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Jenis Obat</th>
                                <th>Deskripsi</th>
                                <th>Satuan</th>
                                <th>Kategori Obat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->

            {{-- Modal Create --}}
            <div class="col-lg-4 col-md-3">
                <!-- Modal -->
                <div class="modal fade" id="tambahModal" data-bs-backdrop="static" tabindex="-1" >
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Obat</h5>
                                <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-6 mb-3">

                                        <label for="kodeobat" class="form-label">Kode Obat</label>
                                        <input
                                        type="text"
                                        id="createkodeobat"
                                        name="createkodeobat"
                                        class="form-control"
                                        placeholder="Kode Obat"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="namaobat" class="form-label">Nama Obat</label>
                                        <input
                                        type="text"
                                        id="createnamaobat"
                                        name="createnamaobat"
                                        class="form-control"
                                        placeholder="Nama Obat"
                                        />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6 mb-0">
                                        <label for="jenisobat" class="form-label">Jenis Obat</label>
                                        <input
                                        type="text"
                                        id="createjenisobat"
                                        name="createjenisobat"
                                        class="form-control"
                                        placeholder="Nama Obat"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="dosisobat" class="form-label">Dosis Obat</label>
                                        <input
                                        type="text"
                                        id="createdosisobat"
                                        name="createdosisobat"
                                        class="form-control"
                                        placeholder="Nama Obat"
                                        />
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="deskripsiobat" class="form-label">Deskripsi Obat</label>
                                            <input
                                            type="text"
                                            id="createdeskripsiobat"
                                            name="createdeskripsiobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6 mb-0">
                                            <label for="satuandosisobat" class="form-label">Satuan Dosis Obat</label>
                                            <input
                                            type="text"
                                            id="createsatuandosisobat"
                                            name="createsatuandosisobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="hargajualobat" class="form-label">Harga Jual Obat</label>
                                            <input
                                            type="text"
                                            id="createhargajualobat"
                                            name="createhargajualobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6 mb-0">
                                            <label for="hargabeliobat" class="form-label">Harga Beli Obat</label>
                                            <input
                                            type="text"
                                            id="createhargabeliobat"
                                            name="createhargabeliobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="stokobat" class="form-label">Stok Obat</label>
                                            <input
                                            type="text"
                                            id="createstokobat"
                                            name="createstokobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6 mb-0">
                                            <label for="kategoriobat" class="form-label">Kategori Obat</label>
                                            <input
                                            type="text"
                                            id="createkategoriobat"
                                            name="createkategoriobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="gambarobat" class="form-label">Gambar Obat</label>
                                            <input
                                            type="file"
                                            id="creategambarobat"
                                            name="creategambarobat"
                                            class="form-control"
                                            placeholder="gambar Obat"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="tanggalkadaluarsaobat" class="form-label">Tanggal Kadaluarsa Obat</label>
                                            <input
                                            type="date"
                                            id="createtanggalkadaluarsaobat"
                                            name="createtanggalkadaluarsaobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" id="createData" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Modal Update -->
                <div class="col-lg-4 col-md-3">
                    <!-- Modal -->
                    <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" >
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="backDropModalTitle">Ubah Obat</h5>
                                    <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-2">
                                        <div class="col-6 mb-3">
                                            <input type="hidden" name="id" id="id">
                                            <label for="kodeobat" class="form-label">Kode Obat</label>
                                            <input
                                            type="text"
                                            id="kodeobat"
                                            name="kodeobat"
                                            class="form-control"
                                            placeholder="Kode Obat"
                                            />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="namaobat" class="form-label">Nama Obat</label>
                                            <input
                                            type="text"
                                            id="namaobat"
                                            name="namaobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6 mb-0">
                                            <label for="jenisobat" class="form-label">Jenis Obat</label>
                                            <input
                                            type="text"
                                            id="jenisobat"
                                            name="jenisobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                        <div class="col-6 mb-0">
                                            <label for="dosisobat" class="form-label">Dosis Obat</label>
                                            <input
                                            type="text"
                                            id="dosisobat"
                                            name="dosisobat"
                                            class="form-control"
                                            placeholder="Nama Obat"
                                            />
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="deskripsiobat" class="form-label">Deskripsi Obat</label>
                                                <input
                                                type="text"
                                                id="deskripsiobat"
                                                name="deskripsiobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6 mb-0">
                                                <label for="satuandosisobat" class="form-label">Satuan Dosis Obat</label>
                                                <input
                                                type="text"
                                                id="satuandosisobat"
                                                name="satuandosisobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                            <div class="col-6 mb-0">
                                                <label for="hargajualobat" class="form-label">Harga Jual Obat</label>
                                                <input
                                                type="text"
                                                id="hargajualobat"
                                                name="hargajualobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6 mb-0">
                                                <label for="hargabeliobat" class="form-label">Harga Beli Obat</label>
                                                <input
                                                type="text"
                                                id="hargabeliobat"
                                                name="hargabeliobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                            <div class="col-6 mb-0">
                                                <label for="stokobat" class="form-label">Stok Obat</label>
                                                <input
                                                type="text"
                                                id="stokobat"
                                                name="stokobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6 mb-0">
                                                <label for="kategoriobat" class="form-label">Kategori Obat</label>
                                                <input
                                                type="text"
                                                id="kategoriobat"
                                                name="kategoriobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                            <div class="col-6 mb-0">
                                                <label for="gambarobat" class="form-label">Gambar Obat</label>
                                                <input
                                                type="file"
                                                id="gambarobat"
                                                name="gambarobat"
                                                class="form-control"
                                                placeholder="gambar Obat"
                                                />
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="tanggalkadaluarsaobat" class="form-label">Tanggal Kadaluarsa Obat</label>
                                                <input
                                                type="date"
                                                id="tanggalkadaluarsaobat"
                                                name="tanggalkadaluarsaobat"
                                                class="form-control"
                                                placeholder="Nama Obat"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" id="updateData" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Content wrapper -->


            <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
            <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" ></script>
            <script src="//cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                let datatable
                $(document).ready(function(){
                    datatable =  $('#myTable').DataTable({
                        processing:true,
                        serverSide:true,
                        ajax:"{{ route('data-obat') }}",
                        columns:[
                        { data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data:'kodeObat', name: 'kodeObat' },
                        { data:'namaObat', name: 'namaObat' },
                        { data:'jenisObat', name: 'jenisObat' },
                        { data:'deskripsiObat', name: 'deskripsiObat' },
                        { data:'satuandosisObat', name: 'satuandosisObat' },
                        { data:'kategoriObat', name: 'kategoriObat' },
                        { data:'aksi', name: 'aksi', orderable: false, searchable: false}
                        ]
                    });


                });

                $(document).on('click', '#tambahobat', function () {
                  $('#tambahModal').modal('show');
                });

                $("#createData").click(function() {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    // Ambil data dari input fields
                    var createkodeobat = $("#createkodeobat").val();
                    var createnamaobat = $("#createnamaobat").val();
                    var createjenisobat = $("#createjenisobat").val();
                    var createdosisobat = $("#createdosisobat").val();
                    var createdeskripsiobat = $("#createdeskripsiobat").val();
                    var createsatuandosisobat = $("#createsatuandosisobat").val();
                    var createhargajualobat = $("#createhargajualobat").val();
                    var createhargabeliobat = $("#createhargabeliobat").val();
                    var createstokobat = $("#createstokobat").val();
                    var createkategoriobat = $("#createkategoriobat").val();
                    var creategambarobat = $("#creategambarobat")[0].files[0]; // Gambar adalah file, perlu menggunakan [0] untuk mengambil file pertama
                    var createtanggalkadaluarsaobat = $("#createtanggalkadaluarsaobat").val();

                    // Buat objek FormData untuk mengirim data termasuk file
                    var formData = new FormData();
                    formData.append("createkodeobat", createkodeobat);
                    formData.append("createnamaobat", createnamaobat);
                    formData.append("createjenisobat", createjenisobat);
                    formData.append("createdosisobat", createdosisobat);
                    formData.append("createdeskripsiobat", createdeskripsiobat);
                    formData.append("createsatuandosisobat", createsatuandosisobat);
                    formData.append("createhargajualobat", createhargajualobat);
                    formData.append("createhargabeliobat", createhargabeliobat);
                    formData.append("createstokobat", createstokobat);
                    formData.append("createkategoriobat", createkategoriobat);
                    formData.append("creategambarobat", creategambarobat);
                    formData.append("createtanggalkadaluarsaobat", createtanggalkadaluarsaobat);

                    // Kirim data ke server menggunakan AJAX
                    $.ajax({
                        type: "POST",
                        url: "{{ route('create-obat') }}", // Gantilah URL server sesuai dengan kebutuhan Anda
                        data: formData,
                        processData: false,  // Jangan memproses data secara otomatis
                        contentType: false,  // Jangan mengatur jenis konten secara otomatis
                        success: function(response) {
                            // Tutup modal setelah berhasil menambahkan data
                            $("#tambahModal").modal("hide");
                            // Handle respons dari server (misalnya, tampilkan pesan sukses atau validasi)
                            Swal.fire(
                            'Berhasil!',
                            response.message,
                            'success'
                            );

                            datatable.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle kesalahan yang terjadi saat mengirim data
                            $('#tambahModal').modal('hide');
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'ada yang salah, periksa kembali form input!!!',
                            })


                        }
                    });
                });

                $(document).on('click', '.btn-edit', function () {
                    var id = $(this).data('id');
                    console.log(id);
                    // Kirim permintaan AJAX untuk mengambil data sesuai ID dan isi formulir
                    $.ajax({
                        url: "{{url('obatbyid') }}"+"/"+id, // Gantilah dengan URL yang sesuai
                        type: 'GET',
                        success: function (response) {
                            // Isi formulir dengan data yang diambil dari server
                            $('#id').val(id);
                            $('#kodeobat').val(response.kodeObat);
                            $('#namaobat').val(response.namaObat);
                            $('#jenisobat').val(response.jenisObat);
                            $('#dosisobat').val(response.dosisObat);
                            $('#deskripsiobat').val(response.deskripsiObat);
                            $('#satuandosisobat').val(response.satuandosisObat);
                            $('#hargajualobat').val(response.hargajualObat);
                            $('#hargabeliobat').val(response.hargabeliObat);
                            $('#stokobat').val(response.stokObat);
                            $('#kategoriobat').val(response.kategoriObat);
                            $('#tanggalkadaluarsaobat').val(response.tanggalkadaluarsaObat);
                            // Tampilkan modal
                            console.log(response.kodeObat);
                            $('#editModal').modal('show');
                        }
                    });
                });

                $('#updateData').click(function () {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    var formData = new FormData();
                    formData.append('id', $('#editModal input[name="id"]').val());
                    formData.append('kodeobat', $('#editModal input[name="kodeobat"]').val());
                    formData.append('namaobat', $('#editModal input[name="namaobat"]').val());
                    formData.append('jenisobat', $('#editModal input[name="jenisobat"]').val());
                    formData.append('dosisobat', $('#editModal input[name="dosisobat"]').val());
                    formData.append('deskripsiobat', $('#editModal input[name="deskripsiobat"]').val());
                    formData.append('satuandosisobat', $('#editModal input[name="satuandosisobat"]').val());
                    formData.append('hargajualobat', $('#editModal input[name="hargajualobat"]').val());
                    formData.append('hargabeliobat', $('#editModal input[name="hargabeliobat"]').val());
                    formData.append('stokobat', $('#editModal input[name="stokobat"]').val());
                    formData.append('kategoriobat', $('#editModal input[name="kategoriobat"]').val());
                    formData.append('gambarobat', $('#editModal input[name="gambarobat"]')[0].files[0]);
                    formData.append('tanggalkadaluarsaobat', $('#editModal input[name="tanggalkadaluarsaobat"]').val());

                    $.ajax({
                        url: '{{ route('update-obat') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#editModal').modal('hide');
                            Swal.fire(
                            'Berhasil!',
                            response.message,
                            'success'
                            );

                            datatable.ajax.reload();

                        },
                        error: function (xhr, status, error, response) {
                            // Penanganan kesalahan - contoh pesan kesalahan
                            $('#editModal').modal('hide');
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'ada yang salah, periksa kembali form input!!!',
                            })

                        }
                    });

                });

                $(document).on('click', '.btn-delete', function () {
                    var id = $(this).data('id');
                    console.log(id);

                    // Tampilkan konfirmasi penghapusan dengan SweetAlert2
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: 'Anda yakin ingin menghapus data ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Lakukan penghapusan data melalui AJAX
                            $.ajax({
                                url: "{{ route('delete-obat') }}", // Gantilah dengan URL yang sesuai
                                type: 'POST',
                                data: { id: id, _token: '{{ csrf_token() }}' }, // Gantilah dengan parameter yang sesuai
                                success: function (response) {
                                    Swal.fire('Berhasil!', response.message, 'success');

                                    // Memuat ulang tabel DataTable
                                    datatable.ajax.reload();
                                },
                                error: function (xhr, status, error, response) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Ada yang salah, gagal menghapus data!'
                                    });
                                }
                            });
                        }
                    });
                });


            </script>

            @endsection
