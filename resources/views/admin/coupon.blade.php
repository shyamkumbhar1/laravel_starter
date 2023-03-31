@extends('admin/layout');
@section('page_title','Coupon')
@section('coupon_select','active')

@section('container')
<h1>Coupon</h1>


<a class="btn btn-primary" href="coupon/manage_coupon" role="button">Add Coupon</a>
<h1>{{session('message')}}</h1>

<div class="row">
    <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                        
                                            <tr>
                                                <th>Id </th>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $list )
                                          <tr>
                                                <td> {{$list->id}} </td>
                                                <td> {{$list->title}} </td>
                                                <td> {{$list->code}} </td>
                                                <td> {{$list->value}} </td>
                                                <td>
                                                @if ($list->status == 1)
                                                <a class="btn btn-primary" href="{{url('admin/coupon/status/0')}}/{{$list->id}}"  role="button">Active</a>
                                                @elseif($list->status == 0)
                                                <a class="btn btn-warning" href="{{url('admin/coupon/status/1')}}/{{$list->id}}"  role="button">Deactive</a>
                                                    
                                                @endif
                                                <a class="btn btn-danger" href="{{url('admin/coupon/delete/')}}/{{$list->id}}"  role="button">Delete</a>
                                                <a class="btn btn-primary" href="{{url('admin/coupon/manage_coupon/')}}/{{$list->id}}"  role="button">Edit</a>
                                                </td>
                                               
                                            </tr>
                                            
                                        @endforeach
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>

</div>
@endsection