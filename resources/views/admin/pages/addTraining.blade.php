@extends('admin.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Training</h4>
            </div>
        </div>
    </div>
    {{--  Add  --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('addTraining.store') }}" method="post" >
                        @csrf()
                        @method('POST')
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Tarining Name</label>
                            <input type="text" id="simpleinput" class="form-control" name="name"
                                   value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <p class="danger"> {{ $message }} </p>
                        @enderror

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Tarining PLace</label>
                            <input type="text" id="simpleinput" class="form-control" name="training_place"
                                   value="{{ old('training_place') }}">
                        </div>
                        @error('training_place')
                        <p class="danger"> {{ $message }} </p>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Date &amp; Time</label>
                            <input type="text" id="datetime-datepicker" class="form-control flatpickr-input active"
                                   placeholder="Date and Time" readonly="readonly" name="start_date"
                                   value="{{ old('start_date') }}">
                        </div>
                        @error('start_date')
                        <p class="danger"> {{ $message }} </p>
                        @enderror
                        <div class="mb-3">
                            <label for="example-number" class="form-label">Number Of Years</label>
                            <input class="form-control" id="example-number" type="number"
                                   name="number_of_years" value="{{ old('number_of_years') }}">
                        </div>
                        @error('number_of_years')
                        <p class="danger"> {{ $message }} </p>
                        @enderror

                        <div class="mb-3">
                            <label for="example-number" class="form-label">Number Of Student</label>
                            <input class="form-control" id="example-number" type="number" name="number_of_student"
                                   value="{{ old('number_of_student') }}">
                        </div>
                        @error('number_of_student')
                        <p class="danger"> {{ $message }} </p>
                        @enderror
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Course</label>
                            <select class="form-select" id="example-select" name="course_id"
                                    value="{{ old('course_id') }}">
                                @forelse($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('course_id')
                        <p class="danger"> {{ $message }} </p>
                        @enderror
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Instructor</label>
                            <select class="form-select" id="example-select" name="instructor_id"
                                    value="{{ old('instructor_id') }}">
                                @forelse($instructors as $instructor)
                                    <option value="{{ $instructor->id }}" > {{ $instructor->name }}</option>
                                @empty
                                    <option>No Found</option>

                                @endforelse
                            </select>
                        </div>
                        @error('instructor_id')
                        <p class="danger"> {{ $message }} </p>
                        @enderror
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Company</label>
                            <select class="form-select" id="example-select" name="company_id"
                                    value="{{ old('company_id') }}">
                                @forelse($companies as $company)
                                    <option value="{{ $company->id }}" >{{ $company->name }}</option>
                                @empty
                                    <option>No Found</option>

                                @endforelse
                            </select>
                        </div>
                        @error('company_id')
                        <p class="danger"> {{ $message }} </p>
                        @enderror
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Qr Code</label>
                            <select class="form-select" id="example-select" name="QrCode_id"
                                    value="{{ old('QrCode_id') }}">
                                @forelse($qrCodes as $qrCode)
                                    <option value="{{ $qrCode->id }}" >{{ $qrCode->name }}</option>
                                @empty
                                    <option>No Found</option>
                                @endforelse
                            </select>
                        </div>
                        @error('QrCode_id')
                        <p class="danger"> {{ $message }} </p>
                        @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Add</button>
                    </div>

                    </form>
                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- end card-body -->
    </div>
@endsection

@section('additional_style')
    <link href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('additanial_script')
    <script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ asset('admin/assets/js/pages/form-pickers.init.js') }}"></script>

@endsection
