<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Web Calculator</h1>
    <div class="calculator">
        <input type="text" id="display" readonly>
        <div class="buttons">
            
            <button data-value="7">7</button>
            <button data-value="8">8</button>
            <button data-value="9">9</button>
            <button class="operator" data-value="-">-</button>
            
            <button data-value="4">4</button>
            <button data-value="5">5</button>
            <button data-value="6">6</button>
            <button class="operator" data-value="+">+</button>
            
            <button data-value="1">1</button>
            <button data-value="2">2</button>
            <button data-value="3">3</button>
            <button class="operator" data-value="/">/</button>
            
            <button data-value="0">0</button>
            <button data-value=".">.</button>
            <button class="clear" data-value="C">C</button>
            <button class="operator" data-value="*">*</button>
            <button class="equals" data-value="=">=</button>     
        
        </div>
    </div>

    <div class="history-panel">
        <h3>History</h3>
        <div id="history-list">
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
