const textElement = document.getElementById('changingText');
const newTexts = ['Contact', 'Me', 'Please', 'Why don\'t you']; // Array of texts to cycle through
const colors = ['red', 'green', 'blue', 'purple']; // Array of texts to cycle through
let currentIndex = 0;

function changeText() {
  textElement.textContent = newTexts[currentIndex];
  textElement.style.color = colors[currentIndex];
  currentIndex = (currentIndex + 1) % newTexts.length; // Cycle through texts in the array
}

setInterval(changeText, 1000); // Call the changeText function every 1000 milliseconds (1 second)