@extends('admin.dashboard')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">About Us</h4>

                    <form action="{{ route('about.update') }}" method="post" class="parsley-examples"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="title" class="form-label">About Us Title<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $about->title) }}"
                                   parsley-trigger="change" required="" placeholder="Title" class="form-control"
                                   id="title">
                        </div>

                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="short Title" class="form-label">Short Title<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="short_title" value="{{ old('short_title', $about->short_title) }}"
                                   parsley-trigger="change" required="" placeholder="short Title" class="form-control"
                                   id="short_title">
                        </div>

                        @error('short_title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="description" class="form-label">Description<span
                                    class="text-danger">*</span></label>
                            <textarea name="description" id="textarea"
                                      class="form-control" maxlength="225" rows="3">
                                {{ old('description', $about->description) }}
                            </textarea>
                        </div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Choose Image</label>
                            <input class="form-control" type="file" name="image" id="formFileMultiple">
                        </div>

                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row mb-5">
                            <div class="col-sm-4">
                                <img src="{{ !empty($about->image) ?  Storage::url($about->image) : Storage::url('about/about-image.jpg') }}" alt="image" class="img-fluid rounded"
                                     width="200">
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
