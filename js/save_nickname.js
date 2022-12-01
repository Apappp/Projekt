const nickHeader = document.querySelector('.profileBox .nickname h2');
const saveBtn = document.querySelector('.profileBox .nickname i');
const inputField = document.querySelector('.nicknameInput');
let atribute = "";

$(nickHeader).on('click', () => {
    nickHeader.style.display = "none";
    inputField.style.display = "block";
    saveBtn.style.display = "block";
})

