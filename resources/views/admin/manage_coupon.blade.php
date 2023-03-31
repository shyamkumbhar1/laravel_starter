@extends('admin/layout');
@section('page_title','Manage Coupon')
@section('coupon_select','active')


@section('container')
<h1>Manage Coupon</h1>

{{-- {{print_r($data)}} --}}
<a class="btn btn-primary" href="{{url('admin/coupon')}}" role="button">Back</a>

<form action="{{route('coupon.insert')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Title</label>
        <input id="cc-pament" name="title" type="text" value = "{{$title}}" class="form-control" aria-required="true" aria-invalid="false" required>
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}

        </div>
        @enderror

    </div>
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Code</label>
        <input id="cc-pament" name="code" type="text" value = "{{$code}}"  class="form-control" aria-required="true" aria-invalid="false" required>
        @error('code')
        <div class="alert alert-danger" role="alert">
            {{$message}}

        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Value</label>
        <input id="cc-pament" name="value" type="text" value = "{{$value}}"  class="form-control" aria-required="true" aria-invalid="false" required>
        @error('value')
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