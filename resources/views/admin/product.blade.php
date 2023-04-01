@extends('admin/layout');
@section('page_title','Product')
@section('product_select','active')

@section('container')
<h1>Product</h1>


<a class="btn btn-primary" href="product/manage_product" role="button">Add Product</a>
<h1>{{session('message')}}</h1>

<div class="row">
    <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                        
                                            <tr>
                                                <th>Id </th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $list )
                                          <tr>
                                                <td> {{$list->id}} </td>
                                                <td> {{$list->name}} </td>
                                                <td> {{$list->slug}} </td>
                                    
                                                <td> <img src="{{asset('storage/media/'.$list->image)}}"/></td>
                                               
                                                <td>
                                                @if ($list->status == 1)
                                                <a class="btn btn-primary" href="{{url('admin/product/status/0')}}/{{$list->id}}"  role="button">Active</a>

                                                @elseif ($list->status == 0)
                                                <a class="btn btn-warning" href="{{url('admin/product/status/1')}}/{{$list->id}}"  role="button">Deactive</a>
                                                    
                                                @endif


                                                <a class="btn btn-primary" href="{{url('admin/product/manage_product/')}}/{{$list->id}}"  role="button">Edit</a>
                                                <a class="btn btn-danger" href="{{url('admin/product/delete/')}}/{{$list->id}}"  role="button">Delete</a>

                                                </td>
                                               
                                            </tr>
                                            
                                        @endforeach
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>

</div>
@endsection