$("#leftBackTop").click(function() {

    $("html,body").animate({

      scrollTop: '0px'

    });

  });

  $('.float-menu-btn').hover(function() {

    var thatItem = $(this).data('item');

    $(this).css('background', 'url(/assets/images/floater/h' + thatItem + '.png)');

  },
  function() {

    var thatItem = $(this).data('item');

    $(this).css('background', 'none');

  })

  $.each($(".menu-item a"),
  function(i, link) {

    var start = link.href.indexOf("tid=");

    var end = link.href.indexOf("&");

    var catId = link.href.substring(start, end);

    link.href = link.href.replace(catId, 'tid=3');
  })

  console.log(start);

  console.log(end);

  //security iframe

