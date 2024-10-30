function inlineEventBtn () {
    alert('무한루프');
}

function colorChange() {
    const TITLE = document.querySelector('.title');
    TITLE.classList.add('title-click');
}

// addEventListener()
const BTN_LISTENER = document.querySelector('#btn-1');
BTN_LISTENER.addEventListener ('click',callAlert);

function callAlert() {
    alret('이벤트리스너 실행');
}

const BTN_TOGGLE = document.querySelector('#btn_toggle');
BTN_TOGGLE.addEventListener ('click',() => {
    const TITLE  = document.querySelector('h1');
    TITLE.classList.toggle('title-click');
})

// removeEventListener()
BTN_LISTENER.removeEventListener('click',callAlert)

// 일회성으로 이벤트를 줄경우

const H2 = document.querySelector('h2');
H2.addEventListener('click', testyong);

function testyong() {
    alert('테스트용');
    // H2.removeEventListener('click', testyong);
}

//  const TITLE = document.querySelector('h1');
//  TITLE.addEventListener('mouseenter',()=>{
//     H2.removeEventListener('click', testyong);
  
//  });

 const TITLE = document.querySelector('h1');
 TITLE.addEventListener(
    'mouseenter'
    , () => {
        H2.removeEventListener('click',testyong);
        console.log('tt');
    }
    ,{once: true}  //option :once가 true 일 경우 한번만 실행
 )

//  이벤트 객체
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup', (e)=> {
    // console.log(e);
    e.target.style.color = 'red';
});

H3.addEventListener('mousedown', (e)=> {
    // console.log(e);
    e.target.style.color = 'skyblue';
});


H3.addEventListener('mouseleave', (e)=> {
    // console.log(e);
    e.target.style.color = 'orange';
});

const BTN_MODAL = document.querySelector('#btn_modal');
BTN_MODAL.addEventListener('click',() =>{
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
})

const MODAL_CLOSE = document.querySelector('#modal_close');
MODAL_CLOSE.addEventListener('click',() => {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
})

// 팝업
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click',() =>{
    open('https://www.naver.com', '', 'width=1000 height=1000');
})