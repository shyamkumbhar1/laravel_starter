@extends('admin/layout');

@section('container')
<h1>Manage Category</h1>

{{-- {{print_r($data)}} --}}
<a class="btn btn-primary" href="{{url('admin/category')}}" role="button">Back</a>

<form action="{{route('category.insert')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Category</label>
        <input id="cc-pament" name="category_name" type="text" value = "{{$category_name}}" class="form-control" aria-required="true" aria-invalid="false" required>
        @error('category_name')
        <div class="alert alert-danger" role="alert">
            {{$message}}

        </div>
        @enderror

    </div>
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Category Slug</label>
        <input id="cc-pament" name="category_slug" type="text" value = "{{$category_slug}}"  class="form-control" aria-required="true" aria-invalid="false" required>
        @error('category_slug')
        <div class="alert alert-danger" role="alert">
            {{$message}}

        </div>
        @enderror
    </div>

    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit </button>
    </div>
        <input id="cc-pament" name="id" type="hidden" value = "{{$id}}" class="form-control" >

</form>
</div>
</div>

</div>
@endsection