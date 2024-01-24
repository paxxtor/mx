
<style>
    #puzzleContainer {
  display: flex;
  flex-wrap: wrap;
  width: 400px;
  height: 400px;
  margin-bottom: 20px;
}

.puzzlePiece {
  width: 100px;
  height: 100px;
  background-color: #f1f1f1;
  background-size: 400px 400px;
  cursor: pointer;
}

#puzzleContainer {
  display: flex;
  flex-wrap: wrap;
  width: 400px;
  height: 400px;
  margin-bottom: 20px;
}

.puzzlePiece {
  width: 133px;
  height: 133px;
  background-size: 400px 400px;
  cursor: pointer;
  background-size: cover;
  background: transparent;
}


</style>
<div class="page-body">
    <h1>Rompecabezas</h1>
    <canvas id="canvas"></canvas>


    <h1>Rompecabezas con 3 Imágenes</h1>
    <div id="puzzleContainer">
        <div class="puzzlePiece" ><img src="<?php echo base_url(); ?>public/uploads/rompe/1.png"></div>
        <div class="puzzlePiece" ><img src="<?php echo base_url(); ?>public/uploads/rompe/2.png"></div>
        <div class="puzzlePiece" ><img src="<?php echo base_url(); ?>public/uploads/rompe/3.png"></div>
    </div>

 


</div>
<script>
/*
const PUZZLE_HOVER_TINT = "#009900";
const img = new Image();
const canvas = document.querySelector("#canvas");
const stage = canvas.getContext("2d");
let difficulty = 5;
let pieces;
let puzzleWidth;
let puzzleHeight;
let pieceWidth;
let pieceHeight;
let currentPiece;
let currentDropPiece;
let mouse;
img.addEventListener("load", onImage, false);
img.src = "<?php echo base_url();?>public/uploads/rompe.jpg";

function initPuzzle() {
  pieces = [];
  mouse = {
    x: 0,
    y: 0
  };
  currentPiece = null;
  currentDropPiece = null;
  stage.drawImage(
    img,
    0,
    0,
    puzzleWidth,
    puzzleHeight,
    0,
    0,
    puzzleWidth,
    puzzleHeight
  );
  createTitle("Haz click para comenzar!");
  buildPieces();
}

function setCanvas() {
  canvas.width = puzzleWidth;
  canvas.height = puzzleHeight;
  canvas.style.border = "1px solid black";
}

function onImage() {
  pieceWidth = Math.floor(img.width / difficulty);
  pieceHeight = Math.floor(img.height / difficulty);
  puzzleWidth = pieceWidth * difficulty;
  puzzleHeight = pieceHeight * difficulty;
  setCanvas();
  initPuzzle();
}

function createTitle(msg) {
  stage.fillStyle = "#000000";
  stage.globalAlpha = 0.4;
  stage.fillRect(100, puzzleHeight - 40, puzzleWidth - 200, 40);
  stage.fillStyle = "#FFFFFF";
  stage.globalAlpha = 1;
  stage.textAlign = "center";
  stage.textBaseline = "middle";
  stage.font = "20px Arial";
  stage.fillText(msg, puzzleWidth / 2, puzzleHeight - 20);
}

function buildPieces() {
  let i;
  let piece;
  let xPos = 0;
  let yPos = 0;
  for (i = 0; i < difficulty * difficulty; i++) {
    piece = {};
    piece.sx = xPos;
    piece.sy = yPos;
    console.log(piece);
    pieces.push(piece);
    xPos += pieceWidth;
    if (xPos >= puzzleWidth) {
      xPos = 0;
      yPos += pieceHeight;
    }
  }
  document.onpointerdown = shufflePuzzle;
}

function shufflePuzzle() {
  pieces = shuffleArray(pieces);
  stage.clearRect(0, 0, puzzleWidth, puzzleHeight);
  let xPos = 0;
  let yPos = 0;
  for (const piece of pieces) {
    piece.xPos = xPos;
    piece.yPos = yPos;
    stage.drawImage(
      img,
      piece.sx,
      piece.sy,
      pieceWidth,
      pieceHeight,
      xPos,
      yPos,
      pieceWidth,
      pieceHeight
    );
    stage.strokeRect(xPos, yPos, pieceWidth, pieceHeight);
    xPos += pieceWidth;
    if (xPos >= puzzleWidth) {
      xPos = 0;
      yPos += pieceHeight;
    }
  }
  document.onpointerdown = onPuzzleClick;
}

function checkPieceClicked() {
  for (const piece of pieces) {
    if (
      mouse.x < piece.xPos ||
      mouse.x > piece.xPos + pieceWidth ||
      mouse.y < piece.yPos ||
      mouse.y > piece.yPos + pieceHeight
    ) {
      //PIECE NOT HIT
    } else {
      return piece;
    }
  }
  return null;
}

function updatePuzzle(e) {
  currentDropPiece = null;
  if (e.layerX || e.layerX == 0) {
    mouse.x = e.layerX - canvas.offsetLeft;
    mouse.y = e.layerY - canvas.offsetTop;
  } else if (e.offsetX || e.offsetX == 0) {
    mouse.x = e.offsetX - canvas.offsetLeft;
    mouse.y = e.offsetY - canvas.offsetTop;
  }
  stage.clearRect(0, 0, puzzleWidth, puzzleHeight);
  for (const piece of pieces) {
    if (piece == currentPiece) {
      continue;
    }
    stage.drawImage(
      img,
      piece.sx,
      piece.sy,
      pieceWidth,
      pieceHeight,
      piece.xPos,
      piece.yPos,
      pieceWidth,
      pieceHeight
    );
    stage.strokeRect(piece.xPos, piece.yPos, pieceWidth, pieceHeight);
    if (currentDropPiece == null) {
      if (
        mouse.x < piece.xPos ||
        mouse.x > piece.xPos + pieceWidth ||
        mouse.y < piece.yPos ||
        mouse.y > piece.yPos + pieceHeight
      ) {
        //NOT OVER
      } else {
        currentDropPiece = piece;
        stage.save();
        stage.globalAlpha = 0.4;
        stage.fillStyle = PUZZLE_HOVER_TINT;
        stage.fillRect(
          currentDropPiece.xPos,
          currentDropPiece.yPos,
          pieceWidth,
          pieceHeight
        );
        stage.restore();
      }
    }
  }
  stage.save();
  stage.globalAlpha = 0.6;
  stage.drawImage(
    img,
    currentPiece.sx,
    currentPiece.sy,
    pieceWidth,
    pieceHeight,
    mouse.x - pieceWidth / 2,
    mouse.y - pieceHeight / 2,
    pieceWidth,
    pieceHeight
  );
  stage.restore();
  stage.strokeRect(
    mouse.x - pieceWidth / 2,
    mouse.y - pieceHeight / 2,
    pieceWidth,
    pieceHeight
  );
}

function onPuzzleClick(e) {
  if (e.layerX || e.layerX === 0) {
    mouse.x = e.layerX - canvas.offsetLeft;
    mouse.y = e.layerY - canvas.offsetTop;
  } else if (e.offsetX || e.offsetX === 0) {
    mouse.x = e.offsetX - canvas.offsetLeft;
    mouse.y = e.offsetY - canvas.offsetTop;
  }
  currentPiece = checkPieceClicked();
  if (currentPiece !== null) {
    stage.clearRect(
      currentPiece.xPos,
      currentPiece.yPos,
      pieceWidth,
      pieceHeight
    );
    stage.save();
    stage.globalAlpha = 0.9;
    stage.drawImage(
      img,
      currentPiece.sx,
      currentPiece.sy,
      pieceWidth,
      pieceHeight,
      mouse.x - pieceWidth / 2,
      mouse.y - pieceHeight / 2,
      pieceWidth,
      pieceHeight
    );
    stage.restore();
    document.onpointermove = updatePuzzle;
    document.onpointerup = pieceDropped;
  }
}

function gameOver() {
  document.onpointerdown = null;
  document.onpointermove = null;
  document.onpointerup = null;
  initPuzzle();
}

function pieceDropped(e) {
  document.onpointermove = null;
  document.onpointerup = null;
  if (currentDropPiece !== null) {
    let tmp = {
      xPos: currentPiece.xPos,
      yPos: currentPiece.yPos
    };
    currentPiece.xPos = currentDropPiece.xPos;
    currentPiece.yPos = currentDropPiece.yPos;
    currentDropPiece.xPos = tmp.xPos;
    currentDropPiece.yPos = tmp.yPos;
  }
  resetPuzzleAndCheckWin();
}

function resetPuzzleAndCheckWin() {
  stage.clearRect(0, 0, puzzleWidth, puzzleHeight);
  let gameWin = true;
  for (piece of pieces) {
    stage.drawImage(
      img,
      piece.sx,
      piece.sy,
      pieceWidth,
      pieceHeight,
      piece.xPos,
      piece.yPos,
      pieceWidth,
      pieceHeight
    );
    stage.strokeRect(piece.xPos, piece.yPos, pieceWidth, pieceHeight);
    if (piece.xPos != piece.sx || piece.yPos != piece.sy) {
      gameWin = false;
    }
  }
  if (gameWin) {
    alert('Felicidades, has ganado!');
    setTimeout(gameOver, 500);
  }
}

function shuffleArray(o) {
  for (
    var j, x, i = o.length;
    i;
    j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x
  );
  return o;
}

function updateDifficulty(e) {
  difficulty = e.target.value;
  pieceWidth = Math.floor(img.width / difficulty);
  pieceHeight = Math.floor(img.height / difficulty);
  puzzleWidth = pieceWidth * difficulty;
  puzzleHeight = pieceHeight * difficulty;
  gameOver();
}
*/
/////////////////////////////////////////////////

let pieces = [];

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

function isSolved() {
  for (let i = 0; i < pieces.length; i++) {
    const piece = pieces[i];
    const correctX = i % 3;
    const correctY = Math.floor(i / 3);
    const currentX = piece.position().left / piece.width();
    const currentY = piece.position().top / piece.height();

    if (correctX !== currentX || correctY !== currentY) {
      return false;
    }
  }
  return true;
}

$(document).ready(function() {
  const puzzleContainer = $("#puzzleContainer");
  pieces = puzzleContainer.children(".puzzlePiece");
  shuffleArray(pieces);

  pieces.draggable({
    containment: "#puzzleContainer",
    snap: true,
    snapMode: "inner",
    snapTolerance: 10,
  });

  pieces.on("dragstop", function() {
    
  });
});


</script>