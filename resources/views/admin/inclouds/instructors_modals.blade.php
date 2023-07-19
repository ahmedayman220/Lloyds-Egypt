{{--  Add  --}}
<div id="add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Company</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('instructors.store') }}" method="post">
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
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="field-1" name="phone"
                                       value="{{  old('phone') }}">
                            </div>
                        </div>
                    </div>
                    @error('name')
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


@forelse($instructors as $instructor)

    {{--  Edit  --}}
    <div id="edit_{{ $instructor->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('instructors.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body p-4">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control d-none" id="field-1" name="id"
                                           value="{{  old('id' ,$instructor->id) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="field-1" name="name"
                                           value="{{  old('name' ,$instructor->name) }}">
                                </div>
                            </div>
                        </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-1" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="field-1" name="phone"
                                           value="{{  old('phone' ,$instructor->name) }}">
                                </div>
                            </div>
                        </div>
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

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
    <div id="delete_{{ $instructor->id }}" class="modal fade" tabindex="-1" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-wrong h1 text-white"></i>
                        <h4 class="mt-2 text-white">Oh snap!</h4>
                        <p class="mt-3 text-white">Are you sure you want to delete this Item</p>
                        <form action="{{ route('instructors.destroy' , ['id'=> $instructor->id]) }}"
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


