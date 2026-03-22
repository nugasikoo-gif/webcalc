document.addEventListener("DOMContentLoaded", () => {
    const display = document.getElementById("display");
    const buttons = document.querySelectorAll("button");
    const historyList = document.getElementById("history-list");

    fetch("config.json")
        .then(response => response.json())
        .then(config => {
            document.title = config.title;
            document.querySelector("h1").textContent = config.title;
        });

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const value = button.getAttribute("data-value");

            if (button.classList.contains("clear")) {
                display.value = "";
            } else if (button.classList.contains("equals")) {
                calculate();
            } else {
                display.value += value;
            }
        });
    });

    function calculate() {
        const expression = display.value;
        if (!expression) return;

        fetch("calc.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "expression=" + encodeURIComponent(expression)
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                display.value = "Error";
            } else {
                display.value = data.result;
                updateHistory(data.history);
            }
        })
        .catch(() => display.value = "Error");
    }

    function updateHistory(history) {
        historyList.innerHTML = "";
        history.forEach(item => {
            const div = document.createElement("div");
            div.className = "history-item";
            div.textContent = `${item.expression} = ${item.result}`;
            historyList.appendChild(div);
        });
    }
});
