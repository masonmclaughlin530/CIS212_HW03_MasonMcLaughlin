const loggedInUser = "usernamestored";

var gameOver = true;
var gameRunning = false;
var score;
var cps;

function loadIndex()
{
    //need to remove username
    sessionStorage.removeItem(loggedInUser);
}

function registerStart()
{
    sessionStorage.removeItem(loggedInUser);
}

function loadGame()
{
    alert("test");
    var timer = document.getElementById("game_timer");
    var score = document.getElementById("game_score");

    timer.innerHTML = "Click play to start";
    score.innerHTML = "Click play to start";
}

function clicks()
{
    if(gameRunning)
    {
        var scoreText = document.getElementById("game_score");
        score++;
        scoreText.innerHTML = score;
    }
}

function startGame()
{
    gameRunning = true;
}

function playGame()
{
    if(!gameRunning)
    {
        var scoreText = document.getElementById("game_score");
        scoreText.innerHTML = 0;
        score = 0;
        timerFunction("3")
        setTimeout(timerFunction, 1000, "2");
        setTimeout(timerFunction, 2000, "1");
        setTimeout(timerFunction, 3000, "Click!");
        setTimeout(startGame, 3000)
        setTimeout(timerFunction, 4000, "9");
        setTimeout(timerFunction, 5000, "8");
        setTimeout(timerFunction, 6000, "7");
        setTimeout(timerFunction, 7000, "6");
        setTimeout(timerFunction, 8000, "5");
        setTimeout(timerFunction, 9000, "4");
        setTimeout(timerFunction, 10000, "3");
        setTimeout(timerFunction, 11000, "2");
        setTimeout(timerFunction, 12000, "1");
        setTimeout(gameIsOver, 13000,);
    }
}

function timerFunction(i)
{
    var timerText = document.getElementById("game_timer")
    
    timerText.innerHTML = i
}

function gameIsOver()
{
    timerFunction("Good Job, Click Start To Play Again");
    gameOver = true;
    gameRunning = false;
    
}

//found this way on stack overflow 
//not sure if there was a better way, but this seems to work

function callPhp()
{
    //score is set
    //user is set
    //need clicks per second
    cps = score / 10;

    var php = new XMLHttpRequest();
    var url = "score.php"
    php.open("POST", 'score.php?score=' + score + '&cps=' + cps + '&username=' + sessionStorage.getItem(loggedInUser));
    php.send

    php.onload = function()
    {
        if (php.status == 200)
        {
            //complete no errors
            alert("No Error");

        }
        else
        {
            alert('ERROR');
        }
    }

    php.onprogress = function(event)
    {
        if(event.lengthComputable)
        {

        }
    }


    
}


function findHighScores()
{
    var phpHighscores = new XMLHttpRequest();

    phpHighscores.open('GET','highscores.php');

    var highscores = sessionStorage.getItem('highscores');

    var highscoreDisplay = document.getElementById("txt_highscores");

    highscoreDisplay.innerHTML = highscores;
}
