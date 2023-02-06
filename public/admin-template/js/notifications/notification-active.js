(function ($) {
 "use strict";
 
			
			
			// Basic notifications active class
			$('#basicDefault').on('click', function () {
                Lobibox.notify('default', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			$('#basicInfo').on('click', function () {
                Lobibox.notify('info', {
                    msg: 'Your updated data has been updated successfully.'
                });
            });
            $('#basicWarning').on('click', function () {
                Lobibox.notify('warning', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicError').on('click', function () {
                Lobibox.notify('error', {
                    msg: 'Your selected data has been deleted successfully.'
                });
            });
			$('#basicSuccess').on('click', function () {
                Lobibox.notify('success', {
                    msg: 'Your inputed data has been added successfully..'
                });
            });
			
			
 
})(jQuery); 