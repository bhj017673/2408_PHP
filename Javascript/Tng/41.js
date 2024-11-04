function clock () {
    const NOW = new Date();
    const addLpadZero = (num, length) =>  {
        return String(num).padStart(length, '0')
    }
    
    const HOUR = addLpadZero(NOW.getHours(),2);
    const MINUTES = addLpadZero(NOW.getMinutes(),2);
    const SECOND = addLpadZero(NOW.getSeconds(),2);
    
    const AM = ('오전'+HOUR+':'+MINUTES+':'+SECOND);
    const PM = ('오후' + addLpadZero(HOUR - 12, 2) + ':' + MINUTES + ':' + SECOND);

    const TIME = document.querySelector('.time');
        if (HOUR <= 12 ) {
            TIME.innerHTML = AM;
        }else {
            TIME.innerHTML = PM;
        }
}

clock();

let TIME_INTERVAL = setInterval(clock,1000);

const STOP = document.querySelector('#stop');
STOP.addEventListener('click',btn_stop);

const RESTART = document.querySelector('#restart');
RESTART.addEventListener('click', btn_restart);

function btn_stop() {
    clearInterval(TIME_INTERVAL);
    TIME_INTERVAL = null;  
}

clock();
function btn_restart() {
    if (!TIME_INTERVAL) {
        TIME_INTERVAL = setInterval(clock,1000);
    }

}



// let intervalId = setInterval(clock, 1000);
// let isRunning = true;

// function startStopClock() {
//     const toggleButton = document.getElementById("toggleButton");

//     if (isRunning) {
//         clearInterval(intervalId);  // 시계를 멈춤
//         toggleButton.innerText = "시작";
//     } else {
//         intervalId = setInterval(clock, 1000);  // 시계를 다시 시작
//         toggleButton.innerText = "멈춤";
//     }

//     isRunning = !isRunning;  // 상태 전환
// }

// document.getElementById("toggleButton").addEventListener("click", startStopClock);

// const STOP = setInterval(clock,1000);
// const RESTART = true;

// function stopClock() {
//     const STOP = document.querySelector('#stop');
    
//     if (RESTART) {
//         clearInterval(STOP);
//     } else {
//         STOP = setInterval(clock, 1000);

//     }
// }

// function startStopClock() {
//     const toggleButton = document.getElementById("toggleButton");

//     if (isRunning) {
//         clearInterval(intervalId);  // 시계를 멈춤
//         toggleButton.innerText = "시작";
//     } else {
//         intervalId = setInterval(clock, 1000);  // 시계를 다시 시작
//         toggleButton.innerText = "멈춤";
//     }

//     isRunning = !isRunning;  // 상태 전환
// }

// document.getElementById("toggleButton").addEventListener("click", startStopClock);
//     // (()=> {
    //     const TIME = document.createElement('p')
    //     TIME.innerHTML = AM;
    //     document.body.appendChild(TIME);
    // })();


// function CLOCK () {
//     const NOW = new Date();
//     const addLpadZero = (num, length) =>  {
//         return String(num).padStart(length, '0')
//     }

//     const HOUR = addLpadZero(NOW.getHours(),2);
//     const MINUTES = addLpadZero(NOW.getMinutes(),2);
//     const SECOND = addLpadZero(NOW.getSeconds(),2);

//     if (HOUR <= 12 ) {
//         P.innerHTML = AM;
//     }else {
//         P.innerHTML = PM;
//     }

//     const FOMAT_DATE = `${HOUR}:${MINUTES}:${SECOND}`;
//     document.getElementById('clock').textContent = FOMAT_DATE;
//     const T = document.createElement('T');
//     T.innerHTML = FOMAT_DATE;
//     document.body.appendChild(T); 
// }

// const clock= function () {
//     const now = new Date()
//     const hours = now.getHours()
//     const minutes = now.getMinutes()
//     const seconds = now.getSeconds()
//     const ampm = ''
//     if (hours > 12) {
//       hours -= 12
//       ampm = '오후'
//     } else {
//       ampm = '오전'
//     }
//     if (hours < 10) {
//       hours = '0' + hours
//     }
//     if (minutes < 10) {
//       minutes = '0' + minutes
//     }
//     if (seconds < 10) {
//       seconds = '0' + seconds
//     }
//     document.querySelector('#time').innerHTML = ampm + hours + ":" + minutes + ":" + seconds
//   }
//   setInterval(clock, 1000) 