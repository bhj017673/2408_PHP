// --------------
// 배열
// 
// ----------
const ARR1 = [1, 2, 3, 4, 5, 6, 7, 8 ,9] ;
const ARR2 = new Array(1,2,3,4,5);

// 배열에서 새로운 요소 추가
// 원본배열의 마지막 요소를 추가, 리턴은 변경된 length, 원본이 변경된다
ARR1.push(10);
ARR1.push(20, 30 ,50);

// 마지막 방번호에 숫자넣기
ARR1[ARR1.length] = 100;

// 배열의 길이 획득
console.log(ARR1.length)

// isArray()
// 배열인지 아닌지 차크s
console.log(Array.isArray(ARR1));       //true
console.log(Array.isArray(1));      //false

// Array.ARR1.isArray(); 사용불가


// indexOf()
// 배열에서 특정 요소를 검색하고, 해당 인덱스를 반환

let i = ARR1.indexOf(4);
console.log(i);

// includes()
// 배열의 특정요소의 존재여부를 체크, boolean 리턴
let arr1 = ['홍길동', '갑순이', '갑돌이'];
let boo = arr1.includes('갑순이');
console.log(boo);

// 배열복사
// 객체는 기본적으로 얕은복사가 되므로 딥카피를 하기 위해서는 spread operator를 이용

// 얕은복사
const COPY_ARR1 = ARR1;

COPY_ARR1.push(9999);

// 깊은복사
 const COPY_ARR2 = [...ARR1];
COPY_ARR2.push(8888);

// pop()
// 원본배열의 마지막 요소를 제거, 제거된 요스를 반환, 원본변경
const ARR_POP = [1,2,3,4,5];
let result_pop = ARR_POP.pop();
console.log(result_pop);

// unshift()
// 원본배열의 첫번째 요소를 추가, 변경된 length반환, 원본변경
const ARR_UNSHIFT = [1,2,3,4];
let resultUnshift = ARR_UNSHIFT.unshift(100);
console.log(resultUnshift);
ARR_UNSHIFT.unshift(200,300,400); // 여러개도 추가가능
console.log(resultUnshift);

// shift()
// 원본 배열의 첫번째 요소를 제거, 제거된 요소를 반환, 원본변경
// 제거할 요소가 없으면 undefind를 반환

const ARR_SHIFT = [1,2,3,4];
let resultShift = ARR_SHIFT.shift();
console.log(resultShift);

// splice()
// 요소를 잘라서 자른 배열을 반환, 원본변경
let arrSplice = [1,2,3,4,5];
let resultSplice = arrSplice.splice(2);
console.log(resultSplice);
console.log(arrSplice);
//  시작을 음수로 할경우
arrSplice = [1,2,3,4,5];
resultSplice = arrSplice.splice(-2);
console.log(resultSplice);
console.log(arrSplice);
// start, count 를 모두 세팅할경우
arrSplice = [1,2,3,4,5];
resultSplice = arrSplice.splice(1,2);
console.log(resultSplice);
console.log(arrSplice);

//배열의 특정위치에 새로운 요소를 추가
arrSplice = [1,2,3,4,5];
resultSplice = arrSplice.splice(2,0,999);
console.log(resultSplice);
console.log(arrSplice);

// 배열에서 특정요소를 새로운 요소로 변경
arrSplice = [1,2,3,4,5];
resultSplice = arrSplice.splice(2,1,999);
console.log(resultSplice);
console.log(arrSplice);

// join()
// 배열의 요소들을 특정 구분자로 연결한 문자열을 반환]
// php의 explode와 동일
let arrJoin = [1,2,3,4,5];
let resultJoin = arrJoin.join(' , ');
console.log(resultJoin);
console.log(arrJoin);

// sort()
// 배열의 요소를 오름차순으로 정렬
// 파라미터를 전달하지 않을경우에, 문자열로 변환 후에 정렬
let arrSort = [5,6,7,3,1,8,20];
// let resultSort = arrSort.sort();
let resultSort = arrSort.sort((a,b)=>a-b);
console.log(arrSort);
console.log(resultSort);

// map()
// 배열의 모든 요소에 대해서 콜백함수를 반복실행한 후, 그 결과를 새로운 배열로 반환
let arrMap = [1,2,3,4,5,6,7,8,9,10];
let resultMap = arrMap.map(num => {
    if(num %3 === 0) {
        return '짝';
    }else {
        return num;
    }
});
console.log(resultMap);
console.log(arrMap);

function myCallback (a,b) {
    return a + b;
}

function test(callback, flg) {
    if(flg) {
        console.log(callback());
    }else {
        console.log('콜백 실행 안됨');
    }
}

// map의 콜백 로직

const TEST = {
    entity: [1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9 ,10 ]
    ,length: 10
    ,map: function (callback) {
        let resultArr = [];

        for(let i = 0; i < this.entity.length; i++) {
            resultArr[resultArr.length] = callback(this.entity[i]);
        }
        return resultArr;
    }
}

let resultTest = TEST.map(testCallback);

function testCallback(num) {
    if (num % 3 ===0) {
        return '짝';
    } else {
        return num;
    }
}

// filter()
// 배열의 모든요소에 대해 콜백함수를 반복 실행하고, 조건에 맞는 요소만 배열로 반환
let arrFilter = [1,2,3,4,5,6,7,8,9,10];
let resultFilter = arrFilter.filter(num=> num% 3 === 0);

let resultFilter2 = arrFilter.filter(num=> {
    if (num% 3 === 0 || num % 2 === 0) {
        return true;
    } else {
        return false;
    }
});

// some()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고
// 조건에 맞는 만족하는 결과가 하나라도 있으면 true,
// 만족하는 결과가 하나도 없으면 false를 리턴

let arrSome = [1,2,3,4,5];
let resultSome = arrSome.some(num => num ===5);
console.log(resultSome);

// every()
// 배열의 모든 요소에 대해 콜백 함수를 반복실행하고, 
// 조건에 모든 결과가 만족하면 true, 
// 하나라도 만족하지않으면 false를 리턴

let arrEvery = [1,2,3,4,5];
let resultEvery = arrEvery.every(num => num <= 5);
console.log(resultEvery);


//foreach()
// 배열의 모든요소에 대해 콜백함수를 반복 실행

let arrForeach = [1,2,3,4,5];
arrForeach.forEach((val, idx) => {
    // console.log(idx + ' : ' + val);
    console.log(`${idx} : ${val}`)
});