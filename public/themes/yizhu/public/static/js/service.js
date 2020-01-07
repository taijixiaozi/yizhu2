var websiteID = "4";

  var fileRandomFileUrl = "/";

  (function(window, $) {

    $(".shj_index_jsq_radio_bg").click(function() {

      var that = $(this).parent();

      $(that).siblings().find(".shj_index_jsq_ricon").removeClass("shj_index_jsq_ricon_check");

      $(that).find(".shj_index_jsq_ricon").addClass("shj_index_jsq_ricon_check");

      $(that).siblings('input').val($(that).attr("code"));

    });

    $(".shj_index_jsq_select_bg").click(function() {

      close_jsq_select();

      $(this).parent().css("border-color", "#75b43f");

      $(this).siblings(".shj_index_jsq_select_list").show();

    });

    $(".shj_index_jsq_select_list li").click(function() {

      $(this).parent().siblings(".shj_jsq_rst").html($(this).html()).attr("data-v", $(this).attr("data-v"));

      $(this).siblings('input').val($(this).attr("data-v"));

      close_jsq_select();

      changeCity();

    });

    $("body").click(function(e) {

      if (e.target.className != 'shj_index_jsq_select_bg') {

        close_jsq_select();

      }

    })

    function close_jsq_select() {

      $(".shj_index_jsq_select").css("border-color", "#c8c8c8");

      $(".shj_index_jsq_select").find(".shj_index_jsq_select_list").hide();

    };

    changeCity();

  })(window, window.jQuery);

  function changeCity() {

    var abc = $("#testForm input[name='city']").val();

    var that = "";

    that = $($(".two")[0]).parent(); //改

    $(that).siblings().find(".shj_index_jsq_ricon").removeClass("shj_index_jsq_ricon_check");

    $(that).find(".shj_index_jsq_ricon").addClass("shj_index_jsq_ricon_check");

    $(that).siblings('input').val($(that).attr("code"));

  }
  

  //热销商品轮播

  var mySwiperhot = new Swiper('#hot_banner_top', {

    //pagination: '.pagination',

    loop: true,

    grabCursor: false,

    paginationClickable: true,

    autoplay: 5000,

    nextButton: '#hot_banner_top_right',

  });

  var mySwiperhot = new Swiper('#hot_banner_top_2', {

    //pagination: '.pagination',

    loop: true,

    grabCursor: false,

    paginationClickable: true,

    autoplay: 5000,

    nextButton: '#hot_banner_top_right',

  });

  var mySwiper1 = new Swiper('#hot_banner_bottom', {

    //pagination: '.pagination',

    loop: true,

    grabCursor: false,

    paginationClickable: true,

    autoplay: 3000,

    prevButton: '#hot_banner_bottom_left',

  });
   function scroll(){ 

  $(".mybox ul").animate({"margin-left":"-110px"},function(){$(".mybox ul li:eq(0)").appendTo($(".mybox ul"));    

  $(".mybox ul").css({"margin-left":0})  })  }   

setInterval(scroll,3000) 




$(".shj_index_jsq_radio").click(function(){
	
	
	$("#fg").val()==($(this).text());
	
	})
	
