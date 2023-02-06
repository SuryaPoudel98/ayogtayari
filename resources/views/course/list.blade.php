@extends('welcome')
@section('content')




<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Course List</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Course List</h4>
                    <div class="add-product">
                        <a href="/addcourse">Add Course</a>
                    </div>
                    <div class="asset-inner">
                        <table class="table table-striped">
                            <tr>
                                <th>SN</th>
                                <th>Course Title</th>
                                <th>Course Price</th>
                                <!-- <th>Course Description</th> -->
                                <th>Catagory</th>
                                <th>Sub Catagory</th>
                                <th>Child Catagory</th>
                                <th>Action</th>
                            </tr>
                            @foreach($course as $item)
                            <tr>

                                <td>{{$item->course_id}}</td>
                                <td>{{$item->course_title}}</td>
                                <td>{{$item->course_price}}</td>
                                <!-- <td>{{$item->course_description}}</td> -->
                                <td>{{$item->catagory_name}}</td>
                                <td>{{$item->sub_catagory_name}}</td>
                                <td>{{$item->child_catagory_name}}</td>
                                <td>
                                    <a  style="font-size:20px;color:black;" data-toggle="tooltip" title="" href="{{url('edit-course', $item->course_id)}}" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a style="font-size:20px;color:black;"  data-toggle="tooltip" href="{{url('delete-course', $item->course_id)}}" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                </td>

                            </tr>
                            @endforeach

                        </table>
                    </div>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection