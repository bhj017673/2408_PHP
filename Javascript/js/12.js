//  -----------
//  함수 선언식
// 호이스팅에 영향을 받는다
// 재할당이 가능하므로 함수명이 중복되지않게 조심해야함
//  -----------
console.log(mySum(4,5,7));

function mySum(a,b) {
    return a + b;
}

// function mySum(a,b,c) {
//     return a + b + c;
// }


// ----------
// 함수표현식
// 호이스팅에 영향을 받지 않는다
// 재할당을 방지한다
// ----------

// console.log(myPlus(4,5));

const myPlus = function(a,b) {
    return a+ b;
}

// -------------
//  화살표함수
// -------------
// 파라미터가 두개이상일경우(소괄호 생략불가)
const arrowFnc = (a,b) => a + b;
    function test1(a,b) {
        return a +b ;
    } 
// 파라미터가 1개일 경우( 소괄호 생략가능)
const arrowFnc2= a => a;
function  test2(a){
    return a;
}

// 파라미터가 없는 경우 (소괄호 생략 불가)
const arrowFnc3=()=>'test';
function test3() {
    return 'test';
}

// 처리가 여러줄일 경우
const arrowFnc4 = (a,b) => {
    if(a<b)  {
        return ' B 가 더 큼';
    } else {
        return 'A가 더큼';
    }
}
    






















