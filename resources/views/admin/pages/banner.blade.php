@extends('admin.dashboard')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Bannars</h4>

                    <form action="{{ route('banner.update') }}" method="post" class="parsley-examples"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="title" class="form-label">Banner Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $banner->title) }}"
                                   parsley-trigger="change" required="" placeholder="Title" class="form-control"
                                   id="title">
                        </div>

                        @error('title')
                        <p class="danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="short Title" class="form-label">Short Title<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="short_title" value="{{ old('short_title', $banner->short_title) }}"
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
                                      class="form-control" maxlength="225" rows="3">{{ old('description', $banner->description) }}</textarea>
                        </div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Choose Image</label>
                            <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                        </div>

                        @error('images')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row mb-5">
                            @forelse($banner->images as $image)
                            <div class="col-sm-4">
                                <img src="{{ Storage::url($image) }}" alt="image" class="img-fluid rounded"
                                     width="200">
                            </div>
                            @empty
                                <div class="col-sm-4">
                                    <h3>Not Found</h3>
                                </div>
                            @endforelse
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
