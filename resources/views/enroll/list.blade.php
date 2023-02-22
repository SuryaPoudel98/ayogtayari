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
                    <h4>Enrollment List</h4>
                    <div class="add-product">
                        <a href="/enroll">Add New Enrollment</a>
                    </div>
                    <div class="asset-inner">
                        <table class="table table-striped">
                            <tr>
                                <th>Datetime</th>
                                <th>Full Name</th>
                                <th>Mobile No.</th>
                                <th>Email Address</th>
                                <th>Payment Id</th>
                                <th>Amount</th>
                                <th>Enrollment Status</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Transaction Code</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            @foreach($list as $item)
                            <tr>

                                <td>{{$item->created_at}}</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->contact_number}}</td>
                                <td>{{$item->email_address}}</td>
                                <td>{{$item->payment_id}}</td>
                                <td>{{$item->amounts}}</td>
                                <td>{{$item->enroll_status}}</td>
                                <td>{{$item->paymentMode}}</td>
                                <td>{{$item->isPaymentCompleted}}</td>
                                <td>{{$item->tCode}}</td>
                               

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