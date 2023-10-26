@extends('layouts.admin.main')
@section('body')
<div class="content-wrapper">
  <!-- Content -->
  
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengguna /</span> Role</h4>
    
    <div class="card">
      <!-- Notifications -->
      <h5 class="card-header">Atur Role dan Permission</h5>
      <div class="card-body">
        <span>Halaman ini digunakan untuk mengatur role dan permission akun <span style="font-size: 15pt">{{ $user->namadepan }}</span>.
        <div class="error"></div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-borderless border-bottom">
          <thead>
            <tr>
              <th class="text-nowrap">Atur</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap">Role</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input type="hidden" id="userID"  value="{{ $user->id }}">
                  <select id="roles" class="form-select" name="roles">
                    <option selected="">Tidak Ada Role</option>
                    <option value="admin">Admin</option>
                    <option value="apoteker">Apoteker</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <button id="ubahRoles" class="btn btn-primary"> Ubah Role </button>
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <button id="hapusRoles" class="btn btn-primary"> Hapus Role </button>
                </div>
              </td>
              
            </tr>
            <tr>
              <td></td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  Create
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  Read
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  Update
                </div>
              </td>
              <td><div class="form-check d-flex justify-content-center">
                Delete
              </div></td>
            </tr>
            <tr>
              <td class="text-nowrap">Permission</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" id="tambah-obat" data-user-id="{{ $user->id }}" value="tambah-obat">
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" id="lihat-obat" data-user-id="{{ $user->id }}" value="lihat-obat" >
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" id="edit-obat" data-user-id="{{ $user->id }}" value="edit-obat" >
                </div>
              </td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" id="hapus-obat" data-user-id="{{ $user->id }}" value="hapus-obat" >
                </div>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
      {{-- <div class="card-body">
        <h6>When should we send you notifications?</h6>
        <form action="javascript:void(0);">
          <div class="row">
            <div class="col-sm-6">
              <select id="sendNotification" class="form-select" name="sendNotification">
                <option selected="">Only when I'm online</option>
                <option>Anytime</option>
              </select>
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Discard</button>
            </div>
          </div>
        </form>
      </div> --}}
      <!-- /Notifications -->
    </div>
    
    <hr class="my-5" />
    
  </div>
  <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
    $(document).ready(function() {
      // init csrf TOken
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': csrfToken
        }
      });
      
      // Roles
      
      // value user roles
      // Mendapatkan nilai peran dari variabel PHP (misalnya, dari PHP blade)
      var userRole = "{{ isset($user->roles[0]) ? $user->roles[0]->name : '' }}";
      console.log(userRole);
      // Mendapatkan elemen select berdasarkan ID
      var selectElement = document.getElementById("roles");
      console.log(selectElement);
      
      // Iterasi melalui opsi dalam elemen select
      for (var i = 0; i < selectElement.options.length; i++) {
        // Memeriksa apakah nilai opsi sama dengan nilai peran pengguna
        if (selectElement.options[i].value === userRole) {
          // Mengatur opsi sebagai yang terpilih
          selectElement.options[i].selected = true;
        }
      }
      
      
      // change roles
      $('#ubahRoles').on('click', function(){
        let role = document.getElementById('roles').value;
        let userid = document.getElementById('userID').value;
        
        console.log(role);
        
        // Kirim permintaan Ajax untuk mengubah role di server
        $.ajax({
          type: 'POST', // Anda dapat menggunakan 'GET' atau 'POST' sesuai kebutuhan
          url: "{{ route('roles-pengguna') }}", // Gantilah ini dengan rute Anda
          data: {
            user_id: userid,
            roles: role,
          },
          success: function(response) {
            Toastify({
              
              text: response.message,
              
              duration: 3000
              
            }).showToast();
            
          },
          error: function(error) {
            console.error('Terjadi kesalahan: ' + error);
          }
        });
      });
      // hapus roles
      $('#hapusRoles').on('click', function(){
        let role = document.getElementById('roles').value;
        let userid = document.getElementById('userID').value;
        
        console.log(role);
        
        // Kirim permintaan Ajax untuk mengubah role di server
        $.ajax({
          type: 'POST', // Anda dapat menggunakan 'GET' atau 'POST' sesuai kebutuhan
          url: "{{ route('hapusRole-pengguna') }}", // Gantilah ini dengan rute Anda
          data: {
            user_id: userid,
            roles: role,
          },
          success: function(response) {
            Toastify({
              
              text: response.message,
              
              duration: 3000
              
            }).showToast();
            
          },
          error: function(error) {
            console.error('Terjadi kesalahan: ' + error);
          }
        });
      });
      
      
      // Permission
      var permissions = "{{ $permissions }}";
      var checkboxes = document.querySelectorAll('.form-check-input'); // Mendapatkan semua elemen checkbox
      
      checkboxes.forEach(function(checkbox) {
        var permissionValue = checkbox.value;
        
        // Mengecek apakah permissionValue ada dalam array permissions
        if (permissions.includes(permissionValue)) {
          checkbox.checked = true; // Mencentang checkbox jika izin ditemukan dalam array
        }
      });
      
      
      // Ketika checkbox diubah
      $('#tambah-obat').on('change', function() {
        var isChecked = $(this).prop('checked');
        var userId = $(this).data('user-id');
        var tambahobat = $(this).val();
        console.log(typeof isChecked);
        
        // Kirim permintaan Ajax untuk mengubah status di server
        $.ajax({
          type: 'POST', // Anda dapat menggunakan 'GET' atau 'POST' sesuai kebutuhan
          url: "{{ route('permission-pengguna') }}", // Gantilah ini dengan rute Anda
          data: {
            user_id: userId,
            is_checked: isChecked,
            value: tambahobat // Kirim nilai 'tambah-obat' ke controller
          },
          success: function(response) {
            Toastify({
              
              text: response.message,
              
              duration: 3000
              
            }).showToast();
            
          },
          error: function(error) {
            console.error('Terjadi kesalahan: ' + error);
          }
        });
      });
      
      $('#lihat-obat').on('change', function() {
        var isChecked = $(this).prop('checked');
        var userId = $(this).data('user-id');
        var lihatobat = $(this).val();
        
        // Kirim permintaan Ajax untuk mengubah status di server
        $.ajax({
          type: 'POST',
          url: "{{ route('permission-pengguna') }}",
          data: {
            user_id: userId,
            is_checked: isChecked,
            value: lihatobat // Kirim nilai 'lihat-obat' ke controller
          },
          success: function(response) {
            Toastify({
              
              text: response.message,
              
              duration: 3000
              
            }).showToast();
          },
          error: function(error) {
            console.error('Terjadi kesalahan: ' + error);
          }
        });
      });
      $('#edit-obat').on('change', function() {
        var isChecked = $(this).prop('checked');
        var userId = $(this).data('user-id');
        var lihatobat = $(this).val();
        
        // Kirim permintaan Ajax untuk mengubah status di server
        $.ajax({
          type: 'POST',
          url: "{{ route('permission-pengguna') }}",
          data: {
            user_id: userId,
            is_checked: isChecked,
            value: lihatobat // Kirim nilai 'lihat-obat' ke controller
          },
          success: function(response) {
            Toastify({
              
              text: response.message,
              
              duration: 3000
              
            }).showToast();
          },
          error: function(error) {
            console.error('Terjadi kesalahan: ' + error);
          }
        });
      });
      $('#hapus-obat').on('change', function() {
        var isChecked = $(this).prop('checked');
        var userId = $(this).data('user-id');
        var lihatobat = $(this).val();
        
        // Kirim permintaan Ajax untuk mengubah status di server
        $.ajax({
          type: 'POST',
          url: "{{ route('permission-pengguna') }}",
          data: {
            user_id: userId,
            is_checked: isChecked,
            value: lihatobat // Kirim nilai 'lihat-obat' ke controller
          },
          success: function(response) {
            Toastify({
              
              text: response.message,
              
              duration: 3000
              
            }).showToast();
          },
          error: function(error) {
            console.error('Terjadi kesalahan: ' + error);
          }
        });
      });
      
    });
    
  </script>
  
  @endsection