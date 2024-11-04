function leftPadZero(target, length) {
    return String(target).padStart(length, '0');
}

function getDate () {
    const NOW = new Date();
    let hour = NOW.getHours(); //시간획득
    let minute = NOW.getMinutes(); //분획득
    let second = NOW.getSeconds(); //초획득
    let ampm = hour < 12 ? '오전' : '오후'; //오전, 오후
    let hour12 = hour < 13 ? hour : hour - 12; //시간(12시 포맷)

    let timeFormat = 
        `${ampm} ${leftPadZero(hour12, 2)}:${leftPadZero(minute, 2)}:${leftPadZero(second ,2)}`

    document.querySelector('#time').textContent = timeFormat;
}

(() => {
    getDate();
    let intervalId = null;
    intervalId = setInterval(getDate,997);  
// 재시작때문에 let사용 새로운 아이디를 담아야하는데 const는 재할당이 안되서 let으로 받아옴

// 멈춰버튼
document.querySelector('#btn-stop').addEventListener('click', () => {
    clearInterval(intervalId);
    intervalId = null;
}); 

// 재시작버튼
document.querySelector('#btn-restart').addEventListener('click', () => {
    if(intervalId === null) {
        intervalId = setInterval(getDate,500);
    }
})

})();


