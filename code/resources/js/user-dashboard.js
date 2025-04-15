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

// Paint mode toggle with P key
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
