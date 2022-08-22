@extends('admin.template.main')
@section('breadcrumb')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
        {{ $title }}
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>

        <small class="text-muted fs-7 fw-bold my-1 ms-1"> Tambah Data</small>
    </h1>
@endsection

@section('content')
    <div class="card mb-5 mb-xl-10">

        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form" method="post" action="{{ route('user.store') }}"
                enctype="multipart/form-data">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Lengkap</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="name"
                                class="  @error('name') is-invalid @enderror form-control form-control-lg form-control-solid"
                                value="{{ old('name') }}" />
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Alamat Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="email" name="email"
                                class=" @error('email') is-invalid @enderror  form-control form-control-lg form-control-solid"
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-7" data-kt-password-meter="true">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label  fw-bold fs-6 required">Password </label>

                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid  @error('password') is-invalid @enderror" type="password"
                                    placeholder="" name="password" autocomplete="off" />

                                <!--begin::Visibility toggle-->
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>

                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                <!--end::Visibility toggle-->
                            </div>
                            <!--end::Input wrapper-->

                            <!--begin::Highlight meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Highlight meter-->
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--begin::Hint-->
                            <div class="text-muted">
                                Gunakan 6 karakter atau lebih dengan campuran huruf, angka & simbol.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Role</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select class="form-select" name="role" data-control="select2" data-placeholder="Pilih role user">
                                <option></option>
                                <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
                                <option value="operator" {{ old('role')=='operator'?'selected':'' }}>Operator</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
