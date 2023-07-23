@extends('admin.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex justify-content-between align-items-center  mb-4">
                        <h4 class="header-title">Qr code</h4>
                        <button type="button" class="btn btn-dark waves-effect waves-light text"
                                data-bs-target="#add"
                                data-bs-toggle="modal">
                            Add Qr Code
                        </button>
                    </div>

                    <div id="key-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="key-datatable"
                                       class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                       aria-describedby="key-datatable_info" style="position: relative; width: 1173px;">
                                    <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="key-datatable" rowspan="1"
                                            colspan="1" style="width: 140.4px;"
                                            aria-label="Office: activate to sort column ascending">
                                            #
                                        </th>

                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="key-datatable"
                                            rowspan="1" colspan="1" style="width: 188.4px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            Qr Code Image
                                        </th>

                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="key-datatable"
                                            rowspan="1" colspan="1" style="width: 188.4px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            Name
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="key-datatable" rowspan="1"
                                            colspan="1" style="width: 281.4px;"
                                            aria-label="Position: activate to sort column ascending">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($qrCodes as $qrCode)
                                        <tr class="even">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ !empty($qrCode->path) ? Storage::url($qrCode->path) : Storage::url('Qr Code/QrCode.png')}}" alt="image" class="img-fluid avatar-lg rounded">
                                            </td>
                                            <td>{{ $qrCode->name }}</td>
                                            <td>
                                                <div class="button-list">

                                                    <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-bs-target="#delete_{{ $qrCode->id }}"
                                                            data-bs-toggle="modal"
                                                    >
                                                        Delete
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        Not Found
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    @include('admin.inclouds.qrCode_modals')

@endsection

@section('additional_style')
    <!-- third party css -->
    <link href="{{ asset('admin/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <!-- third party css end -->


    <link href="{{ asset('admin/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />


@endsection


@section('additanial_script')
    <!-- third party js -->
    <script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script
        src="{{ asset('admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Plugins js-->
    <script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Init js-->
    <script src="assets/js/pages/form-pickers.init.js"></script>


    <!-- Datatables init -->
    <script src="{{ asset('admin/assets/js/pages/datatables.init.js')}}"></script>
@endsection
