function onClickInputButton(elem) {
    const inputBoxElem = document.querySelector("#input-box");
    const inputBoxValue = inputBoxElem.value;
    document.querySelector(".to-do-list").innerHTML += `
    <li>
    <input
      type="checkbox"
      class="checkbox"
     
    />
    <span>${inputBoxValue}</span>
    <img
      src="trashcan.png"
      width="20"
      height="20"
      alt="my image"
     
    />
  </li>
    `;
    inputBoxElem.value = "";
  }
  
  function enterKey() {
    if (window.event.keyCode == 13) {
      onClickInputButton();
    }
  }
  
  function onClickDeleteButton(deleteElem) {
    deleteElem.parentElement.remove();
  }
  
  function onClickCheckbox(checkboxElem) {
    const liElem = checkboxElem.parentElement;
    const spanElem = liElem.querySelector("span");
    if (checkboxElem.checked) {
      spanElem.innerHTML = `<s>${spanElem.innerText}</s>`;
    } else {
      spanElem.innerHTML = `${spanElem.innerText}`;
    }
  }