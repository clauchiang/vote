//摺疊選單

//jq
$(document).ready(function () {
    $('.menu').click(function () {
        $(this).next().slideToggle('fast');
    })
})

//js
// const menu = document.getElementsByClassName('menu');
// let i;

// for (i = 0; i < menu.length; i++) {

//     menu[i].addEventListener("click", function () {

//         this.classList.toggle("active");
//         let content = this.nextElementSibling;

//         if (content.style.display === "block") {
//             content.style.display = "none";
//         } else {
//             content.style.display = "block";
//         }
//     });
// }
