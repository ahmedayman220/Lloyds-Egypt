{{--  Add  --}}
{{--
1 = body
2 = eye
3 = eyeBall
4 = bgColor
5 = gradientColor1
6 = gradientColor2
7 = gradientType
8 = eyeColor
9 = eyeBallColor
10 = logo
--}}
<div id="add" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add QrCode</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('QrCode.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-body p-4">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="field-1" name="name"
                                       value="{{  old('name') }}">
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Body</label>
                                <select class="form-select" id="example-select" name="body">
                                    <option value="square" @if(old('body') === 'square') selected @endif>Square
                                    </option>
                                    <option value="mosaic" @if(old('body') === 'mosaic') selected @endif>Mosaic
                                    </option>
                                    <option value="dot" @if(old('body') === 'dot') selected @endif>Dot</option>
                                    <option value="circle" @if(old('body') === 'circle') selected @endif>Circle
                                    </option>
                                    <option value="circle-zebra"
                                            @if(old('body') === 'circle-zebra') selected @endif>Circle Zebra
                                    </option>
                                    <option value="circle-zebra-vertical"
                                            @if(old('body') === 'circle-zebra-vertical') selected @endif>Circle
                                        Zebra Vertical
                                    </option>
                                    <option value="circular" @if(old('body') === 'circular') selected @endif>
                                        Circular
                                    </option>
                                    <option value="edge-cut" @if(old('body') === 'edge-cut') selected @endif>Edge
                                        Cut
                                    </option>
                                    <option value="edge-cut-smooth"
                                            @if(old('body') === 'edge-cut-smooth') selected @endif>Edge Cut Smooth
                                    </option>
                                    <option value="japanese" @if(old('body') === 'japanese') selected @endif>
                                        Japanese
                                    </option>
                                    <option value="leaf" @if(old('body') === 'leaf') selected @endif>Leaf</option>
                                    <option value="pointed" @if(old('body') === 'pointed') selected @endif>Pointed
                                    </option>
                                    <option value="pointed-edge-cut"
                                            @if(old('body') === 'pointed-edge-cut') selected @endif>Pointed Edge Cut
                                    </option>
                                    <option value="pointed-in" @if(old('body') === 'pointed-in') selected @endif>
                                        Pointed In
                                    </option>
                                    <option value="pointed-in-smooth"
                                            @if(old('body') === 'pointed-in-smooth') selected @endif>Pointed In
                                        Smooth
                                    </option>
                                    <option value="pointed-smooth"
                                            @if(old('body') === 'pointed-smooth') selected @endif>Pointed Smooth
                                    </option>
                                    <option value="round" @if(old('body') === 'round') selected @endif>Round
                                    </option>
                                    <option value="rounded-in" @if(old('body') === 'rounded-in') selected @endif>
                                        Rounded In
                                    </option>
                                    <option value="rounded-in-smooth"
                                            @if(old('body') === 'rounded-in-smooth') selected @endif>Rounded In
                                        Smooth
                                    </option>
                                    <option value="rounded-pointed"
                                            @if(old('body') === 'rounded-pointed') selected @endif>Rounded Pointed
                                    </option>
                                    <option value="star" @if(old('body') === 'star') selected @endif>Star</option>
                                    <option value="diamond" @if(old('body') === 'diamond') selected @endif>Diamond
                                    </option>
                                </select>
                            </div>
                            @error('body')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Eye</label>
                                <select class="form-select" id="example-select" name="eye">
                                    @for ($i = 0; $i <= 16; $i++)
                                        @if ($i != 9 && $i != 15)
                                            <!-- Skipping frame9 and frame15 -->
                                            <option value="frame{{ $i }}"
                                                    @if (old('eye') == 'frame'.$i) selected @endif>
                                                frame{{ $i }}</option>

                                        @endif
                                    @endfor
                                </select>
                            </div>
                            @error('eye')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Eye Ball</label>
                                <select class="form-select" id="example-select" name="eyeBall">
                                    @for ($i = 0; $i <= 19; $i++)
                                        @if ($i != 4 && $i != 9)
                                            <!-- Skipping ball4 and ball9 -->
                                            <option value="ball{{ $i }}"
                                                    @if (old('ball') == 'ball'.$i) selected @endif>
                                                ball{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            @error('eyeBall')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Background Color</label>
                                <input type="text" class="form-control" id="field-1" name="bgColor"
                                       value="{{  old('bgColor') }}">

                            </div>
                            @error('bgColor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Gradient Color 1</label>
                                <input type="text" class="form-control" id="field-1" name="gradientColor1"
                                       value="{{  old('gradientColor1') }}">

                            </div>
                            @error('gradientColor1')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Gradient Color 2</label>
                                <input type="text" class="form-control" id="field-1" name="gradientColor2"
                                       value="{{  old('gradientColor2') }}">

                            </div>
                            @error('gradientColor2')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Gradient Type</label>
                                <select class="form-select" id="example-select" name="gradientType">
                                    <option value="linear" @if (old('gradientType') == 'linear') selected @endif>
                                        linear
                                    </option>

                                    <option value="radial" @if (old('gradientType') == 'radial') selected @endif>
                                        radial
                                    </option>
                                </select>

                            </div>
                            @error('gradientType')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Eye Color</label>
                                <input type="text" class="form-control" id="field-1" name="eyeColor"
                                       value="{{  old('eyeColor') }}">

                            </div>
                            @error('eyeColor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Eye Ball Color</label>
                                <input type="text" class="form-control" id="field-1" name="eyeBallColor"
                                       value="{{  old('eyeBallColor') }}">

                            </div>
                            @error('eyeBallColor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" name="image" value="{{ old('image') }}">
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


@forelse($qrCodes as $qrCode)

    {{--      Delete  --}}
    <div id="delete_{{ $qrCode->id }}" class="modal fade" tabindex="-1" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-wrong h1 text-white"></i>
                        <h4 class="mt-2 text-white">Oh snap!</h4>
                        <p class="mt-3 text-white">Are you sure you want to delete this Item</p>
                        <form action="{{ route('QrCode.destroy' , ['id'=> $qrCode->id]) }}"
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


