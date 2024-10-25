// --------------
// 배열
// 
// ----------
const ARR1 = [1, 2, 3, 4, 5, 6, 7, 8 ,9] ;

// 배열에서 새로운 요소 추가
// 원본배열의 마지막 요소를 추가, 리턴은 변경된 length
ARR1.push(10);

// 배열의 길이 획득
console.log(ARR1.length)

// isArray()
// 배열인지 아닌지 차크s
console.log(Array.isArray(ARR1));       //true
console.log(ARrr.isArry(1));      //false