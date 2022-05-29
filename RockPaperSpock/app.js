let userScore = 0;
let computerScore = 0;
const userScore_span = document.getElementById("user-score");
const computerScore_span = document.getElementById("comp-score");
const scoreBoard_div = document.querySelector(".score-board");
const result_p = document.querySelector(".result > p");
const rock_div = document.getElementById("r");
const paper_div = document.getElementById("p");
const scissors_div = document.getElementById("k");
const lizard_div = document.getElementById("l");
const spock_div = document.getElementById("s");

function getComputerChoice(){
    const choices = ['r', 'p', 'k', 'l', 's']
    const randomNumber = Math.floor(Math.random()*5);
    return choices[randomNumber];
}

function convertToWord(letter){
    if(letter === "r") return "Rock";
    if(letter === "p") return "Paper";
    if(letter === "k") return "Scissors";
    if(letter === "l") return "Lizard";
    return "Spock";
}

function win(userChoice, computerChoice){
    userScore++;
    userScore_span.innerHTML = userScore;
    computerScore_span.innerHTML = computerScore;
    result_p.innerHTML = `${convertToWord(userChoice)} beats ${convertToWord(computerChoice)}. You win!`;
} 

function draw(userChoice, computerChoice){
    result_p.innerHTML = `${convertToWord(userChoice)} equals ${convertToWord(computerChoice)}. It's a draw.`;
}

function lose(userChoice, computerChoice){
    computerScore++;
    computerScore_span.innerHTML = computerScore;
    userScore_span.innerHTML = userScore;
    result_p.innerHTML = `${convertToWord(userChoice)} loses to ${convertToWord(computerChoice)}. You lose...`;
}

function game(userChoice){
    const computerChoice = getComputerChoice();
    switch(userChoice + computerChoice){
        case "rk":
        case "rl":
        case "pr":
        case "ps":
        case "kp":
        case "kl":
        case "lp":
        case "ls":
        case "sr":
        case "sk":
            win(userChoice, computerChoice);
            break;
        case "rr":
        case "kk":
        case "pp":
        case "ll":
        case "ss":
            draw(userChoice, computerChoice);
            break;
        case "kr":
        case "lr":
        case "rp":
        case "sp":
        case "pk":
        case "lk":
        case "pl":
        case "sl":
        case "rs":
        case "ks":
            lose(userChoice, computerChoice);
            break;
    }
}

function main() {
    rock_div.addEventListener('click', function(){
        game("r");
    })
    paper_div.addEventListener('click', function(){
        game("p");
    })
    scissors_div.addEventListener('click', function(){
        game("k");
    })
    lizard_div.addEventListener('click', function(){
        game("l");
    })
    spock_div.addEventListener('click', function(){
        game("s");
    })
}

main();