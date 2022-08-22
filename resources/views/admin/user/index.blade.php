@extends('admin.template.main')

@section('breadcrumb')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
    {{$title}}
    {{-- <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

    <small class="text-muted fs-7 fw-bold my-1 ms-1"> home</small> --}}
</h1>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}">
@endpush

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Data {{$title}}</span>
        </h3>
        @if (auth()->user()->role == 'admin')
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="klik untuk menambah profile">
                <a href="{{ route('user.create') }}" class="btn btn-light-primary">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                        </svg>
                    </span>
                    Tambah data</a>
            </div>
        @endif
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table id="newsTable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th>No</th>
                        <th width="30%">Nama Lengkap</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>

                    @foreach ($users as $key=> $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail-{{ $key }}">
                                Detail
                            </button>
                            @if (auth()->user()->role == 'admin' && $user->role == 'operator')
                                <a href="{{ route('user.edit',['user'=>$user]) }}" class=" btn btn-light-success btn-sm">Ubah</a>
                            @endif
                            @if (auth()->user()->id != $user->id && auth()->user()->role == 'admin' && $user->role == 'operator')
                                <form  method="post" class="d-inline" onsubmit="btnDelete('user',{{ $user->id }})">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-light-danger btn-sm" >Hapus</button>
                                </form>
                            @endif
                            
                        </td>
                    </tr>
                    @include('admin.user.show')

                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $('#newsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
            "lengthMenu": "Show _MENU_",
            },
            "dom":
            "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });

    </script>
    @endpush