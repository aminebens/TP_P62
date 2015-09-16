//$(function(){
//    $('.dbtables').click(function(){
//        var this_href=$(this).attr('href');
//        $.ajax({
//            url:this_href,
//            type:'GET',
//            cache:false,
//            success:function(data)
//            {
//                $('.main').html(data);
//            }
//        });
//        return false;
//    });
//});

//document.getElementById('new').addEventListener('click', function() {
//    console.log('Starting AJAX...');
//    window.event.preventDefault();
//    var this_href = this.getAttribute('href');
//    console.log(this_href);
//    var xmlhttp;
//
//    if (window.XMLHttpRequest) {
//        // code for IE7+, Firefox, Chrome, Opera, Safari
//        xmlhttp = new XMLHttpRequest();
//    } else {
//        // code for IE6, IE5
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementsByClassName("main")[0].innerHTML = xmlhttp.responseText;
//            console.log(document.getElementsByClassName("main")[0]);
//        }
//    };
//
//    xmlhttp.open("GET",this_href,true);
//    xmlhttp.send();
//});
