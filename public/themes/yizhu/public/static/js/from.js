function newcheckform () {

    var name = $ ( "#name" ).val ();
    var plot_name = $ ( "#plot_name" ).val ();
    var house_area = $ ( "#house_area" ).val ();
    var user_phone = $ ( "#user_phone" ).val ()
    if ( name == "" ) {
        layer.tips ( '请填写您的称呼' , '#name' );
        return false;
    }
    if ( plot_name == "" ) {
        layer.tips ( '请填写小区名称或地址' , '#plot_name' );
        return false;
    }
    if ( house_area == "" ) {
        layer.tips ( '请填写房屋面积' , '#house_area' );
        return false;
    }
    if ( user_phone == "" || user_phone.length != 11 ) {
        layer.tips ( '请正确填写您的手机号' , '#user_phone' );
        return false;
    }

    $.ajax ( {
        type : 'post' ,
        url : 'http://yizhu.api/portal/reservation/reservation' ,
        dataType : 'json' ,
        data : {
            name : name ,
            plot_name : plot_name ,
            house_area : house_area ,
            user_phone : user_phone
        } ,
        success : function ( data ) {
            if ( data == 1 ) {
                //layer.msg('您已预约，稍候我们的工作人员将会电话联系您！请稍等');
                layer.alert ( '您已预约，稍候我们的工作人员将会电话联系您！请稍等' , { icon : 6 } );
            } else {
                layer.msg ( '服务器开小差啦。。。' , { icon : 5 } );
            }
        }

    } );

}