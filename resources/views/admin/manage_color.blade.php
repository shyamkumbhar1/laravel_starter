@extends('admin/layout');
@section('page_title','Manage Color')
@section('color_select','active')

@section('container')
<h1>Manage Color</h1>

{{-- {{print_r($data)}} --}}
<a class="btn btn-primary" href="{{url('admin/color')}}" role="button">Back</a>

<form action="{{route('color.insert')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Color</label>
        <input id="cc-pament" name="color" type="text" value = "{{$color}}" class="form-control" aria-required="true" aria-invalid="false" required>
        @error('color')
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