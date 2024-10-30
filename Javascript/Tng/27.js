// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6,3,5,8,92,3,7,5,100,80,40];

const copyArr1 = [...ARR1];
console.log(copyArr1);
let resultcopyArr1 = copyArr1.sort((a,b)=>a-b);
console.log(resultcopyArr1);
//  중복제거
// foreach, includes 이용
let result1 =[];
copyArr1.forEach(val=>{
    if(!result1.includes(val)){
        result1.push(val);
    }
});
console.log(result1);
// filter, indexof 이용
let result2= copyArr1.filter((val, idx) => {
    return copyArr1.indexOf(val) === idx;
})

// set
let result3 = Array.from(new Set(copyArr1));

// 짝수와 홀수를 분리해서 각각 새로운 배열을 만들어주세요
const ARR2 = [5,7,3,4,5,1,2];

let resultArr2 = ARR2.filter(num=> num % 2 === 0);
let resultArr2_1 = ARR2.filter(num=> num % 2 === 1);
console.log(resultArr2);
console.log(resultArr2_1);

const ODD = ARR2.filter(num => num%2 !== 0);
const EVEN = ARR2.filter(num => num %2 === 0);
