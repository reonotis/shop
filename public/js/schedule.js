
$(function() {
  $('#calendar-select').change(function() {
    window.location.href = "/diving/admin/scheduleMonth/" + $(this).val();
  });

  // 日程の箱をクリックしたとき
  $('.day-content').click(function() {
    openCreateForm($(this).attr('id'))
  });

  $('#schedule-create-form-mask').click(function() {
    closeScheduleCreateForm()
  });

  // スケジュールをクリックしたとき
  $('.calendar-schedule').click(function(event) {
    event.stopPropagation() //  親要素のonclickイベントを中止する
    openScheduleDetail($(this).attr('id'))
  })

  $('.schedule-detail-mask').click(function(event) {
    event.stopPropagation() //  親要素のonclickイベントを中止する
    closeScheduleDetailForm($(this).attr('id'))
  });

  // Schedule作成画面で参加者を検索したとき
  $('#search_customer').click(function(event) {
    event.stopPropagation() //  親要素のonclickイベントを中止する
    searchCustomer()
  })

  // 参加者追加buttonを押したとき
  $(document).on('click', '.selectionCustomerAppend', function() {
    CustomerAppend($(this).attr('id'))
  });

  // 参加者削除を押した時
  $(document).on('click', '.selectionCustomerRemove', function() {
    CustomerRemove($(this).attr('id'))
  });

});



function openCreateForm(date){
  $('#date').val(date);
  $('#schedule-create-form-area').fadeIn('500', function() {});
}

function closeScheduleCreateForm(){
  $("#schedule-create-form-area").fadeOut('500', function() {});
}

function openScheduleDetail(schedule_id){
  var id = schedule_id.replace("schedule_", "");
  $('#schedule_detail_mask').fadeIn('500', function() {});

  // 一度表示している内容をresetして、ローディングアニメーションを表示
  resetScheduleDetail()

  // スケジュールデータの取得
  getScheduleById(id).then(
    resolve => [setScheduleDetail(resolve.scheduleData)],
    reject => alert(reject.message),
  ).then(removeClassLoading);
}

function removeClassLoading(){
  $("#schedule_detail").removeClass("loading");
}

function closeScheduleDetailForm(schedule_id){
  $('#' + schedule_id).fadeOut('500', function() {});
}

function getScheduleById(id){
  return new Promise((resolve, reject) => {
    const request = new XMLHttpRequest();
    request.open("GET","/diving/admin/schedule/getScheduleById/" + id, true);
    request.send(null);
    request.onload = function (event) {
      // Ajaxが正常終了した場合
      if (request.readyState === 4 && request.status === 200) {
        // 該当するデータが無かった場合
        if(!request.responseText){
          reject({message:'該当するデータはありませんでした'});
        }
        const scheduleData = JSON.parse(request.responseText);
        resolve({
          message:'正常終了',
          scheduleData:scheduleData
        });
      }else{ // Ajaxが異常終了した場合
        reject({message:'エラーが発生し、データが取得できませんでした'});
      }
    };
    // Ajaxが異常終了した場合
    request.onerror = function (event) {
      reject({message:'エラーが発生し、データが取得できませんでした'});
    }
  });
}

function setScheduleDetail(scheduleData){
  console.log(scheduleData)

  // 日付を日本時間に修正
  var date = new Date(scheduleData.date);
  date = date.toLocaleString("ja-JP", { timeZone: "Asia/Tokyo" });
  date = new Date(date);
  var year = date.getFullYear();
  var month = date.getMonth() + 1;
  var day = date.getDate();

  $('#scheduleDataDate').text(year + '年' + month + '月' + day + '日')
  $('#scheduleDataTitle').text(scheduleData.title)
  insertHTML = ''
  insertHTML = insertHTML.concat('<div class="" >')
    insertHTML = insertHTML.concat('<div class="" >' + scheduleData.capacity + '名' + '</div>')
    insertHTML = insertHTML.concat('<div class="" >')
      scheduleData.customerSchedule.forEach(element => {
        insertHTML = insertHTML.concat('<div class="" >' + element['f_name'] + '</div>')
      });
    insertHTML = insertHTML.concat('</div>')
  insertHTML = insertHTML.concat('</div>')

  $('#scheduleDataCapacity').html(insertHTML)

}

function resetScheduleDetail(){

  // 日付を日本時間に修正
  $('#scheduleDataDate').text("")
  $('#scheduleDataTitle').text("")
  $('#scheduleDataCapacity').text("")

  $("#schedule_detail").addClass("loading");
}

function searchCustomer(){
  console.log("検索start")
  participant = $('#participant').val();
  getCustomers(participant).then(
    resolve => [setSelectionCustomers(resolve.customers)],
    reject => alert(reject.message),
  );
}

function getCustomers(participant){
  var selectedCustomerIdList = [];
  $(".selectedCustomer").each(function(i, element){
    selectedCustomerIdList.push(element.getAttribute('id').replace("selectedCustomerId_", ""));
  })

  return new Promise((resolve, reject) => {

    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/diving/admin/customerSearch/getCustomers/",
      type: 'POST',
      data: {
        'name': participant,
        'whereNotInList': selectedCustomerIdList,
        'limit': 10
      }
    })
    // Ajaxリクエストが成功した場合
    .done(function(data) {
      // 該当するデータが無かった場合
      if(data.length === 0){
        reject({message:'該当するデータはありませんでした'});
      }
      resolve({
        message:'正常終了',
        customers:data
      });
    })
    // Ajaxリクエストが失敗した場合
    .fail(function(data) {
      reject({message:'エラーが発生しました'});
    });
  });
}

function setSelectionCustomers(customers){
  $('#selectionCustomerArea').text("");
  customers.forEach(element => {
    content = "";
    content = content.concat("<div class='flex selectionCustomer' id='selectionCustomer_" + element["id"] + "' >");
      content = content.concat("<span id='selectionCustomerName_" + element["id"] + "' >" + element["f_name"] + "</span>");
      content = content.concat("<div class='selectionCustomerAppend' id='selectionCustomerAppend_" + element["id"] + "' >↑</div>");
    content = content.concat("</div>");
    $("#selectionCustomerArea").append(content);

  });
}

function CustomerAppend(CustomerAppendId){
  let idNumber = CustomerAppendId.replace("selectionCustomerAppend_", "");
  let selectionCustomerId = "#selectionCustomer_" + idNumber
  let selectionCustomerName = "#selectionCustomerName_" + idNumber
  let selectedCustomerId = "#selectedCustomerId_" + idNumber
  let customerName = $(selectionCustomerName).text()

  insertHTML = "";
  insertHTML = insertHTML.concat("<div class='flex selectedCustomer' id='selectedCustomerId_" + idNumber + "' style='display: none;' >");
    insertHTML = insertHTML.concat("<span>" + customerName + "</span>");
    insertHTML = insertHTML.concat("<div class='selectionCustomerRemove' id='selectionCustomerRemove_" + idNumber + "' >×</div>");
  insertHTML = insertHTML.concat("</div>");

  $(selectionCustomerId).fadeOut(200).queue(function() {
    this.remove();
  });

  $("#selectedCustomerArea").append(insertHTML);
  setTimeout(function(){
    $(selectedCustomerId).fadeIn(300, function() {});
  },400);

  if($("#participantList").val().length){
    ary = $("#participantList").val().split(',');
    ary.push(idNumber);
    $("#participantList").val(ary.toString());
  }else{
    $("#participantList").val(idNumber);
  }
}

function CustomerRemove(CustomerRemoveId){
  let idNumber = CustomerRemoveId.replace("selectionCustomerRemove_", "");
  let selectedCustomerId = "#selectedCustomerId_" + idNumber

  $(selectedCustomerId).fadeOut(200).queue(function() {
    this.remove();
  });
  ary = $("#participantList").val().split(',');
  index = ary.indexOf(idNumber);
  ary.splice(index, 1)

  $("#participantList").val(ary.toString());
}

