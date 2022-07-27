
$(window).scroll(function (){
  fadeAnime();
});

$(window).on('load', function(){
  fadeAnime();
});

$(function() {
  $('.flash-message-box-close').click(function() {
    // console.log($(this).parent())
    $(this).parent().slideUp(200);
  })
})


function fadeAnime(){
  $('.scrollSlideLeftTrigger').each(function(){ //scrollSlideLeftTriggerというクラス名が
    var elemPos = $(this).offset().top;//要素より
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight){
      $(this).addClass('scrollSlideLeft');// 画面内に入ったらscrollSlideLeftというクラス名を追記
    // }else{
    //   $(this).removeClass('scrollSlideLeft');// 画面外に出たらscrollSlideLeftというクラス名を外す
    }
  });

  $('.scrollSlideRightTrigger').each(function(){ //scrollSlideRightTriggerというクラス名が
    var elemPos = $(this).offset().top;//要素より
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight){
      $(this).addClass('scrollSlideRight');// 画面内に入ったらscrollSlideRightというクラス名を追記
    // }else{
    //   $(this).removeClass('scrollSlideRight');// 画面外に出たらfadeUpというクラス名を外す
    }
  });


}