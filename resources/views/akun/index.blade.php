@extends('layouts.admin.main')
@section('body')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-account-settings-connections.html"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                        >
                    </li> --}}
                </ul>
                <div class="card mb-4">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if ($user->gambar)
                            <img
                            src="{{ asset('/storage/images/'.$user->gambar) }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar"
                            />

                            @else
                            <img
                            src="{{ asset('/assets/admin_template/img/avatars/none.png') }}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar"
                            />
                            @endif
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input
                                    type="file"
                                    id="upload"
                                    name="image"
                                    class="account-file-input"
                                    hidden
                                    accept="image/png, image/jpeg"
                                    onchange="previewImage(this)"
                                    />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="resetImage()">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="update_akun" method="POST" action="{{ route('update-akun') }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Nama Depan</label>
                                    <input
                                    class="form-control"
                                    type="text"
                                    id="firstName"
                                    name="firstName"
                                    value="{{ Auth::user()->namadepan }}"
                                    autofocus
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Nama belakang</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{ Auth::user()->namabelakang }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input
                                    class="form-control"
                                    type="text"
                                    id="email"
                                    name="email"
                                    value="{{ Auth::user()->email }}"
                                    placeholder="{{ Auth::user()->email }}"
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="nohp">Nomor Handphone</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">ID (+62)</span>
                                        <input
                                        type="text"
                                        id="nohp"
                                        name="nohp"
                                        class="form-control"
                                        placeholder="{{ Auth::user()->nohp }}"
                                        value="{{ Auth::user()->nohp }}"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" value="{{ Auth::user()->alamat }}">{{ Auth::user()->alamat }}"</textarea>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input
                                    class="form-control"
                                    type="text"
                                    id="kota"
                                    name="kota"
                                    value="{{ Auth::user()->kota }}"
                                    placeholder="{{ Auth::user()->kota }}"
                                    />
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


</div>
<script>

</script>
<!-- Content wrapper -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function previewImage(input) {
        var uploadedAvatar = document.getElementById('uploadedAvatar');
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                uploadedAvatar.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function resetImage() {
        var uploadedAvatar = document.getElementById('uploadedAvatar');
        uploadedAvatar.src = "{{ asset('/assets/admin_template/img/avatars/none.png') }}";
        var input = document.getElementById('upload');
        input.value = ''; // Clear the file input
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Dapatkan token CSRF dari tag <meta>
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#upload').change(function() {
            var formData = new FormData();
            formData.append('image', this.files[0]);

            // Dapatkan URL dari atribut data-url


            // Kirim token CSRF dalam header permintaan
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: '{{ route('upload-foto') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire(
                    'Berhasil!',
                    response.success,
                    'success'
                    )
                },
                error: function(error) {
                    console.log();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error.responseJSON.errors.image,
                    })
                }
            });

        });
    });
</script>


@endsection
