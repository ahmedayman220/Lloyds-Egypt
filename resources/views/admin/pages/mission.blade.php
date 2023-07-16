@extends('admin.dashboard')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Mission</h4>

                    <form action="{{ route('mission.update') }}" method="post" class="parsley-examples"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="title" class="form-label">Mission Title<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $mission->title) }}"
                                   parsley-trigger="change" required="" placeholder="Title" class="form-control"
                                   id="title">
                        </div>

                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror


                        <div class="mb-3">
                            <label for="description" class="form-label">Our Mission Description</label>
                            <textarea name="our_mission_description" id="textarea"
                                      class="form-control" maxlength="225" rows="3">
                                {{ old('our_mission_description', $mission->our_mission_description) }}
                            </textarea>
                        </div>
                        @error('our_mission_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="description" class="form-label">Our Vision Description</label>
                            <textarea name="our_vision_description" id="textarea"
                                      class="form-control" maxlength="225" rows="3">
                                {{ old('our_vision_description', $mission->our_vision_description) }}
                            </textarea>
                        </div>
                        @error('our_vision_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="description" class="form-label">Our Goal Description</label>
                            <textarea name="our_goal_description" id="textarea"
                                      class="form-control" maxlength="225" rows="3">
                                {{ old('our_goal_description', $mission->our_goal_description) }}
                            </textarea>
                        </div>
                        @error('our_goal_description')
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
                                <img src="{{ !empty($mission->image) ?  Storage::url($mission->image) : Storage::url('mission/mission-image.jpg') }}" alt="image" class="img-fluid rounded"
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
