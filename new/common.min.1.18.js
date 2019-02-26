var common_max_money = 8000;
var common_min_money = 0.2;
var product_name_min_length = 2;
var product_name_max_length = 80;

//检测日期
function validateDateTime(testdate) {
  var date_regex = /((19|20)[0-9]{2})-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01]) ([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]/;
  var res = date_regex.test(testdate);
  if(res) {
    var ymd = testdate.match(/(\d{4})-(\d+)-(\d+).*/);
    var year = parseInt(ymd[1]);
    var month = parseInt(ymd[2]);
    var day = parseInt(ymd[3]);
  if(day > 28) {
    //获取当月的最后一天
    var lastDay = new Date(year, month, 0).getDate();
    return (lastDay >= day);
  }
    return true;
  }
  return false;
}

/**
 * 检测数组范围 不符合返回false
 * @lastModify 2016-10-08T17:50:56+0800
 * @param      {string}              val 字符串
 * @param      {int}                 min 最小长度
 * @param      {int}                 max 最大长度
 * @return     {bool}                true 代表在最小值和最大值之间,反正则不合法
 */
function check_range(val, min, max) {
    if (val == null || checkNumber(val.toString()) == false) {
        return false;
    }
    if (min != null && max != null ) {
        if (val >= min && val <= max) {
            return true;
        } else {
            return false;
        }
    } else if (min != null && max == null ) {
        if (val >= min) {
            return true;
        } else {
            return false;
        }
    } else if (min == null && max != null ) {
        if (val <= max) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

/**
 * 得到浏览器get参数
 * @date   2017-02-17T11:55:33+0800
 */
function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return unescape(r[2]);
    }
    return null;
}

/**
 * 检测是否是邮箱
 * @date   2017-02-16T13:37:16+0800
 */
function is_email(str){
    var reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    return reg.test(str);
}

/**
 * 弹出信息 目前是土司信息框
 * @lastModify 2016-10-13T15:17:13+0800
 * @param      {string}                 msg 弹出内容
 * @return     无返回值
 */
function msg(msg) {
    layer.msg(msg);
}

//简单替换tpl
function simple_replace(site_name, arr) {
    var tpl = $(".__tpl").html();
    tpl = tpl.replace(new RegExp("<tbtr", "g"), "<tr").replace(new RegExp("</tbtr>", "g"), "</tr>").replace(new RegExp("<tbtd", "g"), "<td").replace(new RegExp("</tbtd>", "g"), "</td>").replace("imgsrc", "src");
    var new_data = "",
        n_tpl = "";
    if (arr != null) {
        for (var i = 0; i < arr.length; i++) {
            n_tpl = tpl;
            for (var t = 0; t < arr[i].length; t++) {
                //在RegExp转义需双反斜线 因为js里单反斜线本来就是转义符
                n_tpl = n_tpl.replace(new RegExp("arr\\[" + t + "\\]", "g"), arr[i][t]);
                //替换名称
            }
            //利用键名替换
            for( var key in arr[i] ){
                n_tpl = n_tpl.replace(new RegExp("var\\[" + key + "\\]", "g"), arr[i][key]);
                n_tpl = n_tpl.replace(new RegExp("arr\\[" + key + "\\]", "g"), arr[i][key]);
            }
            n_tpl = n_tpl.replace(new RegExp("\\[_sys_count\\]", "g"), i);
            new_data = new_data + n_tpl;
        }
    }
    $(site_name).html("");
    $(site_name).html(new_data);
}


function alert_s(msg) {
    layer.alert(msg,{shade: [0.1, 'transparent'],shadeClose:true,move: false,title: "提示"});
}

/**
 * 检测字符串的长度
 * @lastModify 2016-10-08T17:50:56+0800
 * @param      {string}              val 字符串
 * @param      {int}                 min 最小长度
 * @param      {int}                 max 最大长度
 * @return     {bool}                true 代表在最小值和最大值之间,反正则不合法
 */
function check_length(val, min, max) {
    if (val == null ) {
        return false;
    }
    if (min != null && max != null ) {
        if (val.length >= min && val.length <= max) {
            return true;
        } else {
            return false;
        }
    } else if (min != null && max == null ) {
        if (val.length >= min) {
            return true;
        } else {
            return false;
        }
    } else if (min == null && max != null ) {
        if (val.length <= max) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

//增加去前后空格的方法
String.prototype.trim = function() {
    return this.replace(/(^\s*)|(\s*$)/g, '');
}
/**
 * 设置cookie
 * @lastModify 2016-10-08T18:32:45+0800
 * @param      {string}              name     cookie名称
 * @param      {string}              value    cookie的值
 * @param      {int}                 day      过去时间
 */
function setCookie(name, value) {
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}
/**
 * 得到cookie的值
 * @lastModify 2016-10-08T18:37:36+0800
 * @param      {sting}                 name cookie名称
 * @return     {string}                对应coookie的值
 */
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg)) {
        return unescape(arr[2]);
    } else {
        return null ;
    }
}
//发送post数据,封装方法 
function send_post(fName, mName, post_par, get_par, success) {
    var post_json, urlz = "/controller/overt/control.html";
    if (get_par != null ) {
        urlz = urlz + "?" + $.param(get_par);
    }
    if (post_par == null ) {
        post_json = "_f=" + fName + "&_m=" + mName;
    } else {
        post_json = "_f=" + fName + "&_m=" + mName + "&" + $.param(post_par);
    }
    $.post(urlz, post_json, success);
}
//判断QQ号码
function check_qq(aQQ) {
    var bValidate = RegExp(/^[1-9][0-9]{4,13}$/).test(aQQ);
    if (bValidate) {
        return true;
    } else {
        return false;
    }
}
//检测商品说明
function check_tip(tip) {
    if (tip.trim() != "" && check_length(tip.trim(), 1, 300) == false) {
        return "商品说明长度需在1-300之间!";
    } else {
        return true;
    }
}
/**
 * 检测手机号码是否合法
 * @lastModify 2016-09-26T17:32:22+0800
 * @param      {string}                 phone 手机号码
 * @return     {bool}                 true 代表正确 false 代表失败
 */
function check_phone(phone){
  var reg = /^1[3|4|5|7|8]\d{9}$/;
  if(!reg.test(phone))
  {   
      return false;
    }else{
      return true;
    }
}

/**
 * 判断字符串是否是整数
 * @lastModify 2016-10-09T14:07:15+0800
 * @param      {obj}                 obj 需要验证的字符串
 * @return     {Boolean}             true 代表是整数  false 代表不是整数
 */
function isInteger(obj) {
    if (/^-?\d+$/.test(obj)) {
        return true;
    } else {
        return false;
    }
}
/**
 * 弹出询问框 确认框
 * @lastModify 2016-10-11T16:56:18+0800
 * @param      {string}                msg          弹出提示信息
 * @param      {array}                 btn_titles   按钮标题
 * @param      {func}                  success_func 成功执行的子程序
 * @return     子程序
 */
function model_comfirm(msg, btn_titles, success_func) {
    layer.msg(msg, {
        time: 0,
        btn: btn_titles,
        yes: success_func
    });
}

/**
 * 检测是否是数字
 * @date   2017-01-26T14:10:27+0800
 */
function checkNumber(number) {
    var re = /^(-{0,1}([1-9][0-9]*|0)\.[0-9]+)|(-{0,1}[1-9][0-9]*)|(-{0,1}0)$/; //判断字符串是否为数字     //判断正整数 /^[1-9]+[0-9]*]*$/
    var arr = number.toString().match(re);
    if (arr == null || arr[0] != number.toString()) {
        return false;
    }else{
        return true;
    }
}

/**
 * 检测分类名称是否正确
 * @lastModify 2016-10-13T15:05:39+0800
 * @param      {string}                 fl_name 分类名称
 * @return     成功返回true 否则返回字符串
 */
function check_fl_name(fl_name) {
    if (check_length(fl_name.trim(), 1, 60) == false) {
        return "分类名称长度需在1-60位之间!";
    }
    return true;
}

/**
 * 检测分类id是否正确
 * @date   2017-01-27T22:37:12+0800
 */
function check_fl_id(value){
    if (isPositiveNum(value) == false && value != "0") {
        return "请先选择商品分类!";
    }else{
        return true;
    }
}

/**
 * 检测商品id是否正确
 * @date   2017-01-27T22:37:12+0800
 */
function check_pr_id(value){
    if (isPositiveNum(value) == false && value != "0") {
        return "请先选择商品!";
    }else{
        return true;
    }
}

/**
 * 检测件数
 * @date   2017-01-28T19:49:52+0800
 */
function check_piece(value,price){
    if (isPositiveNum(value) == false) {
        return "请输入正确的件数";
    }else if (value * price > common_max_money) {
        return "件数乘以价格不能大于" + common_max_money + "元";
    }else{
        return true;
    }
}

/**
 * 检测折扣
 * @date   2017-01-28T19:55:29+0800
 * mode 0只检测piece 1只检测discount 2两个一起检测
 */
function check_discount_piece(piece,discount,price,mode){
    if (mode != 1) {
        if (isPositiveNum(piece) == false) {
            return "请输入正确的件数";
        }else if (piece * price > common_max_money) {
            return "件数乘以价格不能大于" + common_max_money + "元";
        }else{
            if (mode == 0) {
                return true;
            }
        }
    }
    
    if (check_range(discount,1,10) == false) {
        return "折扣只能是1-10之间的数字";
    }else if(discount == 1 || discount == 10){
        return "折扣不能等于1或10";
    }else{
        return true;
    }
}

/**
 * 检测商户名称
 * @lastModify 2016-10-25T18:43:40+0800
 */
function check_shname(shname) {
    if (check_length(shname.trim(), 2, 10) == false && shname != "") {
        return "长度在2-10位之间!";
    } else {
        return true;
    }
}

//判断QQ号码字段
function check_qq_zd(qq) {
    if (qq == "") {
        return true;
    }
    var bValidate = RegExp(/^[1-9][0-9]{4,11}$/).test(qq);
    if (bValidate) {
        return true;
    } else {
        return "商户qq有误!";
    }
}

/**
 * 检测url是否正确
 * @lastModify 2016-10-25T18:38:02+0800
 */
function check_url(str) {
    if (str == null ) {
        return false;
    } else {
        if (str.substr(0, 4).toLowerCase() == "www." && str.length > 10) {
            return true;
        }
        var test = /http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
        var obj = new RegExp(test);
        return obj.test(str);
    }
}
/**
 * 检测排序是否正确
 * @lastModify 2016-10-25T17:52:07+0800
 * @param      {int}                 sort 排序数字
 * @return     成功返回true 否则返回字符串
 */
function check_sort(sort) {
    if (isInteger(sort.trim()) == false) {
        return "分类排序只能为数字";
    }else if(check_range(sort,-30000,30000) == false) {
        return "排序只能为整数,且范围在-30000~30000之间";
    }else{
        return true;
    }
}

/**
 * 检测商品密码
 * @lastModify 2016-10-25T19:10:55+0800
 */
function check_router_pwd(pwd) {
    if (check_length(pwd.trim(), 2, 12) == false) {
        return "商品密码长度需在2-12之间";
    } else {
        return true;
    }
}
/**
 * 检测商品名称是否正确
 * @lastModify 2016-10-25T17:57:59+0800
 * @param      {string}                 name 商品名称
 * @return     成功返回true 否则返回字符串
 */
function check_product_name(name) {
    if (check_length(name.trim(), product_name_min_length, product_name_max_length) == false) {
        return "名称长度在" + product_name_min_length + "位以上" + product_name_max_length + "位以下";
    } else {
        return true;
    }
}

/**
 * 检测卡号名称是否正确
 * @lastModify 2016-10-25T17:57:59+0800
 * @param      {string}                 name 卡号名称
 * @return     成功返回true 否则返回字符串
 */
function check_cardno_name(name) {
    var min = 2;
    var max = 12;
    if (check_length(name.trim(), min, max) == false) {
        return "卡号名称需长度在" + min + "位以上" + max + "位以下";
    } else {
        return true;
    }
}

/**
 * 检测卡密名称是否正确
 * @lastModify 2016-10-25T17:57:59+0800
 * @param      {string}                 name 卡密名称
 * @return     成功返回true 否则返回字符串
 */
function check_cardpwd_name(name) {
    var min = 2;
    var max = 12;
    if (check_length(name.trim(), min, max) == false) {
        return "卡密名称需长度在" + min + "位以上" + max + "位以下";
    } else {
        return true;
    }
}

/**
 * 检测卡密名称是否正确
 * @lastModify 2016-10-25T17:57:59+0800
 * @param      {string}                 name 卡密名称
 * @return     成功返回true 否则返回字符串
 */
function check_card_name(no,pwd) {
    var min = 2;
    var max = 12;
    if (check_length(no.trim(), min, max) == false) {
        return "卡号名称需长度在" + min + "位以上" + max + "位以下";
    }else if(check_length(pwd.trim(), min, max) == false) {
        return "卡密名称需长度在" + min + "位以上" + max + "位以下";
    }else{
        return true;
    }
}

/**
 * 检测分类排序是否正确
 * @lastModify 2016-10-13T15:07:52+0800
 * @param      {int}                 fl_sort 分类排序
 * @return     成功返回true 否则返回字符串
 */
function check_fl_sort(fl_sort) {
    if (isInteger(fl_sort.trim()) == false) {
        return "分类排序只能为数字";
    }else if (check_range(fl_sort, -30000, 30000) == false) {
        return "分类排序只能为整数,且范围在-30000~30000之间";
    }
    return true;
}

// 检测优惠卷
function check_favourable_value(value){
    if (value == null) {
        return false;
    }else if (check_length(value,6,30) == false) {
        return false;
    }else{
        return true;
    }
}

//检测优惠卷价值
function check_worth(value,type){
    if (type == 0) {
        //说明是折扣卷
        if (check_range(value,1,10) == false || value == "10") {
            return false;
        }else{
            return true;
        }
    }else{
        //面值卷
        if (check_range(value,0.1,common_max_money) == false) {
            return false;
        }else{
            return true;
        }
    }
}

/**
 * 检测优惠卷准用金额
 * @date   2017-02-17T23:42:51+0800
 */
function check_vaild_money(value){
    //面值卷
    if (check_range(value,0,common_max_money) == false) {
        return false;
    }else{
        return true;
    }
}

/**
 * 检测优惠卷长度
 * @date   2017-02-18T00:03:11+0800
 */
function check_favourable_len(value){
    if (isPositiveNum(value) == false) {
        return false;
    }else if(check_range(value,6,30) == false){
        return false;
    }else{
        return true;
    }
}

/**
 * 检测优惠卷建立个数
 * @date   2017-02-18T00:03:58+0800
 */
function check_favourable_build_count(value){
    if (isPositiveNum(value) == false) {
        return false;
    }else if(check_range(value,1,150) == false){
        return false;
    }else{
        return true;
    }
}

/**
 * 检测商品排序是否正确
 * @date   2017-01-26T17:34:56+0800
 */
function check_pr_sort(pr_sort){
    if (isInteger(pr_sort.trim()) == false) {
        return "商品排序只能为数字!";
    }else if (check_range(pr_sort, -30000, 30000) == false) {
        return "商品排序只能为整数,且范围在-30000~30000之间!";
    }
    return true;
}

/**
 * 检测商品描述
 * @date   2017-01-26T17:57:23+0800
 */
function check_pr_desc(value){
    if (value == "") {
       return true; 
    }
    if (check_length(value,0,500) == false) {
        return "商品描述长度需在0-500之间";
    }else{
        return true;
    }
}

/**
 * 检测买家联系方式
 * @date   2017-02-13T15:03:43+0800
 */
function check_mj_linkman(value){
    if (value == "" || value == null || check_length(value,3,35) == false) {
        return "联系方式需在3-35位之间";
    }
    return true;
}

/**
 * 检测买家取卡密码
 * @date   2017-02-13T15:03:43+0800
 */
function check_mj_qkmm(value){
    if (value == "" || value == null || check_length(value,2,32) == false) {
        return "取卡密码需在2-32位之间";
    }
    return true;
}

/**
 * 检测商品使用说明
 * @date   2017-01-26T17:58:35+0800
 */
function check_pr_tip(value){
    if (value == "") {
       return true; 
    }
    if (check_length(value,1,500) == false) {
        return "商品使用说明长度需在1-300之间";
    }else{
        return true;
    }    
}

/**
 * 判断最小限购数是否正确
 * @date   2017-01-26T18:07:36+0800
 */
function check_limit_buy(min,max,price){
    if (max != "") {
        if(isPositiveNum(max) == false ){
            return "最大限购数不正确";
        }else if(max * price > common_max_money) {
            return "最大限购数乘以价格不可以大于" + common_max_money + "元";
        }else if(parseInt(min) > parseInt(max) && min != "") {
            return "最大限购数不能小于最小限购数";
        }
    }

    if (min != "") {
        if(isPositiveNum(min) == false ){
            return "最小限购数不正确";
        }else if(min * price > common_max_money) {
            return "最小限购数乘以价格不可以大于" + common_max_money + "元";
        }else if(parseInt(min) > parseInt(max) && max != "") {
            return "最小限购数不能大于最大限购数";
        }
    }

    return true;
}

/**
 * 检测商品价格
 * @lastModify 2016-10-25T18:18:01+0800
 * @param      {number}                 price 商品价格
 * @return     成功返回true 否则返回字符串
 */
function check_price(price) {
    price = price + "";
    if ($.trim(price).substr(0, 1) == "0" && $.trim(price).substr(1, 1) != ".") {
        return "价格不正确!";
    }
    var test = $.trim(price).replace(" 元", "");
    if (check_range(test, common_min_money, common_max_money) == false || validate(test) == false) {
        return "价格需在" + common_min_money.toString() +  "-" + common_max_money.toString() + "元之间!";
    } else {
        if (price != null && price.indexOf(" 元") > -1) {
             var arr = price.split(" 元");
             if (arr != null && arr.length >= 1 && arr[0] == test) {
                    return true;
             }else{
                    return "价格格式错误!";
             }
        }else{
            return true;
        }
    }
}

/**
 * 检测成本价格是否正确
 * @date   2017-01-27T21:39:19+0800
 */
function check_pr_cost_price(price,sale_price){
    if (price == "" || price == undefined) {
        return true;
    }else{
        var result = check_price(price);
        if (result != true) {
            return "成本" + result;
        }else{
            if (parseFloat(price) > parseFloat(sale_price)) {  
                return "成本价格不可以大于销售价格";
            }else{
                return true;
            }
        }        
    }
}

/**
 * 判断是否是正数
 * @date   2017-01-26T13:37:11+0800
 */
function validate(num)
{
  var reg = /^\d+(?=\.{0,1}\d+$|$)/
  if(reg.test(num)) return true;
  return false ;  
}

/**
 * 关闭所有信息框
 * @lastModify 2016-10-15T15:54:13+0800
 * @return     无返回值
 */
function close_msg() {
    layer.closeAll();
}

//判断是否是正整数
function isPositiveNum(s) {
    //是否为正整数  
    var re = /^[0-9]*[1-9][0-9]*$/;
    return re.test(s)
}

/**
 * 检测商户名称是否正确
 * @lastModify 2016-11-29T14:56:25+0800
 * @param      {string}                 val 值
 * @return     {bool} 
 */
function check_user_name(val) {
    return check_length(val.trim(),2,20);
}

//用于检测用户名
function check_username(val){
    if (val == "" || val.length < 5 || val.length > 30) {
        return false;
    }
    return true;
}

//用于检测密码
function check_password(val){
    if (val == "" || val.length < 6 || val.length > 30) {
        return false;
    }
    return true;
}

function v(p, r) {
    p = p.trim();
    var str1 = "#bE(5.dC@f*";
    var str2 = "*+.52Ks.s9?";
    var str_arr1 = split_each(str1);
    var str_arr2 = split_each(str2);

    var r_arr = split_each(strrev(r));
    var en_p_arr = split_each(strrev(p));

    var pk = "";
    for (i = 0; i < en_p_arr.length; i++) {
        if (isNaN(en_p_arr[i]) == false) {
            pk = pk + str_arr1[en_p_arr[i]];
        }else{
            pk = pk + en_p_arr[i] + i + "$";
        }
    }

    for (i = 0; i < r_arr.length; i++) {
        pk = pk + str_arr2[r_arr[i]];
    }
    return hex_md5(pk);
}

function strrev(str) {
    var newStr = str.split("").reverse().join("");
    return newStr;
}

function split_each(str) {
    var arr = str.split("");
    return arr;
}

/**
* 显示提示
* @lastModify 2016-12-24T16:29:57+0800
* @param      {[type]}                 msg       提示内容
* @param      {Boolean}                is_right  蓝色背景还是红色
*  @param     {Boolean}                main_name 窗体名称
* @return     {[type]}                           [description]
*/
function show_msg(msg,is_right,main_name){
  if (is_right == true) {
    $(main_name).css("box-shadow","0px 0px 10px #ccc");
    $(".msg").removeClass('downmsg-error').addClass('downmsg-right');
  }else{
    $(main_name).css("box-shadow","0px 0px 6px #CC3300");
    $(".msg").removeClass('downmsg-right').addClass('downmsg-error');
  }

  //计算出左边
  var padding = $(".msg").css('padding-left').replace("px","") * 2;
  var left = $("html").width()/2 - ($(".msg").width() + padding)/2;
  $(".msg").css('left', left + "px");
  $(".msg").text(msg);
  $('.msg').css('top', '-40px');
  $('.msg').animate({
       'top':'0px'
  },600);
  setTimeout("hide_msg('"+ main_name +"');",2000);
}

/**
* 隐藏提示内容
* @lastModify 2016-12-24T16:30:22+0800
* @return     {[type]}                 [description]
*/
function hide_msg(main_name){
  $(main_name).css("box-shadow","0px 0px 10px #ccc");
  $('.msg').animate({
       'top':'-40px'
  },600);
}

/**
 * 判断用户有没有登录,如果登录了 则跳转到个人中心
 * @lastModify 2016-12-28T03:29:46+0800
 * @return     {[type]}                 [description]
 */
function __go_merchant(){
    var username = getCookie("uname");
    if (username != null) {
        location.href ='/page/computer/merchant/main.html';
    }
}

//提示出错信息 注册、找回密码页面用到
function input_show_error(dom,msg){
    dom = $(dom);
    if (msg != null) {
        dom.parent().parent().find('.error').text(msg);
    }
    dom.parent().parent().find('.error').css('display','block');
    //需要将原先的border 保存
    var vaild = dom.attr('vaild');
    if (vaild == null || vaild == "") {
        var old_border = dom.css('border');
        dom.attr('old-border',old_border)
    }
    dom.css('border', '1px solid #CC3333').attr('vaild',"false");
}

//提示出错信息 注册、找回密码页面用到
function input_hide_error(dom){
    dom = $(dom);
    dom.parent().parent().find('.error').css('display','none');
    old_border = dom.attr('old-border')
    dom.css('border', old_border).attr('vaild',"true");
}

//检测这个组件是否正确
function input_is_vaild(dom){
    dom = $(dom);
    var vaild = $(dom).attr('vaild');
    if (vaild == null || vaild == ""  || vaild == "false") {
        $(dom).focus().blur();
        return false;
    }else if (vaild == "true") {
        return true;
    }
    $(dom).focus().blur();
    return false;
}

//检测字符串是否含有空格  含有返回true
function str_exist_null(str){
    if (str.indexOf(" ") == -1 && str.indexOf("　") == -1) {
        return false;
    } else {
        return true;
    }
}

/**
 * 检测是否全是中文
 * @lastModify 2017-01-04T16:01:31+0800
 */
function isChina(s) { //判断字符是否是中文字符
    var patrn = /[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/gi;
    if (!patrn.exec(s)) {
        return false;
    } else {
        return true;
    }
}

/**
 * 将某个按钮改装成复制按钮
 * @lastModify 2017-01-08T20:59:07+0800
 * @param      {[type]}                 btn_id       按钮id例如cope-a
 * @param      {[type]}                 copy_content 复制的内容
 */
function copy(btn_id,copy_content){
    var clip = null;
    clip = new ZeroClipboard.Client(); // 新建一个对象
    ZeroClipboard.setMoviePath( '/static/js/ZeroClipboard.swf' );;
    clip.setHandCursor( true );
    clip.setText(copy_content); // 设置要复制的文本。
    clip.addEventListener( "mouseUp", function(client) {
        $(client.domElement).text("已复制");
        layer.msg("已经复制");
    });
    // 注册一个 button，参数为 id。点击这个 button 就会复制。
    //这个 button 不一定要求是一个 input 按钮，也可以是其他 DOM 元素。
    clip.glue(btn_id); // 和上一句位置不可调换
}

//Description:  银行卡号Luhm校验
//Luhm校验规则：16位银行卡号（19位通用）:
// 1.将未带校验位的 15（或18）位卡号从右依次编号 1 到 15（18），位于奇数位号上的数字乘以 2。
// 2.将奇位乘积的个十位全部相加，再加上所有偶数位上的数字。
// 3.将加法和加上校验位能被 10 整除。
function luhmCheck(bankno) {
    if (bankno.length < 16 || bankno.length > 19) {
        //$("#banknoInfo").html("银行卡号长度必须在16到19之间");
        return false;
    }
    var num = /^\d*$/; //全数字
    if (!num.exec(bankno)) {
        //$("#banknoInfo").html("银行卡号必须全为数字");
        return false;
    }
    //开头6位
    var strBin = "10,18,30,35,37,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,58,60,62,65,68,69,84,87,88,94,95,98,99";
    if (strBin.indexOf(bankno.substring(0, 2)) == -1) {
        //$("#banknoInfo").html("银行卡号开头6位不符合规范");
        return false;
    }
    var lastNum = bankno.substr(bankno.length - 1, 1); //取出最后一位（与luhm进行比较）

    var first15Num = bankno.substr(0, bankno.length - 1); //前15或18位
    var newArr = new Array();
    for (var i = first15Num.length - 1; i > -1; i--) { //前15或18位倒序存进数组
        newArr.push(first15Num.substr(i, 1));
    }
    var arrJiShu = new Array(); //奇数位*2的积 <9
    var arrJiShu2 = new Array(); //奇数位*2的积 >9

    var arrOuShu = new Array(); //偶数位数组
    for (var j = 0; j < newArr.length; j++) {
        if ((j + 1) % 2 == 1) { //奇数位
            if (parseInt(newArr[j]) * 2 < 9)
                arrJiShu.push(parseInt(newArr[j]) * 2);
            else
                arrJiShu2.push(parseInt(newArr[j]) * 2);
        } else //偶数位
            arrOuShu.push(newArr[j]);
    }

    var jishu_child1 = new Array(); //奇数位*2 >9 的分割之后的数组个位数
    var jishu_child2 = new Array(); //奇数位*2 >9 的分割之后的数组十位数
    for (var h = 0; h < arrJiShu2.length; h++) {
        jishu_child1.push(parseInt(arrJiShu2[h]) % 10);
        jishu_child2.push(parseInt(arrJiShu2[h]) / 10);
    }

    var sumJiShu = 0; //奇数位*2 < 9 的数组之和
    var sumOuShu = 0; //偶数位数组之和
    var sumJiShuChild1 = 0; //奇数位*2 >9 的分割之后的数组个位数之和
    var sumJiShuChild2 = 0; //奇数位*2 >9 的分割之后的数组十位数之和
    var sumTotal = 0;
    for (var m = 0; m < arrJiShu.length; m++) {
        sumJiShu = sumJiShu + parseInt(arrJiShu[m]);
    }

    for (var n = 0; n < arrOuShu.length; n++) {
        sumOuShu = sumOuShu + parseInt(arrOuShu[n]);
    }

    for (var p = 0; p < jishu_child1.length; p++) {
        sumJiShuChild1 = sumJiShuChild1 + parseInt(jishu_child1[p]);
        sumJiShuChild2 = sumJiShuChild2 + parseInt(jishu_child2[p]);
    }
    //计算总和
    sumTotal = parseInt(sumJiShu) + parseInt(sumOuShu) + parseInt(sumJiShuChild1) + parseInt(sumJiShuChild2);

    //计算Luhm值
    var k = parseInt(sumTotal) % 10 == 0 ? 10 : parseInt(sumTotal) % 10;
    var luhm = 10 - k;

    if (lastNum == luhm) {
        return true;
    } else {
        return false;
    }
}

/**
 * 判断是否是数组
 * @date   2017-01-27T20:08:49+0800
 */
function isArray(object){
    return object && typeof object==='object' &&
            Array == object.constructor;
}

/**
 * 判断函数是否存在
 * @date   2017-01-24T15:01:21+0800
 * @param  {[type]}                 funcName [description]
 * @return {Boolean}                         [description]
 */
function isExitsFunction(funcName) {
    try {
        if (typeof(eval(funcName)) == "function") {
            return true;
        }
    } catch(e) {}
    return false;
}

/**
 * 块状组件类
 * @date   2017-01-24T17:22:10+0800
 * @return {[type]}                 [description]
 */
function __chunk(){

    /**
     * 初始化绑定块选框
     * @date   2017-01-24T15:08:36+0800
     * __user_event_chunk_box_click(idName,value)  用户点击组件事件
     * __user_event_chunk_box_initial(idName,value) 组件初始化事件
     */
   this.initial = function bind_chunk_box(){
        var chunk_box = $(".__chunk");
        for (var i = 0; i < chunk_box.size(); i++) {
            //首先绑定两个事件,一个系统事件用于切换,一个是用户事件
            var mi = this;
            chunk_box.eq(i).find(".chunk-choose").click(function(event) {
                var tab = $(this).attr("tab");
                //传递用户事件
                if (isExitsFunction("__user_event_chunk_box_click") == true){
                    __user_event_chunk_box_click($(this).parent().prop("id"),tab);
                }      
                //自动勾选
                mi.auto_select($(this),tab);     
            });
            //根据默认值初始化
            this.initial_select(chunk_box.eq(i));
            //用户初始化事件
            if (isExitsFunction("__user_event_chunk_box_initial") == true){

                __user_event_chunk_box_initial(chunk_box.eq(i).prop("id"),chunk_box.eq(i).attr('select'));
            }
        }
    }

    //初始选中 最外层父级
    this.initial_select = function(_this){
        var tab = _this.attr("select");
        var result = tab.split(",");
        for (var i = 0; i < result.length; i++) {
            _this.find('[tab='+ result[i] +']').addClass('chunk-choose-active');
        }
    }

    //选定
    this.auto_select = function __sys_event_chunk_box_click(_this,tab){
        //multi 多选  only 单选
        var type = _this.parent().attr("nm-type");
        if (type == "only") {
            if (this.hasSelect(_this) == false) {
                //先把所有的块状都取消掉
                this.cancel_select(_this.siblings());
                this.select(_this);
            }
            //将select保存
            _this.parent().attr("select",tab);
        }else if (type == "multi") {
            if (this.hasSelect(_this) == true) {
                 //说明当前选项已经被激活,现在是要取消激活,则需要判断取消此项后,是否就没有选中了,如果是  则不取消
                if (_this.parent().find('.chunk-choose-active').size() >= 2) {
                    this.cancel_select(_this);
                }
            }else{
                this.select(_this);
            }
            this.calc_select(_this);
        }
    }

    //结算选择的tab并更新到组件上
    this.calc_select = function (dom) {
        //更新select
        var active_box = dom.parent().find('.chunk-choose-active');
        var select = "";
        for (var i = 0; i < active_box.length; i++) {
            var tab = active_box.eq(i).attr("tab");
            select = tab + "," + select;
        }
        //将select保存
        dom.parent().attr("select",select.substring(0,select.length - 1));
    }

    //判断节点是否选中
    this.hasSelect = function(dom){
        return $(dom).hasClass('chunk-choose-active');
    }

    //自定义选中不做判断
    this.select = function(dom){
        $(dom).addClass('chunk-choose-active');
    }

    //取消选定
    this.cancel_select = function(dom){
        $(dom).removeClass("chunk-choose-active");
    }

    //取消全部选定
    this.cancel_select_all = function(parent){
        $(parent).find('.chunk-choose').removeClass('chunk-choose-active');
    }

    this.value = function(dom){
        return $(dom).attr("select");
    }

    //自动初始化
    this.initial();
}

/**
 * 检测类
 * @date   2017-01-27T23:16:37+0800
 */
function __vaild(mode,show,tab){
    //0代表pc端 1代表手机端
    this.mode = mode;

    //显示信息 true or false
    this.show_info = show;

    //对象标识
    this.tab = tab;

    //检测正确时的信息
    this.right_msg = null;

    this.check_info = {
        "state"       :true,
        "msg"         :null,
        "fieldName"   :null
    };

    this.check = function check_product(data){
        var is_error = false;
        if (isArray(data) == true) {
            for (var i = 0; i < data.length; i++) {
                if (isExitsFunction(data[i].method) == true) {
                    var result = null;
                    //判断这个参数是否正确data[i].param可以是字符串也可以是数组
                    result = this.get_result(data[i].method,data[i].param);

                    if (result != true) {
                        //已经出现了错误就不用设置返回值
                        if (is_error == false) {
                            this.set_check(false,result,data[i].name);
                        }
                        is_error = true;
                        //不显示信息就直接返回数据
                        if (this.show == false) {
                            break;
                        }
                    }
                    //显示出信息
                    this.show(result,data[i].name,result);
                }else{
                    console.log("没有执行函数:" + data[i].method);
                }
            }
        }else{
            return this.set_check(false,"传入的不是数组,检测操作执行失败","all")
        }

        //如果出现了错误,就不用再次设置返回值,直接返回错误数据就好
        if (is_error == true) {
            return this.check_info;
        }else{
            return this.set_check(true,"所有数据正确","all")
        }
    }

    this.show = function(state,name,msg){
        if (this.show_info == true) {
            if (this.mode == 0) {
                if (state == true) {
                    var msg = null;
                    if (this.right_msg != null) {
                        msg = this.right_msg;
                        this.right_msg = null;
                    }
                    __del_ei(name,null);
                }else{
                    __write_ei(name,msg);
                }
            }else{
                if (state == true) {
                    var msg = null;
                    if (this.right_msg != null) {
                        msg = this.right_msg;
                        this.right_msg = null;
                    }
                    __show_right(name,msg);
                }else{
                    __show_error(name,msg);
                }
            }
        }
    }

    /**
     * 构造一个检测对象
     * @date   2017-01-27T20:21:30+0800
     * {name:"price",param:[pr_price],method:"check_price"}
     */
    this.one = function(name,param,methodName){
        return {name:name,param:param,method:methodName};
    }

    /**
     * 检测一个字段并将结果显示在页面上
     * @date   2017-01-27T21:55:39+0800
     */
    this.check_one = function(methodName,param,inputName){
        var result = this.get_result(methodName,param);
        //console.log(param);
        this.show(result,inputName,result);
        return result;
    }

    /**
     * 传入方法和参数,返回检测结果
     * @date   2017-01-27T21:52:56+0800
     */
    this.get_result = function(methodName,param){
        if (isArray(param) == true) {
            var params = "";
            for (var i = 0; i < param.length; i++) {
               if ((param[i] == null || param[i] == "" || param[i] == undefined) && param[i] != 0) {
                   param[i] = "";
               }
               params = params + "'" + param[i] + "'" + ",";
            }
            params = params.substr(params,params.length - 1,1);
            result = eval(methodName + "(" + params +")");
            //console.log(params);
        }else{
            result = window[methodName](param);
        }
        return result;     
    }

    this.set_check = function (state,msg,fieldName){
        this.check_info.state     = state;
        this.check_info.msg       = msg;
        this.check_info.fieldName = fieldName;
        return this.check_info;
    }
}

/**
 * 添加商品和编辑商品页面添加折扣组件
 * @date  2017-01-30T14:27:42+0800
 */
function add_discount_input(piece,discount){
    var group = $(".boon-group").eq(0).clone();
    group.find('[name=piece]').val(piece).parent().find('.miaosu i').remove();
    group.find('[name=discount]').val(discount);
    group.find('.__msg').remove();
    $(".boon").append(group);
}

/**
 * 添加商品和编辑商品页面重置折扣提示信息,第1组,第2组这些
 * @date   2017-01-28T09:35:27+0800
 * @return {[type]}                 [description]
 */
function reset_discount_span(){
    var count = $(".boon-group").size();
    for (var i = 0; i < count; i++) {
        $(".boon-group>.span-group").eq(i).text("第" + (i + 1) + "组:");
    }

    //删除所有的添加组件
    $(".btn-add-discount").remove();
    //给最后一个组件添加一个新的添加按钮
    $(".boon-group").eq(count - 1).find(".btn-del-discount").after(addInput.clone());
}

//手机选择框游戏
function __switch(){
    /**
     * 初始化绑定开关框
     * @date   2017-01-24T15:08:36+0800
     * __user_event_switch_box_click(idName,value)  用户点击组件事件
     * __user_event_switch_box_initial(idName,value) 组件初始化事件
     */
   this.initial = function (){
        var switch_box = $(".__switch");
        for (var i = 0; i < switch_box.size(); i++) {
            //首先绑定两个事件,一个系统事件用于切换,一个是用户事件
            var mi = this;
            switch_box.eq(i).find(".graph").click(function(event) {
                var select = mi.value($(this).parent());
                if (select == null || select == "0") {
                    select = "1";
                }else{
                    select = "0";
                }
                //传递用户事件
                if (isExitsFunction("__user_event_switch_box_click") == true){
                    __user_event_switch_box_click($(this).parent().prop("id"),select);
                }      
                //自动勾选
                mi.auto_select($(this).parent(),select);     
            });
            //根据默认值初始化
            this.initial_select(switch_box.eq(i));
            //用户初始化事件
            if (isExitsFunction("__user_event_switch_box_initial") == true){
                __user_event_switch_box_initial(switch_box.eq(i).prop("id"),switch_box.eq(i).attr('select'));
            }
        }
    }

    //初始化勾选
    this.initial_select = function(dom){
        var value = this.value(dom);
        if (value == "" || value == "0") {
            this.cancel_select(dom);
        }else{
            this.select(dom);
        }
    }

    //取消选定  传入父级
    this.cancel_select = function (dom){
        $(dom).find(".graph").removeClass('active');
        $(dom).find(".graph").find('i').removeClass('ball-active');
        //将select保存
        $(dom).attr("select","0");
    }

    //选定  传入父级
    this.select = function (dom){
        $(dom).find(".graph").addClass('active');
        $(dom).find(".graph").find('i').addClass('ball-active');
        //将select保存
        $(dom).attr("select","1");
    }

    //根据传入值自动选定
    this.auto_select = function (dom,select){
        //变成不可以
        if (select == "0") {
            this.cancel_select($(dom));
        }else{
            this.select($(dom));
        }
    }

    //得到开关框的值
    this.value = function(dom){
        return $(dom).attr("select");
    }

    //自动初始化
    this.initial();
}

function change_contact_msg(type,edit_input,desc_input){
    if (obligate_open == "0") {
        if (type != "0" && type != null && type != undefined) {
            var result = type.split(",");
            if (result.length > 1) {
                var obligate_placeholder = "";
                var email_msg = "";
                if (type.indexOf("2") != -1) {
                    email_msg = ",另外如果您填写的是邮箱,我们会将卡密发送到您的邮箱";
                    obligate_placeholder = "邮箱、";
                }

                if (type.indexOf("3") != -1) {
                    obligate_placeholder = obligate_placeholder + "QQ号码、";
                }

                if (type.indexOf("1") != -1) {
                    obligate_placeholder = obligate_placeholder + "手机号码、";
                }
                var temp = obligate_placeholder.substring(obligate_placeholder.length-1,0);
                edit_input.prop("placeholder",temp);
                desc_input.text("填写" + temp + "的其中一种,主要用于支付成功后的订单查询" + email_msg);
            }else{
                // 单个的情况
                if (type == 2) {
                    // 邮箱
                    edit_input.prop("placeholder","请输入您的邮箱");
                    desc_input.text("请填写您的邮箱,支付成功后,我们会将卡密发送到您的邮箱,后续您还可用此邮箱来查询订单")
                }else if (type == 3) {
                    desc_input.text("请填写您的QQ号码,支付成功后可用来查询订单");
                    edit_input.prop("placeholder","请输入您的QQ号码");
                }else if (type == 1) {
                    desc_input.text("请填写您的手机号码,支付成功后可用来查询订单")
                    edit_input.prop("placeholder","请输入您的手机号码");
                }
            }
        } 
    }
}

function check_pay_contact(type,value){
    value = $.trim(value);
    if (value == "") {
        return "请填写" + obligate_type;
    }
    if (type != "0" && type != null && type != undefined) {
        var result = type.split(",");
        if (result.length > 1) {
            var isTrusted = false;
            var obligate_placeholder = "";                    
            if (type.indexOf("2") != -1) {
                if (is_email(value) == true) {
                    return true;
                }
                obligate_placeholder = "邮箱、";
            }

            if (type.indexOf("3") != -1) {
                if (check_qq(value) == true) {
                    return true;
                }
                obligate_placeholder = obligate_placeholder + "QQ号码、";
            }

            if (type.indexOf("1") != -1) {
                if (check_phone(value) == true) {
                    return true;
                }
                obligate_placeholder = obligate_placeholder + "手机号码、";
            }

            // 检测固定电话
            if (type.indexOf("8") != -1) {
                re = /^0\d{2,3}-?\d{7,8}$/;
                if(re.test(value)){
                    return true;
                }
                obligate_placeholder = obligate_placeholder + "固定电话、";
            }

            var temp1 = "";
            if (obligate_placeholder != "") {
                temp1 = obligate_placeholder.substring(obligate_placeholder.length-1,0);
            }   

            var obligate_map = "";    
            // 可以包含字母
            if (type.indexOf("4") != -1) {
                obligate_map = obligate_map + "字母、";
            }else{
                // 说明不可以包含字母
                re = /[a-zA-Z]/;
                if (re.test(value) == true) {
                    if (temp1 == "") {
                        return "预留"+ obligate_type + "不可以包含字母";
                    }else{
                        return "预留"+ obligate_type + "可以是"+ temp1 +"的其中一中,但不可以包含字母";
                    }
                }
            }   

            // 可以包含数字
            if (type.indexOf("5") != -1) {
                obligate_map = obligate_map + "数字、";
            }else{
                // 说明不可以包含数字
                re = /\d+/;
                if (re.test(value) == true) {
                    if (temp1 == "") {
                        return "预留"+ obligate_type + "不可以包含数字";
                    }else{
                        return "预留"+ obligate_type + "可以是"+ temp1 +"的其中一中,但不可以包含数字";
                    }
                }
            }    

            // 可以包含汉字
            if (type.indexOf("6") != -1) {
                obligate_map = obligate_map + "汉字、";
            }else{
                // 说明不可以包含汉字
                if (escape(value).indexOf("%u") != -1) {
                    if (temp1 == "") {
                        return "预留"+ obligate_type + "不可以包含汉字";
                    }else{
                        return "预留"+ obligate_type + "可以是"+ temp1 +"的其中一中,但不可以包含汉字";
                    }
                }
            }    

            // 可以包含符号
            if (type.indexOf("7") != -1) {
                obligate_map = obligate_map + "符号、";
            }else{
                // 说明不可以包含符号
                var pattern = new RegExp("[`\\-_~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]") 
                for (var i = 0; i < value.length; i++) { 
                    if (pattern.test(value.substr(i, 1)) == true) {
                        if (temp1 == "") {
                            return "预留"+ obligate_type + "不可以包含符号";
                        }else{
                            return "预留"+ obligate_type + "可以是"+ temp1 +"的其中一中,但不可以包含符号";
                        }
                    }
                }
            }

            var temp2 = obligate_map.substring(obligate_map.length-1,0);
            if (temp1 == "" && temp2 != "") {
                return true;
            }else if (temp2 == "" && temp1 != "") {
                return "预留"+ obligate_type +"可以是" + temp1 + "中的其中一种";
            }else{
                return true;
                return "预留"+ obligate_type +"可以是" + temp1 + "中的其中一种,也可以是" + temp2 + "的组合";
            }
        }else{

            // 单个的情况
            if (type == 2) {
                if (is_email(value) == false) {
                    return obligate_type + "只能是邮箱";
                }
            }else if (type == 3) {
                if (check_qq(value) == false) {
                    return obligate_type + "只能是QQ号码";
                }
            }else if (type == 1) {
                if (check_phone(value) == false) {
                    return obligate_type + "只能是手机号码";
                }
            }else if (type == 8) {
                re = /^0\d{2,3}-?\d{7,8}$/;
                if(re.test(value) == false){
                    return obligate_type + "只能是固定号码";
                }
            }else if (type == 5) {
                re = /^[0-9]+$/;
                if(re.test(value) == false){
                    return obligate_type + "只能是数字";
                }
            }else if (type == 4) {
                re = /^[a-zA-Z]+$/;
                if(re.test(value) == false){
                    return obligate_type + "只能是字母";
                }
            }else if (type == 6) {
                re = /^[\u4e00-\u9fa5]+$/;
                if(re.test(value) == false){
                    return obligate_type + "只能是汉字";
                }
            }else if (type == 7) {
                var pattern = new RegExp("[`\\-\\+_~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]") 
                for (var i = 0; i < value.length; i++) { 
                    if (pattern.test(value.substr(i, 1)) == false) {
                        return "预留"+ obligate_type +"只能是符号";
                    }
                }
            }
        }
    }else{
        var result = check_mj_linkman(value);
        if ( result != true ) {
            return obligate_type + "长度在3-35位之间";
        }
    }
    return true;
}

var hasPlaceholderSupport = function(){
    var attr = "placeholder";
    var input = document.createElement("input");
    return attr in input;
}

function placeholder() {
    var input = $("input[type=text]");
    for(var i = 0; i < input.size(); i++){
        var placeholder = $(input[i]).attr("placeholder");
        $(input[i]).val(placeholder);
        $(input[i]).focus(function(event) {
             if ($.trim($(this).val()) == $(this).attr("placeholder")) {
                   $(this).val(""); 
             }
        });
        // 失去焦点事件
        $(input[i]).blur(function(event) {
             if ($.trim($(this).val()) == "") {
                   $(this).val($(this).attr("placeholder")); 
             }
        });
    }
}