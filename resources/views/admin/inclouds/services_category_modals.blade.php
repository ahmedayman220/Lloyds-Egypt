{{--  Add  --}}
<div id="add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Service Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('service_category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-body p-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="field-1" name="name"
                                       value="{{  old('name') }}">
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <label for="field-7" class="form-label">Description</label>
                                <textarea class="form-control" id="field-7"
                                          name="description"
                                          style="height: 176px;">
                                            {{ old('description') }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


@forelse($services_category as $key => $service_category)

    {{--  Show Details  --}}
    <div id="details_{{ $service_category->id }}" class="modal fade" tabindex="-1" style="display: none;"
         aria-modal="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="col-12">
                    <img
                        src="{{ !empty($service_category->image) ? Storage::url($service_category->image) : Storage::url('service_category/page-title-bg.jpg') }}"
                        alt="image" class="img-fluid img-thumbnail" width="200">
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4 class="mt-0">{{ $service_category->name }}</h4>
                        <p>{{$service_category->description}}</p>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    {{--  Edit  --}}
    <div id="edit_{{ $service_category->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('service_category.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body p-4">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control d-none" id="field-1" name="id"
                                           value="{{  old('id' ,$service_category->id) }}">
                                </div>
                            </div>
                        </div>
                        @error('id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-1" class="form-label">{{ $service_category->name }}</label>
                                    <input type="text" class="form-control" id="field-1" name="name"
                                           value="{{  old('name' ,$service_category->name) }}">
                                </div>
                            </div>
                        </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <label for="field-7" class="form-label">Description</label>
                                    <textarea class="form-control" id="field-7"
                                              name="description"
                                              style="height: 176px;">
                                    {{ old('description' , $service_category->description) }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Choose Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                        </div>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row">
                            <div class="col-sm-4">
                                <img
                                    src="{{ !empty($service_category->image) ?  Storage::url($service_category->image) : Storage::url('service_category/about-image.jpg') }}"
                                    alt="image" class="img-fluid rounded"
                                    width="200">
                            </div>
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--  Delete  --}}
    <div id="delete_{{ $service_category->id }}" class="modal fade" tabindex="-1" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-wrong h1 text-white"></i>
                        <h4 class="mt-2 text-white">Oh snap!</h4>
                        <p class="mt-3 text-white">Are you sure you want to delete this category</p>
                        <form action="{{ route('service_category.destroy' , ['id'=> $service_category->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light my-2" data-bs-dismiss="modal">Delete</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@empty
@endforelse


