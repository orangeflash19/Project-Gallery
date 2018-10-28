$(document).ready(function(){
    $("#menuicon").click(function(){
        $("#mainmenu").css("left","0px");
           $(".studbox").hide();
        $(".facbox").hide();
        $(".adminbox").hide();
        function showmenu(){
            $("#mainmenu").css("-webkit-clip-path","polygon(0 0,100% 0,100% 100%,0% 100%)");
            $("#menuicon").animate({right:'-100'},300);
        }
        setTimeout(showmenu,100);
    });
    
    $("#close").click(function(){
        $("#mainmenu").css("-webkit-clip-path","polygon(0 0,0% 0%,100% 100%,0% 100%)");
       
        function hidemenu(){
            $("#mainmenu").css("left","-100%");
             $("#menuicon").animate({right:'50'},300);
            
        }
        setTimeout(hidemenu,300);
        function originallayout(){
              $("#mainmenu").css("-webkit-clip-path","polygon(0 0,100% 0,0% 100%,0% 100%)");
               $(".studbox").show();
        $(".facbox").show();
        $(".adminbox").show();
        }
        setTimeout(originallayout,600);
    });
});