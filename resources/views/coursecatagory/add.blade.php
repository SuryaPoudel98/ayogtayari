@extends('welcome')
@section('content')

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
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
                                <li><span class="bread-blod ">Course Catagories</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active" id="descriptiontab"><a href="#description">Courses Catagory</a></li>
                        <li id="reviewstab"><a href="#reviews"> Course Sub Catagory</a></li>
                        <li id="INFORMATIONtab"><a href="#INFORMATION">Course Child Catagory</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{route('addcoursecatagory')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="catagory_name" id="catagory_name" type="text" class="form-control" placeholder="Course Catagory  Name">

                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="payment-adress">
                                                                    <button type="submit" id="basicSuccess" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div style="margin-top:-15px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="hpanel shadow-inner responsive-mg-b-30">
                                                            <div class="panel-body">
                                                                <div class="table-responsive wd-tb-cr">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Course Catagory Name</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($subCatagory as $item)
                                                                            <tr>

                                                                                <td>
                                                                                    <span class=" font-bold">{{ $item->catagory_name }}</span>
                                                                                </td>

                                                                                <td>
                                                                                    <a style="font-size:20px;" data-toggle="tooltip" href="{{url('edit-coursecatagory', $item->cid)}}" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                                    <a style="font-size:20px;" id="basicError" data-toggle="tooltip" href="{{url('delete-coursecatagory', $item->cid)}}" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                                                                </td>


                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form action="{{url('coursesubcatagory')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <select class="form-control select3 select2-danger" name="cid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                            @foreach($subCatagory as $item)
                                                            <option value="{{$item->cid}}">{{$item->catagory_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <input name="sub_catagory_name" id="sub_catagory_name" type="text" class="form-control" placeholder="Course Sub Catagory  Name">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <div class="payment-adress">
                                                                <button type="submit" id="basicSuccess" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div style="margin-top:-15px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                                        <div class="panel-body">
                                                            <div class="table-responsive wd-tb-cr">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Course Catagory Name</th>
                                                                            <th>Course Sub Catagory Name</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach($courseSubCatagory as $item)
                                                                        <tr>

                                                                            <td>
                                                                                <span class=" font-bold">{{ $item->catagory_name }}</span>
                                                                            </td>

                                                                            <td>
                                                                                <span class=" font-bold">{{ $item->sub_catagory_name }}</span>
                                                                            </td>

                                                                            <td>
                                                                                <a style="font-size:20px;" href="{{url('edit-coursesubcatagory', $item->s_cid)}}" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                                <a style="font-size:20px;" href="{{url('delete-coursesubcatagory', $item->s_cid)}}" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                            </td>


                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form action="{{url('coursechildcatagory')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <select class="form-control select3 select2-danger" name="s_cid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                            @foreach($courseSubCatagory as $item)
                                                            <option value="{{$item->s_cid}}">{{$item->sub_catagory_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input name="child_catagory_name" type="text" class="form-control" placeholder="Course Child Catagory Name">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <div class="payment-adress">
                                                                <button type="submit" id="basicSuccess" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-top:-15px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="hpanel shadow-inner responsive-mg-b-30">
                                                        <div class="panel-body">
                                                            <div class="table-responsive wd-tb-cr">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Course Sub Catagory Name</th>
                                                                            <th>Course Child Catagory Name</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($courseChildCatagory as $item)
                                                                        <tr>

                                                                            <td>
                                                                                <span class=" font-bold">{{ $item->sub_catagory_name }}</span>
                                                                            </td>

                                                                            <td>
                                                                                <span class=" font-bold">{{ $item->child_catagory_name }}</span>
                                                                            </td>

                                                                            <td>
                                                                                <a style="font-size:20px;" href="{{url('edit-coursechildcatagory', $item->child_catagory_id)}}" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                                <a style="font-size:20px;" href="{{url('delete-coursechildcatagory', $item->child_catagory_id)}}" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                            </td>


                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(request()->get('id')=="coursesubcategory")
<script>
    var coursetab = document.getElementById("descriptiontab");
    coursetab.classList.remove("active");
    var course_content = document.getElementById("description");
    course_content.classList.remove("active");
    course_content.classList.remove("in");

    var curriculumntab = document.getElementById("reviewstab");
    curriculumntab.classList.add("active");


    var curriculumn_content = document.getElementById("reviews");
    curriculumn_content.classList.add("active");
    curriculumn_content.classList.add("in");
</script>
@elseif(request()->get('id')=="coursechildcatagory")
<script>
    var coursetab = document.getElementById("descriptiontab");
    coursetab.classList.remove("active");
    var course_content = document.getElementById("description");
    course_content.classList.remove("active");
    course_content.classList.remove("in");
    var coursetab = document.getElementById("reviewstab");
    coursetab.classList.remove("active");
    var course_content = document.getElementById("reviews");
    course_content.classList.remove("active");
    course_content.classList.remove("in");

    var curriculumntab = document.getElementById("INFORMATIONtab");
    curriculumntab.classList.add("active");


    var curriculumn_content = document.getElementById("INFORMATION");
    curriculumn_content.classList.add("active");
    curriculumn_content.classList.add("in");
</script>
@endif
@endsection