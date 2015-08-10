function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

$(document).ready(function () {
	$("#surveyContainer").css("margin-top",($(".pop-up-survey").height()/4)+"px");
	if(!getCookie("surveycompleted"))
	setTimeout(function(){ showPopUp(); }, 5000);

	$( ".surveyClose" ).click(function() {
	  $(".pop-up-survey").animate({
	    	opacity: 0,
	    	top:"-100%"
	  }, 1000, function() {
	    $(".pop-up-survey").css("z-index","-1");
	  });
	
	});
});

$(window).resize(function (){
$("#surveyContainer").css("margin-top",($(".pop-up-survey").height()/4)+"px");
});

function showPopUp(){
	$(".pop-up-survey").css("z-index","30");
	$(".pop-up-survey").animate({
    	opacity: 1,
    	top:"0"
  }, 1000, function() {
    // Animation complete.
  });
}



