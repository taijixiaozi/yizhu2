function newcheckform() {

    var name = $("#name").val();
    var plot_name = $("#plot_name").val();
    var house_area = $("#house_area").val();
    var user_phone = $("#user_phone").val()
    if (name == "") {
      alert("请填写您的称呼");
      return false;
    }
    if (plot_name == "") {
      alert("请填写小区名称或地址");
      return false;
    }
    if (house_area == "") {
      alert("请填写房屋面积");
      return false;
    }
    if (user_phone == "" || user_phone.length != 11) {
      alert("请正确填写您的手机号");
      return false;
    }

    $.ajax({
        type: 'post',
        url : 'http://yizhu.api/portal/reservation/reservation' ,
        dataType : 'json' ,
        data : {
            name : name ,
            plot_name : plot_name ,
            house_area:house_area,
            user_phone:user_phone
        } ,
        success : function(data) {
        $('#name').val('');
        $('#plot_name').val('');
        $('#house_area').val('');
        $('#user_phone').val('');

        alert("提交成功，我们将尽快与您联系");

      }

    });

  }