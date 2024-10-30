let str = '문자열입니다.문자열입니다.';
let str2 = new String ('문자열입니다.');

let str3 = '문자' + '테스트' + str + '이었다.';
let str4 = `문자테스트${str}이었다.`
// length : 문자열의 길이를 반환
console.log(str.length);

// charAt(idx) : 해당인덱스의 문자를 반환
console.log(str.charAt(2));

// indexOf() : 문자열에서 해당 문자열을 찾아 최초의 인덱스를 반환
// 해당문자열이 없으면 -1 리턴
console.log(str.indexOf('자열'));
console.log(str.indexOf('자열',5));

// includes() : 문자열에서 해당 문자열의 존재여부 체크
console.log(str.includes('문자'));
console.log(str.includes('php'));

// replace() : 특정문자열을 찾아서 첫번째 문자열만 지정한 문자열로 치환한 문자열을 반환
 str = '문자열입니다.문자열입니다';
 console.log(str.replace('문자열', 'PHP')); //PHP입니다.문자열입니다.

// replaceAll() : 특정문자열을 찾아서 모두 지정한 문자열로 치환한 문자열을 반환
console.log(str.replaceAll('문자열', 'PHP')) // PHP입니다.PHP입니다.

// substring(statr, end) : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
// endIndex는 생략시 startIndex부터 끝까지의 문자열 반환
// **주의 : 비슷한 기능으로 String.substr()이 있으나 비표준이므로 사용을 지양할 것 **
str = '문자열입니다.문자열입니다.';
console.log(str.substring(1,3));

str = 'bearer: 34sdfagbasjujkfdks87asd8 ';
console.log(str.substring(8));

// split(seperator, limit) : 문자열을 separator 기준으로 잘라서 배열을 만들어 반환
str = '짜장면, 탕수육, 라조기, 짬뽕, 볶음밥';
let arrSplit = str.split(',', 2);
console.log(arrSplit);

// trim() : 좌우 공백 제거해서 반환
str = '                아아아 피곤하다  '
console.log(str.trim());

// toUpperCase(), toLowerCase() : 알파벳을 대/소문자로 변환해서 반환
str = 'aBcDeFg';
console.log(str)
console.log(str.toUpperCase());
console.log(str.toLowerCase());