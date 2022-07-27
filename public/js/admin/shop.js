


// 顧客詳細画面でタブを押したときの処理
$(".shopShowTab").click(function() {
  // 何個目をクリックしたか
  var indexTab = $(".shopShowTab").index(this);
  console.log(indexTab)
  // タブをループしてactiveクラスを付け替える
  $(".shopShowTab").each(function(i, elem) {
    if(i == indexTab){
      $(this).addClass("active");
    }else{
      $(this).removeClass("active");
    }
  });

  // クリックしたタブの詳細要素だけ表示させる
  $(".shopShowDetail").each(function(di, elem) {
    if(di == indexTab){
      $(this).fadeIn('200', function() {});
    }else{
      $(this).hide();
    }
  });
});