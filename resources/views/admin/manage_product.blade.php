@extends('admin/layout');
@section('page_title', 'Manage Product')
@section('product_select', 'active')

@if($id> 0)
    {{$image_required = ""}}

@else
{{$image_required = "required"}}

@endif


@section('container')
    <h1>Manage Product</h1>

    {{-- {{print_r($data)}} --}}
    <a class="btn btn-primary" href="{{ url('admin/product') }}" role="button">Back</a>

    <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Product Id</label>
            <select name="category_id" id="category_id" type="text" value="{{ $category_id }}" class="form-control"required>
                <option value="">Select Categories</option>
                @foreach ($category as $list)
                    @if($category_id == $list->id)
                <option selected value="{{$list->id}}"> 
                    @else
                <option  value="{{$list->id}}"> 

                    @endif
                {{$list->category_name}} </option>

                @endforeach
            </select>
                
            @error('category_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}

                </div>
            @enderror

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Name</label>
            <input id="cc-pament" name="name" type="text" value="{{ $name }}" class="form-control"
                aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="image" class="control-label mb-1">Image</label>
            <input id="image" name="image" type="file" value="{{ $image }}" class="form-control"
                aria-required="true" aria-invalid="false" {{$image_required}}>
                @error('image')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}

                </div>
            @enderror

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
            <label for="cc-payment" class="control-label mb-1">Brand</label>
            <input id="cc-pament" name="brand" type="text" value="{{ $brand }}" class="form-control"
                aria-required="true" aria-invalid="false" required>

        </div>
      
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Short Descriptipn</label>
            <input id="cc-pament" name="short_desc" type="text" value="{{ $short_desc }}" class="form-control"
                aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Model</label>
            <input id="cc-pament" name="model" type="text" value="{{ $model }}" class="form-control"
                aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Descriptipn</label>
            <input id="cc-pament" name="desc" type="text" value="{{ $desc }}" class="form-control"
                aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Keyword</label>
            <input id="cc-pament" name="keywords" type="text" value="{{ $keywords }}" class="form-control" aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Technical Descriptipn</label>
            <input id="cc-pament" name="technical_specification" type="text" value="{{ $technical_specification }}" class="form-control"  aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Uses</label>
            <input id="cc-pament" name="uses" type="text" value="{{ $uses }}" class="form-control"  aria-required="true" aria-invalid="false" required>

        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Warranty</label>
            <input id="cc-pament" name="warranty" type="text" value="{{ $warranty }}" class="form-control"  aria-required="true" aria-invalid="false" required>
        </div>

        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit </button>
        </div>
        <input id="cc-pament" name="id" type="hidden" value="{{ $id }}" class="form-control">

    </form>
    </div>
    </div>

    </div>
@endsection
