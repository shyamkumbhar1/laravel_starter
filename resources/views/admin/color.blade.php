@extends('admin/layout');
@section('page_title','Color')
@section('color_select','active')

@section('container')
<h1>Color</h1>


<a class="btn btn-primary" href="color/manage_color" role="button">Add Color</a>
<h1>{{session('message')}}</h1>

<div class="row">
    <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                        
                                            <tr>
                                                <th>Id </th>
                                                <th>Color</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $list )
                                          <tr>
                                                <td> {{$list->id}} </td>
                                                <td> {{$list->color}} </td>
                                               
                                                <td>
                                                @if ($list->status == 1)
                                                <a class="btn btn-primary" href="{{url('admin/color/status/0')}}/{{$list->id}}"  role="button">Active</a>
                                                @elseif($list->status == 0)
                                                <a class="btn btn-warning" href="{{url('admin/color/status/1')}}/{{$list->id}}"  role="button">Deactive</a>
                                                    
                                                @endif
                                                <a class="btn btn-danger" href="{{url('admin/color/delete/')}}/{{$list->id}}"  role="button">Delete</a>
                                                <a class="btn btn-primary" href="{{url('admin/color/manage_color/')}}/{{$list->id}}"  role="button">Edit</a>
                                                </td>
                                               
                                            </tr>
                                            
                                        @endforeach
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>

</div>
@endsection