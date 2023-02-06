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
                        <li class="active"><a href="#description">Customers</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('addCustomersData')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="email" id="" type="email" class="form-control" placeholder="Email" required>

                                                        </div>
                                                        <div class="form-group">
                                                            <input name="password" id="" type="password" class="form-control" placeholder="Password" required>

                                                        </div>

                                                        <div class="form-group">
                                                            <input name="mobile_number" id="" type="number" class="form-control" placeholder="Mobile Number" required>

                                                        </div>



                                                    </div>

                                                    <div style="margin-top:-15px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="hpanel shadow-inner responsive-mg-b-30">
                                                            <div class="panel-body">
                                                                <div class="table-responsive wd-tb-cr">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Email</th>
                                                                                <th>Mobile Number</th>
                                                                                <th>Password</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($customers as $item)
                                                                            <tr>

                                                                                <td>
                                                                                    <span class=" font-bold">{{$item->email}}</span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class=" font-bold">{{$item->mobile_number}}</span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class=" font-bold">**************</span>
                                                                                </td>

                                                                                <td>
                                                                                    <a style="font-size:20px;" data-toggle="tooltip" href="{{url('edit-customer', $item->customer_id)}}" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                                    <a style="font-size:20px;"  data-toggle="tooltip" href="{{url('delete-customers', $item->customer_id)}}" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
    </div>
</div>
@endsection