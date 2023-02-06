function hd(x) {
    if (x == 1) document.getElementById("filt1").style.display = "block",
        document.getElementById("filt2").style.display = "none",
        document.getElementById("filt3").style.display = "none",
        document.getElementById("filt4").style.display = "none",
        document.getElementById("filt5").style.display = "none",
        document.getElementById("filt6").style.display = "none",
        document.getElementById("filt7").style.display = "none";

    else if (x == 2) document.getElementById("filt2").style.display = "block",
        document.getElementById("filt1").style.display = "none",
        document.getElementById("filt3").style.display = "none",
        document.getElementById("filt4").style.display = "none",
        document.getElementById("filt5").style.display = "none",
        document.getElementById("filt6").style.display = "none",
        document.getElementById("filt7").style.display = "none";

    else if (x == 3) document.getElementById("filt3").style.display = "block",
        document.getElementById("filt2").style.display = "none",
        document.getElementById("filt1").style.display = "none",
        document.getElementById("filt4").style.display = "none",
        document.getElementById("filt5").style.display = "none",
        document.getElementById("filt6").style.display = "none",
        document.getElementById("filt7").style.display = "none";

    else if (x == 4) document.getElementById("filt4").style.display = "block",
        document.getElementById("filt2").style.display = "none",
        document.getElementById("filt1").style.display = "none",
        document.getElementById("filt3").style.display = "none",
        document.getElementById("filt5").style.display = "none",
        document.getElementById("filt6").style.display = "none",
        document.getElementById("filt7").style.display = "none";

    else if (x == 5) document.getElementById("filt5").style.display = "block",
        document.getElementById("filt2").style.display = "none",
        document.getElementById("filt1").style.display = "none",
        document.getElementById("filt3").style.display = "none",
        document.getElementById("filt4").style.display = "none",
        document.getElementById("filt6").style.display = "none",
        document.getElementById("filt7").style.display = "none";

    else if (x == 6) document.getElementById("filt6").style.display = "block",
        document.getElementById("filt2").style.display = "none",
        document.getElementById("filt1").style.display = "none",
        document.getElementById("filt3").style.display = "none",
        document.getElementById("filt4").style.display = "none",
        document.getElementById("filt5").style.display = "none",
        document.getElementById("filt7").style.display = "none";

    else if (x == 7) document.getElementById("filt7").style.display = "block",
        document.getElementById("filt2").style.display = "none",
        document.getElementById("filt1").style.display = "none",
        document.getElementById("filt3").style.display = "none",
        document.getElementById("filt4").style.display = "none",
        document.getElementById("filt5").style.display = "none",
        document.getElementById("filt6").style.display = "none";
}

function bm(x) {
    if (x == 1) document.getElementById("bookmarks1").style.display = "table",
        document.getElementById("bookmarks2").style.display = "none",
        document.getElementById("bookmarks3").style.display = "none";


    else if (x == 2) document.getElementById("bookmarks2").style.display = "table",
        document.getElementById("bookmarks1").style.display = "none",
        document.getElementById("bookmarks3").style.display = "none";

    else if (x == 3) document.getElementById("bookmarks3").style.display = "table",
        document.getElementById("bookmarks1").style.display = "none",
        document.getElementById("bookmarks2").style.display = "none";
}


//Heading active class

var header = document.getElementById("prof-head");
var btns = header.getElementsByClassName("hd");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("heading-active");
        current[0].className = current[0].className.replace(" heading-active", "");
        this.className += " heading-active";

    });
}

//subheading active class


var header2 = document.getElementById("prof-head1");
var submenu = header2.getElementsByClassName("sub-menu");
for (var i = 0; i < submenu.length; i++) {
    submenu[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("heading-active1");
        current[0].className = current[0].className.replace(" heading-active1", "");
        this.className += " heading-active1";

    });
}


//update-profile password and profile picture


var header3 = document.getElementById("prof-head2");
var submenu1 = header3.getElementsByClassName("u-p");
for (var i = 0; i < submenu1.length; i++) {
    submenu1[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("heading-active2");
        current[0].className = current[0].className.replace(" heading-active2", "");
        this.className += " heading-active2";

    });
}


//update-profile onclick
function up(x) {
    if (x == 1) document.getElementById("pass-change").style.display = "block",
        document.getElementById("picture-change").style.display = "none";
    else if (x == 2) document.getElementById("pass-change").style.display = "none",
        document.getElementById("picture-change").style.display = "block";
}