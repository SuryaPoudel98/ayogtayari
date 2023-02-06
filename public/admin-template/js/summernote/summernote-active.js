(function ($) {
	"use strict";
	$('#summernote1').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					getBase64(files[i], "summernote1");
				}
			}
		}
	});
	$('#summernote2').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					getBase64(files[i], "summernote2");
				}
			}
		}
	});
	$('#summernote3').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					getBase64(files[i], "summernote3");
				}
			}
		}
	});
	$('#summernote4').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					getBase64(files[i], "summernote4");
				}
			}
		}
	});
	$('#summernote5').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					getBase64(files[i], "summernote5");
				}
			}
		}
	});
	$('#summernote6').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {
				for (var i = files.length - 1; i >= 0; i--) {
					getBase64(files[i], "summernote6");
				}
			}
		}
	});

	$('#summernote').summernote({
		placeholder: 'Enter directions here...',
		height: 200,
		callbacks: {
			onImageUpload: function (files, editor, welEditable) {

				for (var i = files.length - 1; i >= 0; i--) {
				
					getBase64(files[i], "summernote");
				}
			}
		}
	});

})(jQuery);



function getBase64(file, summernote) {
	var reader = new FileReader();
	reader.readAsDataURL(file);
	reader.onload = function () {
		// console.log(reader.result);
		// alert(reader.result);
		resize(reader.result, summernote);
	};
	reader.onerror = function (error) {
		console.log('Error: ', error);
	};
}


function resize(base64Str, summernote) {

	//define the width to resize e.g 600px
	var resize_Height; //without px
	let img = new Image()
	img.src = base64Str
	img.onload = function (el) {
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
		uploadImage(srcEncoded, summernote);

	}
}

function uploadImage(imageFile, summernote) {

	// alert(imageFile);
	var date = new Date(); // some mock date
	var milliseconds = date.getTime();
	var imageName = milliseconds + '.jpg';

	// imageName
	$.ajax({
		url: "upload",
		type: "POST",
		data: {
			_token: $('#_token').val(),
			file: imageFile,
			imageName: imageName,
		},
		cache: false,
		success: function (dataResult) {
			var dataResult = JSON.parse(dataResult);
			var url = "/uploads/Postimg/" + dataResult.imageFile;
			// document.getElementById(imgId).src = "/uploads/Postimg/" + dataResult.imageFile;


			// getting old html 
			let html = $('#' + summernote).summernote('code');

			// setting updated html with image url
			$('#' + summernote).summernote('code', html + '<img src="' + url + '"/>');
		},
		error: function (xhr, ajaxOptions, thrownError) {

			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}


	});
}