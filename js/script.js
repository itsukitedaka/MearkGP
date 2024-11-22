$(document).ready(function () {
    let selectedDate;

    // localStorageから日付を取得し、無ければ本日の日付を使用
    const savedDate = localStorage.getItem("selectedDate");
    selectedDate = savedDate ? new Date(savedDate) : new Date();

    // 現在の日付または選択した日付を "currentMonth" に表示
    function updateCurrentMonthDisplay() {
        const dateStr = selectedDate.toISOString().split("T")[0];
        $("#currentMonth").val(dateStr); // input 要素の値を更新
    }
    updateCurrentMonthDisplay();

    // "currentMonth" をクリックしてカレンダーを表示/非表示
    $("#currentMonth").on("change", function () {
        const dateText = $(this).val();
        selectedDate = new Date(dateText);
        localStorage.setItem("selectedDate", dateText); // 選択した日付を保存
        loadTodos(selectedDate); // タスクリストを更新
    });

    // 前日・次日ボタンで日付を変更
    $("#prevday").click(function () {
        selectedDate.setDate(selectedDate.getDate() - 1);
        localStorage.setItem("selectedDate", selectedDate.toISOString().split("T")[0]);
        updateCurrentMonthDisplay();
        loadTodos(selectedDate);
    });

    $("#nextday").click(function () {
        selectedDate.setDate(selectedDate.getDate() + 1);
        localStorage.setItem("selectedDate", selectedDate.toISOString().split("T")[0]);
        updateCurrentMonthDisplay();
        loadTodos(selectedDate);
    });

    // 選択した日付のタスクリストを読み込む
    function loadTodos(date) {
        const formattedDate = date.toISOString().split("T")[0];
        
        $.post("DB/get_todos.php", { date: formattedDate }, function (data) {
            const tasks = JSON.parse(data);
            $("#task_list").empty(); // タスクリストをクリア

            if (tasks.length === 0) {
                $("#task_list").append("<div class='log_contents'>タスクがありません</div>");
            } else {
                tasks.forEach(task => {
                    $("#task_list").append(`<div class="log_contents">${task.times} - ${task.tasks}</div>`);
                });
            }
        });
    }

     // タスクのスクロール
    $("#up_btn").click(function () {
        const currentScroll = $("#task_list").scrollTop();
        $("#task_list").scrollTop(currentScroll - 30); // 上方向に30pxスクロール
    });

    $("#down_btn").click(function () {
        const currentScroll = $("#task_list").scrollTop();
        $("#task_list").scrollTop(currentScroll + 30); // 下方向に30pxスクロール
    });
    
    // 初期表示
    loadTodos(selectedDate);
});
