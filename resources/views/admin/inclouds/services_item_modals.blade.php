{{--  Add --}}
<div id="add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Service Item</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('service_item.store') }}" method="post" enctype="multipart/form-data">
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
                                          style="height: 176px;">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="row mt-3 mb-3">
                        <div class="col-md-12">
                            <select class="form-select" id="floatingSelect" aria-label="Category Name" name="category_id">
                                <option selected="">Open this select menu</option>
                                @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    Not Found
                                @endforelse

                            </select>
                        </div>
                    </div>


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


@forelse($services_items as $key => $service_item)

    {{--  Show Details  --}}
    <div id="details_{{ $service_item->id }}" class="modal fade" tabindex="-1" style="display: none;"
         aria-modal="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="col-12">
                    <img
                        src="{{ !empty($service_item->image) ? Storage::url($service_item->image) : Storage::url('service_items/page-title-bg.jpg') }}"
                        alt="image" class="img-fluid img-thumbnail" width="200">
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4 class="mt-0">{{ $service_item->name }}</h4>
                        <p>{{$service_item->description}}</p>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    {{--  Edit  --}}
    <div id="edit_{{ $service_item->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('service_item.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body p-4">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control d-none" id="field-1" name="id"
                                           value="{{  old('id' ,$service_item->id) }}">
                                </div>
                            </div>
                        </div>
                        @error('id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-1" class="form-label">{{ $service_item->name }}</label>
                                    <input type="text" class="form-control" id="field-1" name="name"
                                           value="{{  old('name' ,$service_item->name) }}">
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
                                              style="height: 176px;">{{ old('description' , $service_item->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row mt-3 mb-3">
                            <div class="col-md-12">
                                <select class="form-select" id="floatingSelect" aria-label="Category Name" name="category_id">
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}"
                                        @if($category->id == $service_item->serviceCategory->id) selected="" @endif
                                        >{{ $category->name }}</option>
                                    @empty
                                        Not Found
                                    @endforelse

                                </select>
                            </div>
                        </div>


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
                                    src="{{ !empty($service_item->image) ?  Storage::url($service_item->image) : Storage::url('service_item/about-image.jpg') }}"
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
    <div id="delete_{{ $service_item->id }}" class="modal fade" tabindex="-1" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-wrong h1 text-white"></i>
                        <h4 class="mt-2 text-white">Oh snap!</h4>
                        <p class="mt-3 text-white">Are you sure you want to delete this Item</p>
                        <form action="{{ route('service_item.destroy' , ['id'=> $service_item->id]) }}"
                              method="POST">
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


