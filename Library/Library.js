//判断滚动条滚到底部
$(window).scroll(function(){
　　var scrollTop = $(this).scrollTop();
　　var scrollHeight = $(document).height();
　　var windowHeight = $(this).height();
　　if(scrollTop + windowHeight == scrollHeight){
　　　　alert("you are in the bottom");
　　}
});

//自动加载
$(function(){ 
    var winH = $(window).height(); //页面可视区域高度 
    var i = 1; //设置当前页数 
    $(window).scroll(function () { 
        var pageH = $(document.body).height(); 
        var scrollT = $(window).scrollTop(); //滚动条top 
        var aa = (pageH-winH-scrollT)/winH; 
        if(aa<0.02){ 
            $.getJSON("result.php",{page:i},function(json){ 
                if(json){ 
                    var str = ""; 
                    $.each(json,function(index,array){ 
                        var str = "<div class=\"single_item\"><div class=\"element_head\">"; 
                        var str += "<div class=\"date\">"+array['date']+"</div>"; 
                        var str += "<div class=\"author\">"+array['author']+"</div>"; 
                        var str += "</div><div class=\"content\">"+array['content']+"</div></div>"; 
                        $("#container").append(str); 
                    }); 
                    i++; 
                }else{ 
                    $(".nodata").show().html("别滚动了，已经到底了。。。"); 
                    return false; 
                } 
            }); 
        } 
    }); 
}); 

//移动浏览器判断
function browse_is_mobile () {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match("/iPhone/i", $user_agent) || preg_match("/iPod/i", $user_agent) ||  preg_match("/Android/i", $user_agent)){
        return true;
    }
    else {
        return false;
    }
}

//检测浏览器类型
function check_mobile_browse () {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match("/iPhone/i", $user_agent) || preg_match("/iPod/i", $user_agent)){
        return 1;
    }
    elseif (preg_match("/Android/i", $user_agent)) {
        return 2;
    }
    else {
        return false;
    }
}
