<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <title>Merak GP</title>
</head>
<body>
    <div class="root">
        <!-- ヘッダー -->
        <header class="header">
            <div class="header_text">Merak GP</div>
        </header>
        <main>
            <!-- 天気の情報 -->
            <section class="weather_section">
                <div class="weather_view_warapper">
                    <div class="today_data_box today_weather_box">
                        <img id="weather-icon" class="weather_icon">
                        <div class="weather_sub_text">
                            <div id="max_temp" class="temp_text">取得中...</div>
                            <div id="min_temp" class="temp_text">取得中...</div>
                        </div>
                    </div>
                    <div class="today_data_box today_temp_box">
                        <div id="current_temp" class="current_temp_text">取得中...</div>
                        <div class="weather_sub_text">
                            <div id="humidity_temp" class="humidity temp_text">取得中...</div>
                        </div>
                    </div>
                </div>

                <section class="calendar_container" id="calendarContainer">
                    <button id="prevday">＜</button>
                    <input type="date" id="currentMonth">
                    <button id="nextday">＞</button>
                    <div id="calendar" style="display: none;"></div>
                </section>
            </section>
            <!-- 生活記録表 -->
            <section class="log_section">
                <div class="log_view_warapper">
                    <div class="log_icon_btn" id="up_btn">↑</div>
                    <ul class="log_list" id="task_list">
                        <!-- ここに追加 -->
                    </ul>
                    <div class="log_icon_btn" id="down_btn">↓</div>
                 </div>
            </section>
            <!-- 登録の部分 -->
            <section class="input_section">
                <div class="input_warapper">
                    <!-- フォーム -->
                    <form action="DB/add_todo.php" method="post" class="input_form">
                        <div class="input_flex">
                            <div class="time_box">
                                <label class="input_label" for="time">時間</label>
                                <input type="time" id="input_time" name="time" required>
                            </div>
                            <div class="date_box">
                                <label class="input_label" for="date">日付</label>
                                <input type="date" id="input_date" name="date" required>
                            </div>
                        </div>
                        <div class="deta_box">
                            <label class="input_label" for="detail">詳細</label>
                            <textarea id="input_detail" name="detail" maxlength="60" required></textarea>
                        </div>
                        <button id="regist_button" type="submit">登録</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
    <!-- jQueryとjQuery UIの読み込み -->
    <script src="js/weather.js"></script>
    <script src="js/script.js"></script>
</body>
</html>