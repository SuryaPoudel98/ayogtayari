$('.start_btn_quiz').click(function() {
    $('.quiz-start').toggleClass("quiz-display-show");
});

var visibleDiv = 0;

function showDiv() {
    $(".quiz-grid").hide();
    $(".quiz-grid:eq(" + visibleDiv + ")").show();
}
showDiv()
function showNext() {
    if (visibleDiv == $(".quiz-grid").length - 1) {

        visibleDiv = 0;
        $('button.next_btn').addClass("quiz-hide");
        $('.head-quiz').addClass("quiz-hide");
        $('.footer-quiz').addClass("quiz-hide");
        $('.quiz-header').addClass("quiz-hide");
        $('.leaderboard-quiz').addClass("mcqs-show");
    } else {
        visibleDiv++;

    }

    showDiv();

}
function refreshPage() {
    window.location.reload();
}


/*timer set*/
const timer_btn = document.querySelector(".start_btn_quiz");


timer_btn.onclick = ()=>{

const startingMinutes = 10;
let time = startingMinutes * 60;
const countdownEl = document.getElementById('ten-countdown');

setInterval(updatedCountdown,1000);

function updatedCountdown(){
    const minutes = Math.floor(time / 60);
    let seconds = time %60;
    seconds = seconds <10 ? '0'+ seconds : seconds;

    countdownEl.innerHTML =`${minutes}:${seconds}`;

    time--;
}
}