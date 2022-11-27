const preG = document.querySelector('.pregame');

function preGame(){
    preG.style.opacity = "0";
    setTimeout(()=>{preG.style.display = "none";}, 500);
}

const RANDOM_QUOTE_API_URL = 'https://api.quotable.io';

function getRandomQuote(){
    return fetch(RANDOM_QUOTE_API_URL + "/random")
        .then(response => response.json())
        .then(data => data.content)
}





