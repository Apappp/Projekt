const preG = document.querySelector('.pregame');
const gameBox = document.querySelector('.game');
const text = document.querySelector('.game .text');
const author = document.querySelector('.game .author');
const inputText = document.querySelector('.textInput');
const timer = document.querySelector('.gameStats .time span');
const wpm = document.querySelector('.gameStats .wpm span');
let currentLetter = 0;
let mistakes = 0;
let currentTime = 0;

function preGame(){
    preG.style.opacity = "0";
    setTimeout(()=>{preG.style.display = "none";
        gameBox.style.display = "flex";
    }, 500);
    game();
}

function game(){
    getRandomQuote();
    document.addEventListener("keydown", () => {inputText.focus();});
    inputText.addEventListener("input", checkLetter);
    countdown();
    const timeInterval = setInterval(()=>{wpm.innerHTML = Math.floor(countWpm())}, 3000);
}

const RANDOM_QUOTE_API_URL = 'https://api.quotable.io/random';

async function getRandomQuote() {
    const request = new Request(RANDOM_QUOTE_API_URL);
    const response = await fetch(request);
    const quote = await response.json();
    splitQuote(quote.content);
    author.innerHTML = quote.author;
}

function splitQuote(quote){
    quote.split("").forEach(span => {
        let line = `<span>${span}</span>`;
        text.innerHTML += line;
    });
    text.innerHTML += "<span> </span>";
}

function checkLetter(){
    const characters = text.querySelectorAll("span");
    let typedLetter = inputText.value.split("")[currentLetter];
    if(typedLetter == null){
        characters[currentLetter].classList.remove("active");
        currentLetter--;
        characters[currentLetter].classList.remove("correct", "incorrect");
    }
    else {
        if(characters[currentLetter].innerText == typedLetter)
            characters[currentLetter].classList.add("correct");
        else{
            mistakes++;
            characters[currentLetter].classList.add("incorrect");
        }  
        characters[currentLetter].classList.remove("active");
        currentLetter++;
    }
    characters[currentLetter].classList.add("active");

}

function countWpm() {
    return (((currentLetter + 1) / 5) - mistakes) / (currentTime / 60);
}

function countdown() {
    let timeLeft = 60;
    const timeInterval = setInterval(() => {
        timer.textContent = timeLeft;
        // wpm.innerHTML = Math.floor(countWpm());
        if (timeLeft<=0)
            clearInterval(timeInterval);
        else{
            timeLeft--;
            currentTime++;
        }
        console.log(currentTime, currentLetter)
    }, 1000);
    
}



