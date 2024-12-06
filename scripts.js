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
    //alert("test");
    var timer = document.getElementById("game_timer");
    var score = document.getElementById("game_score");

    timer.innerHTML = "Click play to start";
    score.innerHTML = "Click play to start";

    //alert(sessionStorage.getItem(loggedInUser));
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
        setTimeout(timerFunction, 4000, "4");
        setTimeout(timerFunction, 5000, "3");
        setTimeout(timerFunction, 6000, "2");
        setTimeout(timerFunction, 7000, "1");
        setTimeout(gameIsOver, 8000,);
    }
}

function timerFunction(i)
{
    var timerText = document.getElementById("game_timer")
    
    timerText.innerHTML = i
}

function gameIsOver()
{
    timerFunction("Good Job, Click Restart To Play Again");
    gameOver = true;
    gameRunning = false;
    cps = score / 10;
    //callPhp();
    end();
    
}



function end()
{
    document.getElementById("game_username").setAttribute("value", sessionStorage.getItem(loggedInUser));
    document.getElementById("game_clicks").setAttribute("value", score);
    document.getElementById("game_cps").setAttribute("value", cps);
}



function highScoreLoad()
{
    document.getElementById("highscore_username").setAttribute("value", sessionStorage.getItem(loggedInUser));

    //alert(loggedInUser);
}
