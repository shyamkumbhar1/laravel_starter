@extends('admin/layout');
@section('page_title','Manage Size')
@section('size_select','active')

@section('container')
<h1>Manage Size</h1>

{{-- {{print_r($data)}} --}}
<a class="btn btn-primary" href="{{url('admin/size')}}" role="button">Back</a>

<form action="{{route('size.insert')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Size</label>
        <input id="cc-pament" name="size" type="text" value = "{{$size}}" class="form-control" aria-required="true" aria-invalid="false" required>
        @error('size')
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