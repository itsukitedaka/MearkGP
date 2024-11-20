function getWeather() {
    // 現在の位置情報を取得
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            const apiKey = ''; //apiキー

            // 逆ジオコーディングを利用して都市名を取得
            $.ajax({
                url: `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`,
                method: "GET",
                success: function (data) {
                    const city = data.name;  // 都市名
                    const weather = data.weather[0].description;  // 天気の説明
                    const icon = data.weather[0].icon; //アイコン
                    const temp = data.main.temp;  // 気温
                    const temp_max = data.main.temp_max;  // 最高気温
                    const temp_min = data.main.temp_min;  // 最低気温
                    const humidity = data.main.humidity; //湿度
                    var img = document.getElementById('weather-icon');
                    img.src = "https://openweathermap.org/img/wn/" + icon + "@2x.png";
                    img.alt = data.weather[0].description;

                    // 取得した都市名と天気情報をHTMLに表示
                    //$('#weather').text(weather);
                    
                    $('#current_temp').text(`${temp} °C`);
                    $('#max_temp').text(`${temp_max} °C`);
                    $('#min_temp').text(`${temp_min} °C`);
                    $('#humidity_temp').text(`${humidity} %`);

                },
                error: function (error) {
                    console.error("天気情報の取得に失敗しました:", error);
                }
            });
        }, function (error) {
            console.error("位置情報の取得に失敗しました:", error);
        });
    } else {
        alert("位置情報がサポートされていません。");
    }
}

$(document).ready(function () {
    getWeather();
});
