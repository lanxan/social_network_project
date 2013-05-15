var c=0;	
var p=0;
var pc=[];
var pd=[];
var pp=[];

// user param
var nname;
var userid;
var visitid;
// blog param
var bTitle;
var bDate;
var bSite;
var bText;


$(window).load(function(){
	
	if($.cookie("userid") == null){
		alert("Please login first!");
		location.replace("index.html");
	}
	userid = $.cookie('userid');
	visitid = $.cookie('visitid');
	if(visitid == "" || visitid == null){
		visitid = userid;
	}
	if(visitid != userid){
		$('#addPhoto').css("display","none");
		$('#addnew').css("background-color","white");
	}
	//
	//
	if(visitid == 11){
		$('#album1').text("Album : Tainan");
		$('#album2').text("Time : 2010/10/05");
		$('#albumPost').attr("src","userfolder/6/tainan/1.jpg");
	}
	else{
		$('#album1').text("");
		$('#album2').text("");
		$('#albumPost').attr("src","");
		$('#p-main-left-mid').css("display","none");
		$('#p-main-right').css("display","none");
	}
	// get user information by userid
	$.ajax({
		url		: 'php/gUserInfo.php',
		type	: 'post',
		dataType: 'json',
		data	:{userid	: userid},
		error	: function(xhr, ajaxOption, thrownError){
			alert(thrownError);
		},
		success	: function(result){
			nname = result.nname;
			$("#nickname").html(nname);
		}
	});
	
	
	// get user's blog information
	$.ajax({
		url		: 'php/gBlog.php',
		type	: 'post',
		dataType: 'json',
		data	:{
			userid	: visitid
		},
		error	: function(xhr, ajaxOption, thrownError){
			alert(thrownError);
		},
		success	: function(result){
			if(result.num == 0){
			}
			else{
				bTitle = result.title;
				bDate  = result.date;
				bSite  = result.site;
				bText  = result.text;

			/* creat blog list
			 * */
				for(p = 0;p < result.title.length; p++){
					jQuery('<div/>', {
						id: 'foo.'+p,
						text: bTitle[p],
						click: function(){
							na = $(this).attr('id');
							na = na.split(".");
							$("#con0").val(bTitle[na[1]]);
							$("#con1").val(bDate[na[1]]);
							$("#con2").val(bSite[na[1]]);
							$("#con3").val(bText[na[1]]);
						}
					}).prependTo('#b-left-down');
				}
			
			/* end
			 * */
			}
		}
	});
	/*
	 *	creat user list
	 * */
		$.ajax({
			url		: 'php/gUserList.php',
			type	: 'post',
			dataType: 'json',
			data	: {userid : userid},
			error   : function(xhr, ajaxOption, thrownError){
				alert("user list:" + xhr.status);
			},
			success : function(result){
				var num = result.ouser.length;
				var a,id;
				for(i = 0;i < num;i++){
					id = 'uItem.'+result.ouser[i];
					a = 'avarat/'+result.avarat[i]+'.jpg';
					$('<div id = "'+ id +'" class = "uItem"><img class = "uItemImg" src="'+ a +'"/><span id = "'+id+'"class = "uItemName" onclick="seeUser('+result.ouser[i]+')">'+ result.nname[i]+'</span></div>').appendTo('#brightdown3');	
				}
			}
		});
	/*
	 *  ulist end
	 */
	
});
	
$(document).ready(function(){


	$("#but").click(function(){
		$("#inputbox").css("background-color","#E2DFE8");
	    $("#bb").clone().prependTo("#msn");
		$("#inputbox").css("background-color","white");
		$("#inputbox").val("");
	});
		
		
	$("#b-save").click(function(){	
   		var title = document.getElementById("con0").value;
		if(title==""){	
			alert("Please add your title!");
		}
		else{
			$.ajax({
				url		: 'php/storeBlog.php',
				type	: 'post',
				dataType: 'json',
				data	:{
					userid	: $.cookie("userid"),
					title	: $('input[name=blog-title]').val(),
					date	: $('input[name=blog-date]').val(),
					site	: $('input[name=blog-site]').val(),
					text	: $('textarea[name=blog-text]').val()
				},
				error	: function(xhr, ajaxOption, thrownError){
					alert(thrownError);
				},
				success	: function(result){
					alert("msg:" + result.msg );
				}
			});
	
			jQuery('<div/>', {
				id: 'foo.'+p,
				text: title,
				click: function(){
					n = $(this).text();
					$("#con0").val(n);
					na = $(this).attr('id');
					$("#con1").val(pd[na[3]]);
					$("#con2").val(pp[na[3]]);
					$("#con3").val(pc[na[3]]);
		 			  }
			}).prependTo('#b-left-down');
			pd[p] = document.getElementById("con1").value;					
    		pp[p] = document.getElementById("con2").value;	
    		pc[p] = document.getElementById("con3").value;					
			p=p+1;
			$("#con0").val("");
			$("#con1").val("");
			$("#con2").val("");	
			$("#con3").val("");
		}						
	});	
		
		$("#b-left-up").click(function(){
			$("#con0").val("");
			$("#con1").val("");
			$("#con2").val("");		
			$("#con3").val("");	
  		});			
		
		
		$("#find").click(function(){
			var address = document.getElementById("address").value;					  
			if(address=="Tainan")
				{$("#ad").show();}
			else{	
				$("#add").show();
				$("#add").clone().appendTo("#brightdown1");
				$("#add").hide();}
			$("#add1").empty();
  		});	
		
		$("#add2").click(function(){
			if(c==0)					  
				{$("#adad").css("background-image","url(../ex8/img/newglobal/orange.jpg)");c=1;
				 $("#pvb").show();}
			else
				{$("#adad").css("background-image","url(../ex8/img/newglobal/blue.png)");c=0;
				 $("#pvb").hide();}
  		});	
		
		
		$("#first").click(function(){
			$("#back").css("background-image","url(../ex8/img/newglobal/g_movement-04.jpg)");
			$("#m-main").show();
			$("#p-main").hide();
			$("#a-main1").hide();
			$("#v-main").hide();
			$("#b-main").hide();		 
		});
		$("#second,#pvb-p").click(function(){
			$("#back").css("background-image","url(../ex8/img/newglobal/g_photo-04.jpg)"); 
			$("#m-main").hide();
			$("#p-main").show();
			$("#a-main1").hide();
			$("#v-main").hide();
			$("#b-main").hide();
		});
		// add photo
		$('#addPhoto').click(function(){
			$("#m-main").hide();
			$("#a-main1").show();
			$("#v-main").hide();
			$("#b-main").hide();
		});
		$('#exit').click(function(){
			$("#a-main1").hide();
		});
		$("#third,#pvb-v").click(function(){
			$("#back").css("background-image","url(../ex8/img/newglobal/g_vedio-04.jpg)"); 
			$("#m-main").hide();
			$("#p-main").hide();
			$("#a-main1").hide();
			$("#v-main").show();
			$("#b-main").hide();		
		});
		
		$("#fourth,#pvb-b").click(function(){
			$("#back").css("background-image","url(../ex8/img/newglobal/g_blog-04.jpg)"); 
			$("#m-main").hide();
			$("#p-main").hide();
			$("#a-main1").hide();
			$("#v-main").hide();
			$("#b-main").show();		
		});	
		
		$("#brightup1").click(function(){
			$("#brightup1").css("background-image","url(../ex8/img/newglobal/myfootdark.png)"); 
			$("#brightup2").css("background-image","url(../ex8/img/newglobal/movebright.png)"); 
			$("#brightup3").css("background-image","url(../ex8/img/newglobal/gffootbright.png)"); 
			$("#brightdown2").hide();
			$("#brightdown3").hide();
			$("#brightdown1").show();				
		});	
		$("#brightup2").click(function(){
			$("#brightup2").css("background-image","url(../ex8/img/newglobal/movedark.png)");
			$("#brightup1").css("background-image","url(../ex8/img/newglobal/myfootbright.png)"); 
			$("#brightup3").css("background-image","url(../ex8/img/newglobal/gffootbright.png)");
			$("#brightdown1").hide();
			$("#brightdown3").hide();
			$("#brightdown2").show();
				
		});	
		$("#brightup3").click(function(){
			$("#brightup3").css("background-image","url(../ex8/img/newglobal/gffootdark.png)"); 
			$("#brightup1").css("background-image","url(../ex8/img/newglobal/myfootbright.png)"); 
			$("#brightup2").css("background-image","url(../ex8/img/newglobal/movebright.png)"); 
			$("#brightdown1").hide();
			$("#brightdown2").hide();
			$("#brightdown3").show();						
		});			
			
});


function seeOwn(){
	seeUser(userid);
}
function seeUser(id){
	visitid = id;
	$.cookie("visitid", null);
	$.cookie("visitid", visitid, {expires: 7});
	location.replace('http://merry.ee.ncku.edu.tw/~jesshao/ex8/home.html');
}
