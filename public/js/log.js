

$(function() {
  $('#log_date').change(function() {
    check_date()
  });
  $('#entry_time').change(function() {
    check_dive_entry_time()
  });
  $('#exit_time').change(function() {
    check_dive_entry_time()
  });
  $('#swim_time').change(function() {
    check_dive_swim_time()
  });


});


function check_date(){
  var setDate = new Date($('#log_date').val());
  const jstNow = new Date(Date.now() + ((new Date().getTimezoneOffset() + (9 * 60)) * 60 * 1000));

  if(jstNow < setDate){
    $('#log_date').addClass('error')
    $('#log_date_err_msg').text("未来日は設定できません");
    $('#log_date_err_msg').show('500', function() {});
    return true
  }else{
    $('#log_date').removeClass('error')
    $('#log_date_err_msg').hide('500', function() {});
    return false
  }
}


function check_dive_entry_time(){
  var startTime = $('#entry_time').val();
  // 開始時間がなければ終了
  if(startTime == ''){
    return false
  }

  // 終了時間がない、もしくは終了時間が開始時間よりも前の場合、開始時間と同じ時間を終了時間にする
  var endTime = $('#exit_time').val();
  if(endTime == '' || startTime > endTime ){
    endTime = startTime
    $('#exit_time').val(endTime)
  }

  // 潜水時間を計算して出力
  const wd = "2000/01/01";
  const startDate = new Date(`${wd} ${startTime}`);
  const endDate = new Date(`${wd} ${endTime}`);
  elapseMs  = endDate - startDate
  var swimTime = msToTimeString(elapseMs)
  $('#swim_time').val(swimTime)

  check_dive_swim_time()
}

//ミリ秒から時分文字列(hh:mm)を作成して返す
function msToTimeString(ms) {
  const hour = Math.floor(ms / 3600000);
  const minute = Math.floor((ms - 3600000 * hour) / 60000);
  const hh = ("00" + hour).slice(-2);
  const mm = ("00" + minute).slice(-2);
  return `${hh}:${mm}`;
}



function check_dive_swim_time(){
  var startTime = $('#entry_time').val();
  var endTime = $('#exit_time').val();
  const wd = "2000/01/01";
  const startDate = new Date(`${wd} ${startTime}`);
  const endDate = new Date(`${wd} ${endTime}`);

  // 差分を確認
  var elapseMs  = endDate - startDate
  var correctSwimTime = msToTimeString(elapseMs)
  var swimTime = $('#swim_time').val()
  if(correctSwimTime == swimTime){
    $('#swim_time').removeClass('error')
    $('#swim_time_err_msg').hide('500', function() {});

    return true
  }else{
    $('#swim_time').addClass('error')
    $('#swim_time_err_msg').text("潜水時間が計算にありません");
    $('#swim_time_err_msg').show('500', function() {});
    return false
  }
}




