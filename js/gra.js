const preG = document.querySelector('.pregame');
const gameBox = document.querySelector('.game');
const text = document.querySelector('.game .text');
const author = document.querySelector('.game .author');
const inputText = document.querySelector('.textInput');
const timer = document.querySelector('.gameStats .time span');
let currentLetter = 0;
let mistakes = 0;

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

function countdown() {
    let start = Date.now();
    setInterval(() => {
        let timeLeft = Math.floor(Date.now - start);
        timer.innerHTML = timeLeft;
    }, 2000);
    
}



