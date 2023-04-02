@extends('admin/layout');
@section('page_title', 'Manage Product')
@section('product_select', 'active')

@if ($id > 0)
    {{ $image_required = '' }}
@else
    {{ $image_required = 'required' }}
@endif


@section('container')
    <h1>Manage Product</h1>

    {{-- {{print_r($data) }} --}}
    <a class="btn btn-primary" href="{{ url('admin/product') }}" role="button">Back</a>

    <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Name</label>
                <input id="cc-pament" name="name" type="text" value="{{ $name }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>

            </div>
            <div class="form-group">
                <label for="image" class="control-label mb-1">Image</label>
                <input id="image" name="image" type="file" value="{{ $image }}" class="form-control"
                    aria-required="true" aria-invalid="false" {{ $image_required }}>
                @error('image')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}

                    </div>
                @enderror

            </div>
            <div>
                <div class="row">
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Category</label>
                            <select name="category_id" id="category_id" type="text" value="{{ $category_id }}"
                                class="form-control" required>
                                <option value="">Select Categories</option>
                                @foreach ($category as $list)
                                    @if ($category_id == $list->id)
                                        <option selected value="{{ $list->id }}">
                                        @else
                                        <option value="{{ $list->id }}">
                                    @endif
                                    {{ $list->category_name }} </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                    </div>
                    <div class="col-lg-4 ">
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Brand</label>
                            <input id="cc-pament" name="brand" type="text" value="{{ $brand }}"
                                class="form-control" aria-required="true" aria-invalid="false" required>

                        </div>

                    </div>
                    <div class="col-lg-4 ">
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Model</label>
                            <input id="cc-pament" name="model" type="text" value="{{ $model }}"
                                class="form-control" aria-required="true" aria-invalid="false" required>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="slug" class="control-label mb-1">Slug</label>
                <input id="slug" name="slug" type="text" value="{{ $slug }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>
                @error('slug')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}

                    </div>
                @enderror

            </div>


            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Short Descriptipn</label>
                <input id="cc-pament" name="short_desc" type="text" value="{{ $short_desc }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>

            </div>

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Descriptipn</label>
                <input id="cc-pament" name="desc" type="text" value="{{ $desc }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>

            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Keyword</label>
                <input id="cc-pament" name="keywords" type="text" value="{{ $keywords }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>

            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Technical Descriptipn</label>
                <input id="cc-pament" name="technical_specification" type="text"
                    value="{{ $technical_specification }}" class="form-control" aria-required="true"
                    aria-invalid="false" required>

            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Uses</label>
                <input id="cc-pament" name="uses" type="text" value="{{ $uses }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>

            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Warranty</label>
                <input id="cc-pament" name="warranty" type="text" value="{{ $warranty }}" class="form-control"
                    aria-required="true" aria-invalid="false" required>
            </div>

            <div>
                <h1>Product Attribute</h1>
                <div style="background: white; margin-top: 40px; padding:30px;" id="product_attr_box">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">SkU</label>
                                            <input id="cc-pament" name="sku" type="text" value=""
                                                class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">MRP</label>
                                            <input id="cc-pament" name="mrp" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="price" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Size</label>
                                            <select name="size_id" id="size_id" type="text" value=""
                                                class="form-control" required>
                                                <option>Select</option>

                                                @foreach ($sizes as $list)
                                                    <option value="{{ $list->id }}">
                                                        {{ $list->size }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Color</label>
                                            <select name="color_id" id="color_id" type="text" value=""
                                                class="form-control" required>
                                                <option>Select</option>
                                                @foreach ($colors as $list)
                                                    <option value="{{ $list->id }}">
                                                        {{ $list->color }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Quantity</label>
                                            <input id="qty" name="qty" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input id="attr_image" name="attr_image" type="file" value=""
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            @error('attr_image')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}

                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Action</label>
                                            <button type="button" class="btn btn-lg btn-success form-control"
                                                onclick="add_more()">
                                                <i class="fa fa-plus"></i>&nbsp; Add</button>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit </button>
        </div>
        </div>


        <input id="cc-pament" name="id" type="hidden" value="{{ $id }}" class="form-control">

    </form>
    </div>
    </div>

    </div>

    <script>
        function add_more() {
            // alert('tets');
            var html = '<div class="card"><div class="card-body"><div class="form-group"><div class="row">';
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">SkU</label><input id="cc-pament" name="sku" type="text" value="" class="form-control"aria-required="true" aria-invalid="false" required></div> </div>'
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">MRP</label><input id="cc-pament" name="mrp" type="text" value="" class="form-control"aria-required="true" aria-invalid="false" required></div> </div>'
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">Price</label><input id="cc-pament" name="price" type="text" value="" class="form-control"aria-required="true" aria-invalid="false" required></div> </div>'

            var size_id_html = jQuery('#size_id').html();
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">Size</label><select name="size_id" id="size_id" type="text" value="" class="form-control" required><option>Select</option>@foreach ($sizes as $list)<option value="{{ $list->id }}">{{ $list->size }} </option> @endforeach </select></div></div>'
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">Color</label><select name="color_id" id="color_id" type="text" value="" class="form-control" required><option>Select</option>@foreach ($colors as $list)<option value="{{ $list->id }}">{{ $list->color }} </option> @endforeach </select></div></div>'
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">Quanty</label><input id="cc-pament" name="qty" type="text" value="" class="form-control"aria-required="true" aria-invalid="false" required></div> </div>'
            html +=
                '<div class="col-lg-3"><label for="cc-payment" class="control-label mb-1">Image</label><input id="cc-pament" name="attr_image" type="file" value="" class="form-control"aria-required="true" aria-invalid="false" required></div> </div>'

            jQuery('#product_attr_box').append(html);
        }
    </script>
@endsection
