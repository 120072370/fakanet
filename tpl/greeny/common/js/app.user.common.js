jQuery(document).ready(function(){
//�ύ����
     $('#form_postorder button[type="reset"]').click( function(){$("#form_postorder button.green").removeAttr("disabled");$("#callinfo").html("");});
		$("#form_postorder button.green").click( function(){
		  var channeltype=$("#xk_channelId").val();
		  var channelname=$("#xk_channelname").val();
		  var xkcardid=$("#xk_cardId").val();
		  var xkcardpass=$("#xk_cardPass").val();
		  var xkfacevalue=$("#xk_faceValue").val();
		  var cmgs="�����������";
		  var mmgs="�����������";
          if(xkcardid==''){$("#xk_cardId").focus();$("#callinfo").html(errico+"�����뿨��</span>");return false};
          if(xkcardpass==''){$("#xk_cardPass").focus();$("#callinfo").html(errico+"�����뿨����</span>");return false};
		  if(xkfacevalue==''){$("#xk_faceValue").focus();$("#callinfo").html(errico+"��������ȷ�Ŀ����</span>");return false};
		  switch (channeltype){
			case '4':
			  if(xkcardid.length!=9){$.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ9λ",lock: true,fixed:true,cancelVal: 'ȷ��',cancel: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}
			  else
			 {if(xkcardpass.length!=12){$.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ12λ",lock: true,fixed:true,cancelVal: 'ȷ��',cancel: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}
			  break;//��Ѷ��
			case '5':
			  if(xkcardid.length!=15 && xkcardid.length!=16){$.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ15��16λ",lock: true,fixed:true,cancelVal: 'ȷ��',cancel: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}
			  else
			 {if(xkcardpass.length!=8 && xkcardpass.length!=9){$.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ8��9λ",lock: true,fixed:true,cancelVal: 'ȷ��',cancel: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}
			  break;//ʢ��
			case '6':
			  if(xkcardid.length!=16){$.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ16λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}
			else
			{if(xkcardpass.length!=16){$.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ16λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}
			break;//����һ��ͨ
			case '7':
			  if(xkcardid.length!=10){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ10λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=15){$.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//����һ��ͨ
			case '8':
			  if(xkcardid.length!=20){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ20λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=12){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ12λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//�Ѻ�һ��ͨ
			case '9':
			  if(xkcardid.length!=16){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ16λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=8){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ8λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//��;��Ϸ��
			case '10':
			  if(xkcardid.length!=13){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ13λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=10){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ10λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//����һ��ͨ
			case '11':
			  if(xkcardid.length!=13){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ13λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=9){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ9λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//����һ��ͨ
			case '12':
			  if(xkcardid.length!=20){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ20λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=8){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ8λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//����һ��ͨ
			case '13':
			  if(xkcardid.length!=19){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ19λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=18){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ18λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//���ų�ֵ��
			case '14':
			  if(xkcardid.length!=17){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ17λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=18){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ18λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//�����г�ֵ��
			case '15':
			  if(xkcardid.length!=15){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=19){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ19λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//��ͨ��ֵ��
			case '16':
			  if(xkcardid.length!=15){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=15){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//����һ��ͨ
			case '17':
			  if(xkcardid.length!=10 && xkcardid.length!=12){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ10��12λ",lock:true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
				  if(xkcardpass.length!=10 && xkcardpass.length!=15){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ10��15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//���һ��ͨ
			case '18':
			  if(xkcardid.length!=15){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=8){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ8λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//����һ��ͨ
			case '23':
			  if(xkcardid.length!=15){
			  $.dialog({title: lktitle,content:channelname+cmgs + "<br />����Ϊ15λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardId").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}else{
			if(xkcardpass.length!=8 && xkcardpass.length!=10 && xkcardpass.length!=12 && xkcardpass.length!=14 && xkcardpass.length!=16){
			  $.dialog({title: lktitle,content:channelname+mmgs + "<br />����Ϊ8��10��12��14��16λ",lock: true,fixed:true,okVal: 'ȷ��',ok: function () {$("#xk_cardPass").focus();},icon: 'warning',width:'250px',height:'90px'});return false;}}break;//ŷ��һ��ͨ
		
		  }//switch end	
		if(parseInt(xkfacevalue)<1||parseInt(xkfacevalue)>1000){$("#xk_faceValue").focus();$("#callinfo").html(errico+"��������ȷ�Ŀ����</span>");return false};
		var postorderdata=$("#form_postorder").serialize();$(".required").val("");
		$("#callinfo").css({color:"#666666"});$("#callinfo").html(ldico+"�����ύ</span>");
		$.ajax({
                    type: "get",
                    contentType: "text/html",
                    url: "set/",
                    data: postorderdata,
					error: function() {$("#callinfo").css({color:"red"});
                    $("#callinfo").html(errico+"�ύ���ִ���</span>");
                    },
                    success: function(result) {
                        if(result != "true"){
							$("#callinfo").html(errico+"�ύʧ�ܣ�"+result+"</span>");
					    }//ʧ��
						else
						{$("#callinfo").html(okico+"�ύ�ɹ�!</span>");}//�ɹ�
                    }
                });
		queryOrder();
    });
    $("#arr_content").blur(function(){
	   var Groupstxt=$("#arr_content").val().split('\n');
	   var Groupscount=Groupstxt.length;
	   //alert(Groupstxt[Groupstxt.length-1]);
	   if(Groupstxt[Groupstxt.length-1]){
         $("#Groupscount").html(Groupscount);
	   }
	   else{
		 $("#Groupscount").html(Groupscount-1);
	   }
	});
	$("#arr_content").keyup(function(){
	   var Groupstxt=$("#arr_content").val().split('\n');
	   var Groupscount=Groupstxt.length;
	   //alert(Groupstxt[Groupstxt.length-1]);
	   if(Groupstxt[Groupstxt.length-1]){
         $("#Groupscount").html(Groupscount);
	   }
	   else{
		 $("#Groupscount").html(Groupscount-1);
	   }
	});
//�����ύ
    $("#form_Groupscard button.green").click(function() {
	    var groupchannelId=$("#g_channelId").val();
		var groupcontent=$("#arr_content").val();
        if (groupcontent == '') {
            $("#arr_content").focus();
            $("#Groupsinfo").html(errico + "�����뿨��Ϣ</span>").show();ClearGroupsinfo();
            return false;
        };
		if (groupchannelId == '') {
            $("#Groupsinfo").html(errico + "ͨ����Ϣ��ȡʧ��</span>").show();ClearGroupsinfo();
            return false;
        };
        $("#Groupsinfo").css({color: "#666666"});
        $(this).attr("disabled", true);
		groupcontentarr=Cleartrim(groupcontent);
		var group_h=groupcontentarr.split('\n');
		var Groupbackmsg="";
		$("#Groupsinfo").html("").hide();ClearGroupsinfo();
		$("#arr_content").val("");
		for (var i=0;i<group_h.length;i++) {
			var groupcard=group_h[i].split(',');
			var ino=i+1;
			if(ino<10){ino="0"+ino;}
			if(groupcard.length!=3){
		      $("#Groupsinfo_"+ino).html(errico +"�� "+ino+" �� { ����Ϣ��ʽ����ȷ,������մ��� }</span>").show();
			}
			else
			{
			  var groupcardid=groupcard[0];
			  var groupcardpass=groupcard[1];
			  var grouppaymoney=groupcard[2];
			  if(ino<21){if(group_h[i]){Groupscard(ino,groupchannelId,groupcardid,groupcardpass,grouppaymoney);}}
			}
		}
		$("#form_Groupscard button.green").removeAttr("disabled");
		queryOrder();
    });
	 $('#form_Groupscard button[type="reset"]').click(function() {
        $("#form_Groupscard button.green").removeAttr("disabled");
		$("#arr_content").val("");
        $("#Groupsinfo").html("").hide();ClearGroupsinfo();
    });
})
function checkflag(a) {
  setTimeout(function() {
    stopflag(a)
  },
  300);
  $("#sub" + a).attr("disabled", "disabled");
  $("#paymoney" + a).html(ldico + "Loading</span>");
  $("#orderzt" + a).html(ldico + "Loading</span>");
  $("#errorMsg" + a).html(ldico + "Loading</span>")
}
function stopflag(c) {
  postData = "oid=" + c + "&rnd=" + Math.random();
  $.ajax({
    type: "get",
    dataType: "json",
    timeout: 10000,
    url: 'json/',
    data: postData,
    success: function(a) {
      $("#sub" + c).removeAttr("disabled");
      $("#orderzt" + c).html(a.Success);
      $("#paymoney" + c).html(a.paymoney);
      $("#errorMsg" + c).html(a.errorMsg)
    },
    error: function(a, b) {
      $("#sub" + c).removeAttr("disabled");
      $.dialog({
        title: lktitle,
        content: '�����ȡʧ��,���Ե�����' + b,
        lock: true,
        fixed: true,
        ok: function() {
          window.location.reload()
        },
        icon: 'warning',
        width: '250px',
        height: '90px'
      })
    }
  })
}
function queryOrder() {
  $("#queryorder").attr("disabled", "disabled");
  $("#toporder").html("<tr><td colspan='10' class='nomsg'>" + ldico + "Loading..</span></td></tr>");
  $.ajax({
    type: "get",
    contentType: "text/html",
    url: "get/",
    data: "",
    error: function() {
      $("#toporder").html("<tr><td colspan='10' class='nomsg'>�ύ���ִ���</td></tr>")
    },
    success: function(a) {
      if (a != "") {
        $("#queryorder").removeAttr("disabled");
        $("#toporder").html(a)
      }
    }
  })
}
function Groupscard(b, c, d, e, f) {
  $("#Groupsinfo_" + b).html(ldico + "�����ύ..</span>").show();
  postorderdata = "ChannelId=" + c + "&CardId=" + d + "&CardPass=" + e + "&FaceValue=" + f + "";
  $.ajax({
    type: "get",
    contentType: "text/html",
    url: "set/",
    data: postorderdata,
    error: function() {
      $("#Groupsinfo").css({
        color: "red"
      });
      $("#Groupsinfo").html(errico + "�ύ���ִ���</span>");
      ClearGroupsinfo()
    },
    success: function(a) {
      if (a != "true") {
        Groupbackmsg = errico + "�� " + b + " �� { ���ţ�" + d + " | �ύʧ�ܣ�" + a + " }</span>"
      } else {
        Groupbackmsg = okico + "�� " + b + " �� { ���ţ�" + d + " | �ύ�ɹ�,���ڴ��� }</span>"
      }
      $("#Groupsload").html("").hide();
      $("#Groupsinfo_" + b).html("").hide();
      $("#Groupsinfo_" + b).html(Groupbackmsg).show()
    }
  })
}
function ClearGroupsinfo() {
  $("#Groupsinfo_01").html("").hide();
  $("#Groupsinfo_02").html("").hide();
  $("#Groupsinfo_03").html("").hide();
  $("#Groupsinfo_04").html("").hide();
  $("#Groupsinfo_05").html("").hide();
  $("#Groupsinfo_06").html("").hide();
  $("#Groupsinfo_07").html("").hide();
  $("#Groupsinfo_08").html("").hide();
  $("#Groupsinfo_09").html("").hide();
  $("#Groupsinfo_10").html("").hide();
  $("#Groupsinfo_11").html("").hide();
  $("#Groupsinfo_12").html("").hide();
  $("#Groupsinfo_13").html("").hide();
  $("#Groupsinfo_14").html("").hide();
  $("#Groupsinfo_15").html("").hide();
  $("#Groupsinfo_16").html("").hide();
  $("#Groupsinfo_17").html("").hide();
  $("#Groupsinfo_18").html("").hide();
  $("#Groupsinfo_19").html("").hide();
  $("#Groupsinfo_20").html("").hide();
  $("#Groupsload").html("").hide();
  $("#Groupscount").html("0")
}
function Cleartrim(a) {
  a = a.replace(/\s{2,}/g, ',');
  a = a.replace(/��/g, ',');
  a = a.replace(/ /g, ',');
  a = a.replace(/[\u4E00-\u9FA5]/g, '');
  return a
}