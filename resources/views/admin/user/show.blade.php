<div class="modal fade" tabindex="-1" id="modalDetail-{{ $loop->index }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pengguna</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3"
                                d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z"
                                fill="black" />
                            <path
                                d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z"
                                fill="black" />
                        </svg></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Nama Lengkap</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 col-form-label fw-bold fs-6">
                        : {{ $user->name }}
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Email</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 col-form-label fw-bold fs-6">
                        : {{ $user->email }}
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Role</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 col-form-label fw-bold fs-6">
                        : {{ $user->role }}
                    </div>
                    <!--end::Col-->
                </div>
            </div>

        </div>
    </div>
</div>
