// 타이머 함수
// ------------

// setTimeout(callback, ms) : 일정시간이 흐른 후에 콜백함수를 실행
// setTimeout(()=> {
//     console.log('시간초과');
// },5000);

// // 
// setTimeout(()=> console.log('A'),1000);
// setTimeout(()=> console.log('B'),2000);
// setTimeout(()=> console.log('C'),3000);

// 콜백지옥
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         },1000);
//     },2000);
// },3000);

// clearTimeout(타이머 ID) :해당 타이머ID의 처리를 제거
// const TIMER_ID = setTimeout(() => console.log('타이머'),10000);
// console.log(TIMER_ID);  
// clearTimeout(TIMER_ID);


// // setInterval(callback, ms) : 일정시간마다 콜백함수를 실행
// const INTERVAL_ID = setInterval(() => {
//     console.log('인터벌');
// }, 2000)

// // clearInterval(id) :해당 id의 인터벌을 제거
// // clearInterval(INTERVAL_ID);

// setTimeout(()=> clearInterval(INTERVAL_ID),10000);

// HTML건들지 않는다
// 두둥등장이라는 글자가 나오는데 1초단위로 빨->파 변경되도록

// document.write('<h1>두둥등장</h1>');

// function RED () {
//     const H1  = document.querySelector('h1');
//     H1.classList.add('font-red');
// }

// function BLUE() {
//     const H1  = document.querySelector('h1');
//     H1.classList.add('font-blue')
// }

// const FIRST = document.querySelector('h1');
// FIRST.classList.add('font-red');
// const CHANGE = setInterval(() => {
//     FIRST.classList.toggle('font-blue');
// },50000);

// (()=> {
//     const H1 = document.createElement('h1');
//     H1.textContent = '두등등장';
//     H1.classList.add('font-blue');
//     H1.style.fontSize = '5rem';

//     document.body.appendChild(H1);
// })();

// setInterval(() => {
//     const H1 = document.querySelector('h1');
//     H1.classList.toggle('font-blue');
//     H1.classList.toggle('font-red');
// })

// document.write('<h1>╰(°ㅂ°)╯</h1>');

// function DOWN() {
//     document.write('<h1>╭(°ㅂ°)╮</h1>')
// }

// const DANCE = document.querySelector('h1');
// const DANCING = setInterval(() => {
//     DANCE.
// })

// const DANCE = '⁽⁽*( ᐖ )*⁾⁾ ';
// const DOWN = '₍₍*( ᐛ )*₎₎';

// (() => {
//     const P = document.createElement('P');
//     P.innerHTML = DANCE;
//     P.style.fontSize = '5rem';
//     document.body.appendChild(P);
// })();
// setInterval(() => {
//     const P = document.querySelector('P');
//     if(P.innerHTML === DANCE) {
//         P.innerHTML= DOWN;
//     } else {
//         P.innerHTML = DANCE ;
//     }
// },500)

