@extends('admin.dashboard')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex justify-content-between align-items-center  mb-4">
                        <h4 class="header-title">Instructors</h4>
                        <button type="button" class="btn btn-dark waves-effect waves-light text"
                                data-bs-target="#add"
                                data-bs-toggle="modal">
                            Add Instructor
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
                                            Instructor Name
                                        </th>

                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="key-datatable"
                                            rowspan="1" colspan="1" style="width: 188.4px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            Phone
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="key-datatable" rowspan="1"
                                            colspan="1" style="width: 281.4px;"
                                            aria-label="Position: activate to sort column ascending">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($instructors as $instructor)
                                        <tr class="even">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $instructor->name }}</td>
                                            <td>{{ $instructor->phone }}</td>
                                            <td>
                                                <div class="button-list">

                                                    <button type="button" class="btn btn-info waves-effect waves-light"
                                                            data-bs-target="#edit_{{ $instructor->id }}"
                                                            data-bs-toggle="modal"

                                                    >
                                                        Edit
                                                    </button>

                                                    <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-bs-target="#delete_{{ $instructor->id }}"
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

    @include('admin.inclouds.instructors_modals')

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

    <!-- Datatables init -->
    <script src="{{ asset('admin/assets/js/pages/datatables.init.js')}}"></script>
@endsection
