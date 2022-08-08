const topBtn = document.getElementById('topBtn');

function topFun() {

    //直接到top
    // document.body.scrollTop = 0;
    // document.documentElement.scrollTop = 0;

    //滾動到top
    window.scrollTo({ top: 0, behavior: 'smooth' });

}

function bottomFun(){

    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    
}