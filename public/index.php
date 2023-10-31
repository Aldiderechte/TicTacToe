<!DOCTYPE html>
<html>

<head>

    <style>
        body {
            text-align: center;
            background-color: #333;
            color: #fff;
        }

        table {
            border-collapse: collapse;
            width: 300px;
            height: 300px;
            margin: 0 auto;
            background-color: #333;
        }

        td {
            width: 100px;
            height: 100px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            border: 2px solid #000;
        }

        .cell {
            background-color: #555;
            color: #fff;
            cursor: pointer;
        }

        .x {
            color: deepskyblue;
        }

        .o {
            color: whitesmoke;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #555;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>

</head>

<body>

<h1>Tic-Tac-Toe</h1>

<table>
    <tr>
        <td class="cell" onclick="makeMove(this)"></td>
        <td class="cell" onclick="makeMove(this)"></td>
        <td class="cell" onclick="makeMove(this)"></td>
    </tr>
    <tr>
        <td class="cell" onclick="makeMove(this)"></td>
        <td class="cell" onclick="makeMove(this)"></td>
        <td class="cell" onclick="makeMove(this)"></td>
    </tr>
    <tr>
        <td class="cell" onclick="makeMove(this)"></td>
        <td class="cell" onclick="makeMove(this)"></td>
        <td class="cell" onclick="makeMove(this)"></td>
    </tr>
</table>

<p id="message"></p>
<button onclick="resetGame()">Zurücksetzen</button>

<script>
    let currentPlayer = "X";
    let gameOver = false;

    function makeMove(cell) {
        if (!cell.textContent && !gameOver) {
            cell.textContent = currentPlayer;
            cell.classList.add(currentPlayer.toLowerCase());
            currentPlayer = currentPlayer === "X" ? "O" : "X";
            checkForWinner();
        }
    }

    function checkForWinner() {
        const cells = document.querySelectorAll(".cell");
        const winningCombinations = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8],
            [0, 3, 6], [1, 4, 7], [2, 5, 8],
            [0, 4, 8], [2, 4, 6]
        ];

        for (const combination of winningCombinations) {
            const [a, b, c] = combination;
            if (cells[a].textContent && cells[a].textContent === cells[b].textContent && cells[b].textContent === cells[c].textContent) {
                document.getElementById("message").textContent = `${cells[a].textContent} hat Gewonnen`;
                gameOver = true;
                return;
            }
        }

        if ([...cells].every(cell => cell.textContent)) {
            document.getElementById("message").textContent = "Unentschieden";
            gameOver = true;
        }
    }

    function resetGame() {
        const cells = document.querySelectorAll(".cell");
        for (const cell of cells) {
            cell.textContent = "";
            cell.classList.remove("x", "o");
        }
        document.getElementById("message").textContent = "";
        gameOver = false;
        currentPlayer = "X";
    }
</script>

</body>

</html>
