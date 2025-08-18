const fortunes = ["大吉", "中吉", "小吉", "凶", "大凶"];
const comments = {
  "大吉": "今日はいいことがあるかも！",
  "中吉": "まずまずの運勢です。",
  "小吉": "少しだけ良いことがあるかも。",
  "凶": "今日はあまり良くないかも。",
  "大凶": "最悪の日になるかも。"
};

function applyStyle(result) {
    if (result == "大吉") {//大吉を引いた場合
    $('#result').css("color", "gold");
    $('#container').css("background-color", "orange");
  } else if (result == "中吉") {//中吉を引いた場合
    $('#result').css("color", "silver");
    $('#container').css("background-color", "yellow");
  } else if (result == "小吉") {//小吉を引いた場合
    $('#result').css("color", "green");
    $('#container').css("background-color", "skyblue");
  } else if (result == "凶") {//凶を引いた場合
    $('#result').css("color", "gray");
    $('#container').css("background-color", "lightgreen");
  } else if (result == "大凶") {//大凶を引いた場合
    $('#result').css("color", "black");
    $('#container').css("background-color", "white");
  }
}

function drawOmikuji() {
  const today = new Date().toDateString();
  const lastDate = localStorage.getItem("OmikujiDate");
  const savedResult = localStorage.getItem("OmikujiResult");

  if (lastDate == today && savedResult) {
    // すでに今日のおみくじを引いている場合
    $("#result").hide().text(savedResult + "(今日はもう引いています！)").fadeIn(2000)
    applyStyle(savedResult.split(":")[0]);
    return;
  }

  //新しいおみくじを引く
  const result = fortunes[Math.floor(Math.random() * fortunes.length)];
  const message = result + ":" + comments[result];

  $('#result')
    .hide()
    .text(message)
    .fadeIn(3000);
  applyStyle(result);

  // 結果をローカルストレージに保存
  localStorage.setItem("OmikujiDate", today);
  localStorage.setItem("OmikujiResult", message);
}