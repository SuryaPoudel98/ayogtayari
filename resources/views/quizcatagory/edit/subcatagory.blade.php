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
                                <li><span class="bread-blod ">Quiz Catagories</span>
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

                        <li class="active"><a href="#reviews"> Quiz Sub Catagory</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('update-quizsubcatagory',$quizSubCatagories->q_sid)}}" method="GET" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input value="{{$quizSubCatagories->quiz_sub_catagory_name}}" name="quiz_sub_catagory_name" type="text" class="form-control" placeholder="Course Sub Catagory  Name">
                                                        </div>

                                                        <div class="form-group">
                                                            <select class="form-control select3 select2-danger" name="qid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                @foreach($catagories as $item)
                                                                <option value="{{$item->qid}}">{{$item->quiz_catagories_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>



                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <div class="payment-adress">
                                                            <button type="Update" onclick="Alert.success('Success! Your data as been updated sucessfully. ','Success',{displayDuration: 3000, pos: 'top'})" class="btn btn-primary waves-effect waves-light">Update</button>
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