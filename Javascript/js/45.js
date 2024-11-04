// promise객체
// ------------

function iAmSleep(flg) {
    return new Promise((resolve, reject) => {
        if(flg) {
            resolve('sucess');
        } else {
            reject('fail');
        }
    });
}

iAmSleep(false)
.then(data => console.log(data))
.catch(error => console.error(error))
.finally(console.log('finally'))
;

// // 콜백지옥
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         },1000);
//     },2000);
// },3000);

// // 프로미스 객체 생성
// function iAmSleepy (str, ms) {
//     return new Promise((resolve, reject) => {
//         setTimeout(() => {
//             console.log(str);
//             resolve();
//         }, ms)
//     });
// }

// iAmSleepy('A', 3000)
// .then(() => iAmSleepy('B',2000))
// .then(() => iAmSleepy('C',1000))