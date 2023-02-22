@extends('welcome')
@section('content')
<div class="lobibox-notify-wrapper bottom right"></div>

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
                        <li class="active"><a href="#description">Blog</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{url('addBlogData')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                            <input name="blog_title" required class="form-control" type="text" placeholder="Blog Title">
                                                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-label">Course Catagory</label>
                                                            <select class="form-control select3 select2-danger" name="cid" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                                                <option value="0"> Select Course Catagory</option>
                                                                @foreach($course as $item)
                                                                <option value="{{$item->cid}}">{{$item->catagory_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="form-group">
                                                        <label class="form-label">Few Words on Blog</label>
                                                               <input name="fewParagraph" required class="form-control" type="text" placeholder="Blog few words">

                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                            <textarea name="description" required id="summernote1" type="text"></textarea>

                                                        </div>
                                                        <div class="form-group">
                                                        <label class="form-label">Thumbnail</label>

                                                            <input name="thumbnail" id="course_thumbnail" type="file" class="form-control">
                                                            <input type="hidden" value="" name="file_upload_course_thumbnail" id="file_upload_course_thumbnail" />
                                                            <img src="thumbnail.png" style="text-align: center;" id="course_thumbnail_img" height="100" width="100" />

                                                        </div>



                                                    </div>

                                                    <div style="margin-top:-15px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="hpanel shadow-inner responsive-mg-b-30">
                                                            <div class="panel-body">
                                                                <div class="table-responsive wd-tb-cr">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Blog Title</th>
                                                                                <th>C. Catagory Name</th>
                                                                                <th>Thumbnail</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($blog as $item)
                                                                            <tr>

                                                                                <td>
                                                                                    <span class=" font-bold">{{ $item->blog_title }}</span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class=" font-bold">{{ $item->catagory_name }}</span>
                                                                                </td>
                                                                                <td>
                                                                                    <span class=" font-bold">{{ $item->thumbnail}}</span>
                                                                                </td>

                                                                                <td>
                                                                                    <a style="font-size:20px;" data-toggle="tooltip" href="{{url('edit-blog', $item->id)}}" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                                                    <a style="font-size:20px;" data-toggle="tooltip" href="{{url('delete-blog', $item->id)}}" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
                                                            <button type="submit" id="basicSuccess" class="btn btn-primary waves-effect waves-light">Submit</button>
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
    function resizeImage(base64Str, id, imgId) {
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
            uploadImageForBlog(srcEncoded, id, imgId);

        }
    }

    function uploadImageForBlog(imageFile, id, imgId) {

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
                resizeImage(imageFile, 'file_upload_course_thumbnail', 'course_thumbnail_img');
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            alert("Only accept image format!")
        }

    });
</script>
@endsection