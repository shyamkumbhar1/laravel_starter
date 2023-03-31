@extends('admin/layout');
@section('page_title','Category')
@section('category_select','active')

@section('container')
<h1>Category</h1>


<a class="btn btn-primary" href="category/manage_category" role="button">Add Category</a>
<h1>{{session('message')}}</h1>

<div class="row">
    <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                        
                                            <tr>
                                                <th>Id </th>
                                                <th>Category Name</th>
                                                <th>Category Slug</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $list )
                                          <tr>
                                                <td> {{$list->id}} </td>
                                                <td> {{$list->category_name}} </td>
                                                <td> {{$list->category_slug}} </td>
                                                <td>
                                                @if ($list->status == 1)
                                                <a class="btn btn-primary" href="{{url('admin/category/status/0')}}/{{$list->id}}"  role="button">Active</a>

                                                @elseif ($list->status == 0)
                                                <a class="btn btn-warning" href="{{url('admin/category/status/1')}}/{{$list->id}}"  role="button">Deactive</a>
                                                    
                                                @endif


                                                <a class="btn btn-primary" href="{{url('admin/category/manage_category/')}}/{{$list->id}}"  role="button">Edit</a>
                                                <a class="btn btn-danger" href="{{url('admin/category/delete/')}}/{{$list->id}}"  role="button">Delete</a>

                                                </td>
                                               
                                            </tr>
                                            
                                        @endforeach
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>

</div>
@endsection