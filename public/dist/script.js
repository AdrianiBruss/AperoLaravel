$(function(){var t,a,i,s=0;$("#reset-input").on("click",function(){$("#input-search").val("")}),$("#input-search").on("keyup",function(){t=$(this).val().toLowerCase().trim(),a=$("#apero-list li"),$.each(a,function(a,n){i=$(n).attr("data-filtertext"),i=i.split(" ");for(var e=0;e<i.length;e++)-1!=i[e].toLowerCase().indexOf(t)?s++:s--;Math.abs(s)<i.length?$(n).css("display","block"):$(n).css("display","none"),s=0}),""==$(this).val()&&a.css("display","block")})});