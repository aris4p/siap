@extends('layouts.admin.main')
@section('body')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ $title }}</h4>
            
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Data Supplier</h5>
                <div class="px-2 mb-4">
                    <button class="btn btn-primary btn-lg" id="tambahsupplier"  aria-pressed="true">Tambah Data Supplier</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table table-striped nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Contact</th>
                                <th>Alamat</th>
                                <th>kota</th>
                                <th>Provinsi</th>
                                <th>Kode Pos</th>
                                <th>Negara</th>
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
                                <h5 class="modal-title" id="backDropModalTitle">Tambah Supllier</h5>
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
                                        
                                        <label for="kodesupplier" class="form-label">Kode Supplier</label>
                                        <input
                                        type="text"
                                        id="kodesupplier"
                                        name="kodesupplier"
                                        class="form-control"
                                        placeholder="Kode Supplier"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="namasupplier" class="form-label">Nama Supplier</label>
                                        <input
                                        type="text"
                                        id="namasupplier"
                                        name="namasupplier"
                                        class="form-control"
                                        placeholder="Nama Supplier"
                                        />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="jenisobat" class="form-label">Contact Supplier</label>
                                        <input
                                        type="text"
                                        id="nosupplier"
                                        name="nosupplier"
                                        class="form-control"
                                        placeholder="Contact Supplier"
                                        />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6 mb-0">
                                        <label for="dosisobat" class="form-label">Alamat Supplier</label>
                                        <textarea id="alamatsupplier"name="alamatsupplier" class="form-control" placeholder="Alamat Supplier"></textarea>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="deskripsiobat" class="form-label">Kota</label>
                                        <input
                                        type="text"
                                        id="kota"
                                        name="kota"
                                        class="form-control"
                                        placeholder="kota"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="satuandosisobat" class="form-label">Provinsi</label>
                                        <input
                                        type="text"
                                        id="provinsi"
                                        name="provinsi"
                                        class="form-control"
                                        placeholder="Provinsi"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="hargajualobat" class="form-label">Kode Pos</label>
                                        <input
                                        type="text"
                                        id="kodepos"
                                        name="kodepos"
                                        class="form-control"
                                        placeholder="Kode Pos"
                                        />
                                    </div>
                                    
                                    <div class="col-6 mb-0">
                                        <label for="hargabeliobat" class="form-label">Negara</label>
                                        <input
                                        type="text"
                                        id="negara"
                                        name="negara"
                                        class="form-control"
                                        placeholder="Negara"
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
                                <h5 class="modal-title" id="backDropModalTitle">Ubah Supplier</h5>
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
                                        <label for="kodesupplier" class="form-label">Kode Supplier</label>
                                        <input
                                        type="text"
                                        id="updatekodesupplier"
                                        name="updatekodesupplier"
                                        class="form-control"
                                        placeholder="Kode Supplier"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="namasupplier" class="form-label">Nama Supplier</label>
                                        <input
                                        type="text"
                                        id="updatenamasupplier"
                                        name="updatenamasupplier"
                                        class="form-control"
                                        placeholder="Nama Supplier"
                                        />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="jenisobat" class="form-label">Contact Supplier</label>
                                        <input
                                        type="text"
                                        id="updatenosupplier"
                                        name="updatenosupplier"
                                        class="form-control"
                                        placeholder="Contact Supplier"
                                        />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6 mb-0">
                                        <label for="alamatsupplier" class="form-label">Alamat Supplier</label>
                                        <textarea id="updatealamatsupplier" name="updatealamatsupplier" class="form-control" placeholder="Alamat Supplier"></textarea>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="deskripsiobat" class="form-label">Kota</label>
                                        <input
                                        type="text"
                                        id="updatekota"
                                        name="updatekota"
                                        class="form-control"
                                        placeholder="kota"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="satuandosisobat" class="form-label">Provinsi</label>
                                        <input
                                        type="text"
                                        id="updateprovinsi"
                                        name="updateprovinsi"
                                        class="form-control"
                                        placeholder="Provinsi"
                                        />
                                    </div>
                                    <div class="col-6 mb-0">
                                        <label for="hargajualobat" class="form-label">Kode Pos</label>
                                        <input
                                        type="text"
                                        id="updatekodepos"
                                        name="updatekodepos"
                                        class="form-control"
                                        placeholder="Kode Pos"
                                        />
                                    </div>
                                    
                                    <div class="col-6 mb-0">
                                        <label for="hargabeliobat" class="form-label">Negara</label>
                                        <input
                                        type="text"
                                        id="updatenegara"
                                        name="updatenegara"
                                        class="form-control"
                                        placeholder="Negara"
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
    
    
</div>
<!-- Content wrapper -->

<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" ></script>
<script src="//cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" ></script>
<script src="//cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js" ></script>
<script src="//cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let datatable
    $(document).ready(function(){
        
        datatable =  $('#myTable').DataTable({
            processing:true,
            serverside:true,
            responsive:true,
            ajax:"{{ route('data-supplier') }}",
            columns:[
            { data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data:'kodesupplier', name: 'kodesupplier' },
            { data:'namasupplier', name: 'namasupplier' },
            { data:'nosupplier', name: 'nosupplier' },
            { data:'alamatsupplier', name: 'alamatsupplier' },
            { data:'kota', name: 'kota' },
            { data:'provinsi', name: 'provinsi' },
            { data:'kodepos', name: 'kodepos' },
            { data:'negara', name: 'negara' },
            { data:'aksi', name: 'aksi', orderable: false, searchable: false}
            ]
        });
        
        $(document).on('click', '#tambahsupplier', function () {
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
            var kodesupplier = $("#kodesupplier").val();
            var namasupplier = $("#namasupplier").val();
            var nosupplier = $("#nosupplier").val();
            var alamatsupplier = $("#alamatsupplier").val();
            var kota = $("#kota").val();
            var provinsi = $("#provinsi").val();
            var kodepos = $("#kodepos").val();
            var negara = $("#negara").val();
            
            
            // Buat objek FormData untuk mengirim data termasuk file
            var formData = new FormData();
            formData.append("kodesupplier", kodesupplier);
            formData.append("namasupplier", namasupplier);
            formData.append("nosupplier", nosupplier);
            formData.append("alamatsupplier", alamatsupplier);
            formData.append("kota", kota);
            formData.append("provinsi", provinsi);
            formData.append("kodepos", kodepos);
            formData.append("negara", negara);
            
            // Kirim data ke server menggunakan AJAX
            $.ajax({
                type: "POST",
                url: "{{ route('create-supplier') }}", // Gantilah URL server sesuai dengan kebutuhan Anda
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
            // Kirim permintaan AJAX untuk mengambil data sesuai ID dan isi formulir
            $.ajax({
                url: "{{url('getsupplier') }}"+"/"+id, // Gantilah dengan URL yang sesuai
                type: 'GET',
                success: function (response) {
                    // Isi formulir dengan data yang diambil dari server
                    $('#id').val(id);
                    $('#updatekodesupplier').val(response.kodesupplier);
                    $('#updatenamasupplier').val(response.namasupplier);
                    $('#updatenosupplier').val(response.nosupplier);
                    $('#updatealamatsupplier').val(response.alamatsupplier);
                    $('#updatekota').val(response.kota);
                    $('#updateprovinsi').val(response.provinsi);
                    $('#updatekodepos').val(response.kodepos);
                    $('#updatenegara').val(response.negara);
                    
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
            formData.append('kodesupplier', $('#editModal input[name="updatekodesupplier"]').val());
            formData.append('namasupplier', $('#editModal input[name="updatenamasupplier"]').val());
            formData.append('nosupplier', $('#editModal input[name="updatenosupplier"]').val());
            formData.append('alamatsupplier', $('#editModal textarea[name="updatealamatsupplier"]').val());
            formData.append('kota', $('#editModal input[name="updatekota"]').val());
            formData.append('provinsi', $('#editModal input[name="updateprovinsi"]').val());
            formData.append('kodepos', $('#editModal input[name="updatekodepos"]').val());
            formData.append('negara', $('#editModal input[name="updatenegara"]').val());
            
            $.ajax({
                url: '{{ route('update-supplier') }}',
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
                                url: "{{ route('delete-supplier') }}", // Gantilah dengan URL yang sesuai
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
        
        
    });
</script>
@endsection