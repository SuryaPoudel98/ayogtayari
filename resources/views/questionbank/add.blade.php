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
                                <li><span class="bread-blod ">questionsBank</span>
                                </li>
                            </ul>
                        </div>
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
                        <li class="active"><a href="#description">Add questionsBank</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('/addQuestionsBank')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="question_bank_name"  required id="question_bank_name" type="text" class="form-control" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                        <button type="submit" id="basicSuccess" class="btn btn-primary waves-effect waves-light">Save</button>
                                         
                                                        </div>
                                                       
                                                    </div>
                                                    <div style="margin-top:-15px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="hpanel shadow-inner responsive-mg-b-30">
                                                            <div class="panel-body">
                                                                <div class="table-responsive wd-tb-cr">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Title</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($questionsBank as $item)

                                                                            <tr>

                                                                                <td>
                                                                                    <span class=" font-bold">{{ $item->question_bank_name }}</span>
                                                                                </td>



                                                                                <td>
                                                                                    <a style="font-size:20px;" href="{{url('edit-questionsBank', $item->question_bank_id )}}" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                                    <a style="font-size:20px;" href="{{url('delete-questionsBank', $item->question_bank_id )}}" id="basicError" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection