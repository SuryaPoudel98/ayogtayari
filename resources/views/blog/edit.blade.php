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
                                <li><span class="bread-blod ">Blog</span>
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
                        <li class="active"><a href="#description"> Update Blog</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('update-blog',$blog->id)}}" method="GET" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="blog_title" value="{{$blog->blog_title}}" required class="form-control" type="text" placeholder="Blog Title">
                                                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control select3 select2-danger" name="cid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="0"> Select Course Catagory</option>
                                                                @foreach($course as $item)
                                                                <option value="{{$item->cid}}" <?php if ($item->cid == $blog->cid) echo "selected"; ?>>{{$item->catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <input name="fewParagraph" required class="form-control" type="text" value="{{$blog->fewParagraph}}" placeholder="Blog few words">

                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="description" id="summernote1" type="text">{{$blog->description}}</textarea>

                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <input name="thumbnail" value="" id="thumbnail" class="form-control" type="file"> -->
                                                            <input name="thumbnail" id="course_thumbnail" type="file" class="form-control">
                                                            <input type="hidden" value="{{$blog->thumbnail}}" name="file_upload_course_thumbnail" id="file_upload_course_thumbnail" />
                                                            <img src="/uploads/Postimg/{{$blog->thumbnail}}" style="text-align: center;" id="course_thumbnail_img" height="100" width="100" />

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <div class="payment-adress">
                                                            <button type="submit" id="basicSuccess" class="btn btn-primary waves-effect waves-light">Update</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function resize(base64Str, id, imgId) {
        document.getElementById(imgId).src = "loader.gif";
        //define the width to resize e.g 600px
        var resize_Height; //without px
        let img = new Image()
        img.src = base64Str
        img.onload = function(el) {
            var mul;
            if (img.height > 1000) {
                mul = img.height / 1000;
                resize_Height = img.height / mul;
            } else {
                resize_Height = img.height;
            }
            var elem = document.createElement('canvas'); //create a canvas
            //scale the image to 600 (width) and keep aspect ratio
            var scaleFactor = resize_Height / el.target.height;
            elem.height = resize_Height;
            elem.width = el.target.width * scaleFactor;
            //draw in canvas
            var ctx = elem.getContext('2d');
            ctx.drawImage(el.target, 0, 0, elem.width, elem.height);
            //get the base64-encoded Data URI from the resize image
            srcEncoded = ctx.canvas.toDataURL('image/jpeg', 0.9);
            uploadImage(srcEncoded, id, imgId);

        }
    }

    function uploadImage(imageFile, id, imgId) {

        // alert(imageFile);
        var date = new Date(); // some mock date
        var milliseconds = date.getTime();
        var imageName = milliseconds + '.jpg';

        // imageName
        $.ajax({
            url: "{{ url('/upload') }}",
            type: "POST",
            data: {
                _token: $('#_token').val(),
                file: imageFile,
                imageName: imageName,
            },
            cache: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                // alert(dataResult.imageFile);
                document.getElementById(id).value = dataResult.imageFile;
                document.getElementById(imgId).src = "/uploads/Postimg/" + dataResult.imageFile;

            },
            error: function(xhr, ajaxOptions, thrownError) {

                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }


        });
    }
    $('#course_thumbnail').on('change', function(ev) {
        // alert("dfsa");
        var filedata = this.files[0];

        var imgtype = filedata.type;
        var match = ['image/jpeg', 'image/jpg'];
        if (imgtype == 'image/jpeg' || imgtype == 'image/jpg' || imgtype == 'image/png') {
            var reader = new FileReader();
            reader.onload = function(ev) {
                imageFile = ev.target.result;
                resize(imageFile, 'file_upload_course_thumbnail', 'course_thumbnail_img');
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            alert("Only accept image format!")
        }

    });
</script>
@endsection