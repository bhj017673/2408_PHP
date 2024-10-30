function inlineEventBtn () {
    alert('안녕하세요. 숨어있는 div를 찾아주세요');
}

function dugeun() {
    alert('두근두근');
}

function gotcha() {
    alert('들켰다');
    REAL_BOX.removeEventListener('click', gotcha);
    REAL_BOX.classList.add('backgroundcolor');  
    HIDDEN_BOX.removeEventListener('mouseenter', dugeun);
    REAL_BOX.addEventListener('click', hide);
}

function hide() {
    alert('히히 숨는다');
    REAL_BOX.classList.remove('backgroundcolor');
    REAL_BOX.removeEventListener('click', hide);
    HIDDEN_BOX.addEventListener('mouseenter', dugeun);
    REAL_BOX.addEventListener('click', gotcha);
}

// const HIDDEN_BOX = document.querySelector('.hidden-box');
// HIDDEN_BOX.addEventListener('mouseenter', ()=>{
//     alert('두근두근');
// })

const HIDDEN_BOX = document.querySelector('.hidden-box');
HIDDEN_BOX.addEventListener('mouseenter',dugeun);
const REAL_BOX = document.querySelector('.real-box');
REAL_BOX.addEventListener('click', gotcha);






// const REAL_BOX1 = document.querySelector('.real-box');
// REAL_BOX.addEventListener(
//     'click'
//     , () => {
//         alert('히히 숨는다');
//         REAL_BOX.classList.remove('backgroundcolor');
        
//     } 
// )


//     , () => {
//     alert('들켰다');
//     REAL_BOX.classList.add('backgroundcolor');  
//     HIDDEN_BOX.removeEventListener('mouseenter', dugeun);
//     }
// )
 