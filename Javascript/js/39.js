// --------
// 요소선택
// --------
// 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
title.style.color = 'red';

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');
H1[1].style.color='lightgray';

// 클래스명으로 요소를 선택
const CLASS_NINE_LI = document.getElementsByClassName('none-li');

// CSS선택자를 이용해서 요소를 선택
// 현업에서 가장많이 사용

const SICK = document.querySelector('#sick');
const NONE_LI = document.querySelector('.none-li');
const ALL_NONE_LI = document.querySelectorAll('.none-li');

const LI = document.querySelectorAll('li');
LI.forEach((element, idx) => {
    if(idx % 2 === 0) {
    element.style.color = 'red';
    } else {
        element.style.color = 'blue';
    }
});

const ARR1 =[1,2,3,4];
const ARR2 = [
    {id :1, name: '홍길동'}
    ,{id: 2, name: '갑돌이'}
];

// ----------
// 요소조작
// ---------
// textContent : 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달
TITLE.textContent = 'ttttt';

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>링크크크</a>';

//setAttribute(속성명,값) : 해당 속성과 값을 요소에 추가
const A_LINK = document.querySelector('#title > a');
// A_LINK.setAttribute('href','https://www.naver.com');

const INPUT_1= document.querySelector('#input-1');
INPUT_1.setAttribute('placeholder','하하하하');

// --------------
// 요소의 스타일링
// --------------
// style : 인라인으로 스타일추가, 우선순위 상승
TITLE.style.color = 'black';

// classList : 클래스로 스타일 추가 및 삭제
// classList.add() : 추가
TITLE.classList.add('class-1');
TITLE.classList.add('class-2','class-3','class-4','class-5','class-6');

// classlist.remove() :해당클래스 제거
TITLE.classList.remove('class-3');

// classList.toggle() : 해당클래스를 on/off
TITLE.classList.toggle('toggle')

// ---------------
// 새로운 요소 생성
// ---------------
// createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.textContent = '떡볶이';

const FOODS = document.querySelector('#foods');

// appendChild(노드) : 해당 부모 노드의 마지막 자식으로 노드를 추가
FOODS.appendChild(NEW_LI);

// removeChild(노드) : 해당 부모노드의 자식노드를 삭제
FOODS.removeChild(NEW_LI);

// insertBefore(새로운노드, 기준노드) : 해당 부모노드의 자식인 기준노드의 앞에 새로운 노드를 추가
FOODS.insertBefore(NEW_LI, SICK);