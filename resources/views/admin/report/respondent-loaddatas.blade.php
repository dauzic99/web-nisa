<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Data Responden</span>
        </h3>
        @if (count($respondents) != 0)
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="klik untuk menambah unsur pelayanan">
                <a href="{{ route('report.response.all-print',['year'=>$reqYear,'startmonth'=>$reqStartMonth,'endmonth'=>$reqEndMonth,]) }}" target="__blank" class="btn btn-light-primary">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14V4H6V20H18V8H20V21C20 21.6 19.6 22 19 22Z" fill="currentColor"/>
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
                        </svg>
                    </span>
                    Cetak Semua</a>
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
                        <th width="30%">Fraksi</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($respondents as $respondent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $respondent->fraction }}</td>
                            <td>{{ $respondent->gender }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-light-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDetail-{{ $loop->index }}">
                                    Detail
                                </button>
                                @if (auth()->user()->role == 'admin')
                                    <form method="post" class="d-inline"
                                        onsubmit="btnDelete('respondent',{{ $respondent->id }})">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-light-danger btn-sm">Hapus</button>
                                    </form>
                                @endif
                                <a href="{{ route('report.response', ['respondent' => $respondent]) }}"
                                    class=" btn btn-light-success btn-sm">Jawaban</a>
                                <a href="{{ route('report.response.print', ['respondent' => $respondent]) }}"
                                    class=" btn btn-light-primary btn-sm" target="__blank">Cetak</a>
                            </td>
                        </tr>
                        @include('admin.report.respondent-detail')
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
</div>



<script>
    $('#newsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
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
