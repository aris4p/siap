@extends('layouts.admin.main')
@section('body')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Role Tables</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Role Table</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Role</th>
                <th>Users</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                 $i = 0;
                 $i++;   
                @endphp
                @foreach ($users as $user)
                    
                <tr>
                    <td>{{ $i++}}</td>
                    <td>{{ $user->roles[0]->name}}</td>
                    <td>{{ $user->namadepan }}
                  {{-- <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xs pull-up"
                      title="Lilian Fuller"
                      >
                      <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" /> --}}
                    </li>
                  </ul>
                </td>
                <td>
                <a class="btn btn-primary" href="{{ route('role-pengguna', ['id' => $user->id])}}"><i class="bx bx-edit-alt me-1"></i> Setting Role </a>
                </td>
            </tr>
            @endforeach
                

            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

      <hr class="my-5" />

  </div>
  <!-- Content wrapper -->
@endsection