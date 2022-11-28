const preG = document.querySelector('.pregame');
const gameBox = document.querySelector('.game');
const text = document.querySelector('.game .text');
const author = document.querySelector('.game .author');
const inputText = document.querySelector('.textInput');
const timer = document.querySelector('.gameStats .time span');
const wpm = document.querySelector('.gameStats .wpm span');
const acc = document.querySelector('.gameStats .acc span');
let currentLetter = 0;
let mistakes = 0;
let currentTime = 0;
let quoteLength = 0;
let gameEnded = false;
let quoteId = "";

function preGame(){
    preG.style.opacity = "0";
    setTimeout(()=>{preG.style.display = "none";
        gameBox.style.display = "flex";
    }, 500);
    game();
}

function game(){
    gameEnded = false;
    console.log(quoteId);
    getRandomQuote();
    document.addEventListener("keydown", () => {inputText.focus();});
    inputText.addEventListener("input", checkLetter);
    countdown();
    const timeInterval = setInterval(()=>{
        if(gameEnded == false){
            wpm.innerHTML = Math.floor(countWpm())
            acc.innerHTML = accuracy();
        }
        else {
            clearInterval(timeInterval);
        }
    }, 2000);
    if (gameEnded)
        tryAgain();
}

const RANDOM_QUOTE_API_URL = 'https://api.quotable.io/random';

async function getRandomQuote() {
    const request = new Request(RANDOM_QUOTE_API_URL);
    const response = await fetch(request);
    const quote = await response.json();
    splitQuote(quote.content);
    author.innerHTML = quote.author;
    quoteId = quote.id;
}

function splitQuote(quote){
    quote.split("").forEach(span => {
        let line = `<span>${span}</span>`;
        text.innerHTML += line;
        quoteLength++;
    });
    
    text.innerHTML += "<span> </span>";
}

function checkLetter(){
    console.log(currentLetter, quoteLength, gameEnded);
    if (gameEnded){
        
        return 0;
    }

    const characters = text.querySelectorAll("span");
    let typedLetter = inputText.value.split("")[currentLetter];
    if(typedLetter == null){
        characters[currentLetter].classList.remove("active");
        currentLetter--;
        if(characters[currentLetter].classList.contains("incorrect"))
            mistakes--;
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
    
    
    if (currentLetter == (quoteLength)){
        gameEnded = true;

    }
}

function countWpm() {
    return (((currentLetter - mistakes) / 5) / currentTime) * 60;
}

function countdown() {
    let timeLeft = 60;
    const timeInterval = setInterval(() => {
        if(gameEnded == true){
            clearInterval(timeInterval);
            return 0;
        }
            
        timer.textContent = timeLeft;
        if (timeLeft<=0){
            gameEnded = true;
            clearInterval(timeInterval);
        } 
        else{
            timeLeft--;
            currentTime++;
        }
    }, 1000);
}

function accuracy(){
    return 100-(Math.round((mistakes / (quoteLength + 1)) * 10000) / 100);
}

function tryAgain(){
    
}



