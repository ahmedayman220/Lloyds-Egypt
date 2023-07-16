@extends('admin.dashboard')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Setting</h4>

                    <form action="{{ route('setting.update') }}" method="post" class="parsley-examples"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Address</label>
                            <input type="text" name="address" value="{{ old('address', $setting->address) }}"
                                   parsley-trigger="change" required="" placeholder="address" class="form-control"
                                   id="address">
                        </div>

                        @error('address')
                        <p class="danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                                   parsley-trigger="change" required="" placeholder="email" class="form-control"
                                   id="email">
                        </div>

                        @error('email')
                        <p class="danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
                                   parsley-trigger="change" required="" placeholder="phone" class="form-control"
                                   id="phone">
                        </div>

                        @error('phone')
                        <p class="danger">{{ $message }}</p>
                        @enderror


                        <div class="mb-3">
                            <label for="facebook_link" class="form-label">Facebook Link</label>
                            <input type="text" name="facebook_link" value="{{ old('facebook_link', $setting->facebook_link) }}"
                                   parsley-trigger="change" required="" placeholder="Facebook Link" class="form-control"
                                   id="facebook_link">
                        </div>

                        @error('facebook_link')
                        <p class="danger">{{ $message }}</p>
                        @enderror


                        <div class="mb-3">
                            <label for="twitter_link" class="form-label">Twitter Link</label>
                            <input type="text" name="twitter_link" value="{{ old('twitter_link', $setting->twitter_link) }}"
                                   parsley-trigger="change" required="" placeholder="twitter link" class="form-control"
                                   id="twitter_link">
                        </div>

                        @error('twitter_link')
                        <p class="danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="whatsapp_link" class="form-label">Whatsapp Link</label>
                            <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link', $setting->whatsapp_link) }}"
                                   parsley-trigger="change" required="" placeholder="Whatsapp Link" class="form-control"
                                   id="whatsapp_link">
                        </div>

                        @error('whatsapp_link')
                        <p class="danger">{{ $message }}</p>
                        @enderror


                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Choose Image</label>
                            <input class="form-control" type="file" name="app_favicon" id="formFileMultiple">
                        </div>

                        @error('images')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row mb-5">
                            <div class="col-sm-4">
                                <img src="{{ !empty($setting->app_favicon) ? Storage::url($setting->app_favicon) : Storage::url('setting/logo-sm.png') }}" alt="image" class="img-fluid rounded"
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
