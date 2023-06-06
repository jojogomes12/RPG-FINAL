function startCountdown() {
	let countdown = 3;
	const countdownElement = document.getElementById("countdown");
  
	const countdownInterval = setInterval(() => {
	  countdownElement.textContent = countdown;
  
	  if (countdown <= 0) {
		clearInterval(countdownInterval);
		countdownElement.style.display = "none";
		startGame();
	  }
  
	  countdown--;
	}, 1000);
  }
  
  
  
		  function initGame() {
			  const letters = "abcdefghijklmnopqrstuvwxyz";
			  let currentLetter;
			  let life = 100;
			  let monster_life = 100;
			  let time = 100;
			  let timerId;
  
			  function updateLetter() {
				  currentLetter = letters[Math.floor(Math.random() * letters.length)];
				  document.getElementById("letter").innerHTML = currentLetter;
			  }
  
			  function updateLife() {
				  life -= 10;
				  if (life < 0) {
					  life = 0;
					  gameOver();
				  }
				  document.getElementById("life").style.width = life + "%";
				  document.getElementById("you-lose").style.display = "block";
			  }
  
			  function monsterLife() {
				  monster_life -= 10;
				  document.getElementById("monster").style.width = monster_life + "%";
			  }
			  function youWin(){
				  alert("Você derrotou o inimigo parabens!.");
			  location.reload();
			  }
  
			  function updateTime() {
				  time -= 10;
				  if (time < 0) {
					  time = 0;
					  updateLife();
					  resetTime();
					  updateLetter();
				  }
				  document.getElementById("time").style.width = time + "%";
			  }
  
			  function resetTime() {
				  time = 100;
				  document.getElementById("time").style.width = time + "%";
			  }
  
			  function startTimer() {
				  timerId = setInterval(function() {
					  updateTime();
				  }, 200);
			  }
  
			  function stopTimer() {
				  clearInterval(timerId);
			  }
  
			  function gameOver() {
				  stopTimer();
				  document.getElementById("game-over").style.display = "block";
			  }
  
			  document.addEventListener("keydown", function(event) {
				  if (event.key === currentLetter) {
					  life += 10;
					  if (life > 100) {
						  life = 100;
					  }
					  document.getElementById("life").style.width = life + "%";
					  resetTime();
					  updateLetter();
					  document.getElementById("you-lose").style.display = "none";
					  monsterLife();
					  if(monster_life<=0){
						  youWin(); 
					  }
				  } else {
					  updateLife();
					  updateLetter();
				  }
			  });
  
			  updateLetter();
			  startTimer();
		  }