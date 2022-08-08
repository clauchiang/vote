//顯示密碼
const pw = document.getElementById('pw');
const show = document.getElementById('show');

// console.log(show);

show.addEventListener("click", function() {

    if (pw.type === "password") {

        pw.type = "text";
        show.innerHTML = "<i id='show' class='fa-solid fa-eye'></i>";

    }else{

        pw.type = "password";
        show.innerHTML = "<i id='show' class='fa-solid fa-eye-slash'></i>";
    }

})