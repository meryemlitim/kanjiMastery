<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kanji Recognizer</title>
  <script src="https://www.chenyuho.com/project/handwritingjs/handwriting.canvas.js"></script>
  <script src="script.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-center p-5">
 <div class="flex gap-20 justify-center align-center">
   <div class="flex flex-col ">
    <h2 class="text-2xl font-semibold mb-2">🎴 Draw a Kanji Below</h2>

    <canvas 
      id="canvas" 
      width="500" 
      height="300" 
      class="border-2 border-black cursor-crosshair my-2 mx-auto"
    ></canvas>
  
    <div class="my-4 space-x-4">
      <button 
        onclick="recognizeKanji()" 
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
      >
        Recognize
      </button>
      <button 
        onclick="eraseAll()" 
        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition"
      >
        Erase
      </button>
    </div>
   </div>
  
   <div class="">
    <h3 class="text-xl font-semibold mt-6 mb-2">🈶 Recognized Kanji: <span id="result" class="font-bold"></span></h3>
  
    <div id="reading" class="mt-5 text-lg leading-relaxed text-left"></div>
   </div>

 </div>
</body>
</html>
<script>
    const canvas = new handwriting.Canvas(document.getElementById("canvas"), 3);
canvas.setLineWidth(5);

// Set recognition options
canvas.setOptions({
  language: "ja", // Japanese
  numOfReturn: 1
});

// Handle recognition result
canvas.setCallBack(function (data, err) {
  if (err) {
    alert("Recognition error");
    return;
  }

  const kanji = data;
  document.getElementById("result").innerText = kanji;

  fetch(`https://kanjiapi.dev/v1/kanji/${kanji}`)
    .then(res => res.json())
    .then(info => {
      document.getElementById("reading").innerHTML = `
        <strong>Kanji:</strong> ${info.kanji}<br>
        <strong>JLPT:</strong> N${info.jlpt}<br>
        <strong>Meanings:</strong> ${info.meanings.join(', ')}<br>
        <strong>Onyomi:</strong> ${info.on_readings.join(', ') || 'N/A'}<br>
        <strong>Kunyomi:</strong> ${info.kun_readings.join(', ') || 'N/A'}<br>
        <strong>Grade:</strong> ${info.grade || 'N/A'}
      `;
    })
    .catch(() => {
      document.getElementById("reading").innerText = "❌ Kanji info not found.";
    });
});

let paintMode = false;
let x = 0, y = 0;

document.onmousemove = function (e) {
  x = e.clientX;
  y = e.clientY;
};

document.addEventListener("keydown", event => {
  if (event.code === "KeyP" && !paintMode) {
    paintMode = true;
    document.getElementById("paintMode").innerText = "ON";
    sendMouseEvent("mousedown");
  }
});

document.addEventListener("keyup", event => {
  if (event.code === "KeyP" && paintMode) {
    paintMode = false;
    document.getElementById("paintMode").innerText = "OFF";
    sendMouseEvent("mouseup");
  }
});

function sendMouseEvent(eventName) {
  const element = document.getElementById("canvas");
  const clickEvent = new MouseEvent(eventName, {
    view: window,
    bubbles: true,
    cancelable: true,
    clientX: x,
    clientY: y
  });
  element.dispatchEvent(clickEvent);
}

// Button function to recognize kanji
function recognizeKanji() {
  canvas.recognize();
}


function eraseAll() {
  canvas.erase();
  document.getElementById("result").innerText = "";
  document.getElementById("reading").innerHTML = "";
}

</script>
