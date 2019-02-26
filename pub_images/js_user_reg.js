$(document).ready(function(){
	$("#pay_type").click(function(){
		$("#BankInfoId").css({"display":"inline-block",
					          "*display":"inline",
							  "*zoom":"1",
							  "cursor":"pointer"
							});
		$("#BankInfoId").mouseleave(function(){$("#BankInfoId").delay(5).fadeOut();});	
	    $("#BankInfoId li").each(function(index){
			$(this).click(function(){
			var new_font=$(this).text();
			$("#pay_type").text(new_font);
  				switch(index){
  				     case 0:
  				     $("#bank_pay").css({"display":"inline-block",
					                     "display":"inline"
										 });
					 
  				     $("#ali_pay").css("display","none");
  				     $("#qq_pay").css("display","none");
					 $("#reginfo_ptype").val("1");
  				     break;
  				     case 1:
  				     $("#ali_pay").css({"display":"inline-block",
					                    "display":"inline"
										});
  				     $("#qq_pay").css({"display":"none",
					                     "*display":"none"
										});
  				     $("#bank_pay").css({"display":"none",
					                     "*display":"none"
										});
										
					 document.getElementById("bank_pay").style.display="none";
					 $("#reginfo_ptype").val("2");
  				     break;
  				     case 2:
  				     $("#qq_pay").css({"display":"inline-block",
					                   "*display":"inline"
									   });
  				     $("#ali_pay").css("display","none");
  				     $("#bank_pay").css("display","none");
					 $("#reginfo_ptype").val("3");
  				     break;
		        }
			$("#BankInfoId").delay(5).fadeOut();
			});
		});
	});	
    
    $("#bank_type").click(function(){
		$("#bank_list").css({"display":"inline-block",
					          "*display":"inline",
							  "*zoom":"1",
							  "cursor":"pointer"
							});
		 $("#bank_list").mouseleave(function(){$("#bank_list").delay(5).fadeOut();});			
	     $("#bank_list li").each(function(index){
			 $(this).click(function(){
				 $("#reginfo_bank").val($(this).text());
				 $("#bank_type").text($(this).text());
				 $("#bank_list").delay(5).fadeOut();
			 });
		 });
	});	
	
	
	
//按照用户名的规则去验证
/*      $("#username").mouseover(function(){
		 $(this).css({"background":"#3ea5d7","opacity":"0.3","color":"#fdfdff"});
	 });
	 $("#username").mouseout(function(){
		 $(this).css({"background":"none","opacity":"10","color":"#ffffff"});
	 }); */
     $("#username").change(function(){
		$("#username_t").empty();
        if(this.value==""||this.value.length<6){
            var errMsg = "<dl class='form_no'>用户名至少是6个字母</dl>";
            $("#username_t").append(errMsg);
        }else{
            var msg = "<dl class='form_yes'>恭喜！用户名可以使用</dl>";
            $("#username_t").append(msg);
        }
          
	 });
     
	 $("#userEmail").change(function(){
         //按照email的规则去验证
         var reg = /^\w{1,}@\w+\.\w+$/;
         var $value = $("#userEmail").val();
		 $("#userEmail_t").empty();
         if(!reg.test($value)){
             var errMsg = "<dl class='form_no'>邮箱不合法！</dl>";
             $("#userEmail_t").append(errMsg);
         }else{
             var Msg = "<dl class='form_yes'>邮箱可以使用</dl>";
             $("#userEmail_t").append(Msg);
             }	 
	 });
	 $("#userPass").change(function(){
		 var value = $("#userPass").val();
		 $("#userPass_t").empty();
		 
	     if(!value){
             var errMsg = "<dl class='form_no'>密码不能为空</dl>";
             $("#userPass_t").append(errMsg);
	     }else{
			 if(value.length < 6 || value.length > 20) {
				 var errMsg = "<dl class='form_no'>密码长度必须在6 - 20之间！</dl>";
				 $("#userPass_t").append(errMsg);
			 }else{
				 var errMsg = "<dl class='form_yes'>密码可用</dl>";
				 $("#userPass_t").append(errMsg);
			 }
		};
	 });
 	 $("#ConfirmPassword").change(function(){
		 var value = $("#ConfirmPassword").val();
		 $("#ConfirmPassword_t").empty();
		 if(!value){
             var errMsg = "<dl class='form_no'>确认密码不能为空！</dl>";
             $("#ConfirmPassword_t").append(errMsg);
	     }else{
		 if(value != $("#userPass").val()){
			 var errMsg = "<dl class='form_no'>两次输入不一致！</dl>";
             $("#ConfirmPassword_t").append(errMsg);
		 }else{
			 var errMsg = "<dl class='form_yes'>OK ! 两次输入的密码一致！</dl>";
             $("#ConfirmPassword_t").append(errMsg);
		 }
		 }
	 });
	 $("#qq").change(function(){
		 var value = $("#qq").val();
		 $("#qq_t").empty();
	     if(!value){
             var errMsg = "<dl class='form_no'>QQ号码不能为空</dl>";
             $("#qq_t").append(errMsg);
	     }else{
		 if(value.length < 5 || value.length > 11) {
			 var errMsg = "<dl class='form_no'>QQ号码长度必须在5 ~ 11之间！</dl>";
			 $("#qq_t").append(errMsg);
		 }else{
		     var errMsg = "<dl class='form_yes'>QQ正确</dl>";
			 $("#qq_t").append(errMsg);
		 }
		 }
	 });
	 
	 $("#mobile").change(function(){
		 $("#mobile_t").empty();
		 var value = $("#mobile").val();
         if( value== ""){
             $("#mobile").focus();
			 var errMsg = "<dl class='form_no'>手机号码不能为空！</dl>";
			 $("#mobile_t").append(errMsg);
         }else{
             if (!value.match(/^(((13[0-9]{1})|159|153|182|184|185|186|187|188|171|172|173|174|175|176|178|179|183|151|152|154|155|156|157|158|150|170|180|189|177|181)+\d{8})$/)){
                $("#mobile").focus();
			    var errMsg = "<dl class='form_no'>手机号码格式不正确！</dl>";
			    $("#mobile_t").append(errMsg);
             }else{
				 var errMsg = "<dl class='form_yes'>手机号码格式正确！</dl>";
			     $("#mobile_t").append(errMsg);
			 }		  
			  
			  
		  }
 
	 });
	 $("#idCard").change(function(){
		 $("#idCard_t").empty();
         var value=$("#idCard").val();
		 
         if(value.length == 0){ 
			 var errMsg = "<dl class='form_no'>身份证号码没有输入</dl>";
             $('#idCard').focus();
			 $("#idCard_t").append(errMsg);
         }else{
             if(isCardID(value)==false){
			     var errMsg = "<dl class='form_no'>身份证号不正确</dl>";
                 $('#idCard').focus();
			     $("#idCard_t").append(errMsg);
             }else{
				 var errMsg = "<dl class='form_yes'>身份证号正确</dl>";
			     $("#idCard_t").append(errMsg);
			 }
		 }
	 });
	 $("#userName").change(function(){
		 $("#userName_t").empty();
		 var value = $("#userName").val();
		 var myReg = /^[\u4e00-\u9fa5]+$/;
		 
		 if(value.length==0){
			 var errMsg = "<dl class='form_no'>请输入汉字姓名</dl>";
             $('#userName').focus();
			 $("#userName_t").append(errMsg);
		 }else{
		     if(myReg.test(value)){
			     var errMsg = "<dl class='form_yes'>正确</dl>";
			     $("#userName_t").append(errMsg);
		     }else{
                 var errMsg = "<dl class='form_no'>请输入汉字姓名</dl>";
                 $('#userName').focus();
			     $("#userName_t").append(errMsg);
		 }
		 }
	 });
var aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"} 
function isCardID(sId){ 
	var iSum=0 ;
	var info="" ;
	if(!/^\d{17}(\d|x)$/i.test(sId)) return false; 
	sId=sId.replace(/x$/i,"a"); 
	if(aCity[parseInt(sId.substr(0,2))]==null) return false;  
	sBirthday=sId.substr(6,4)+"-"+Number(sId.substr(10,2))+"-"+Number(sId.substr(12,2)); 
	var d=new Date(sBirthday.replace(/-/g,"/")) ;
	if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate()))return false;
	for(var i = 17;i>=0;i --) iSum += (Math.pow(2,i) % 11) * parseInt(sId.charAt(17 - i),11) ;
	if(iSum%11!=1) return false; 
	return true;
}
});	
	
	
	
	
	










