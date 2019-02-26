<?php
/**
* 2015-06-29 修复签名问题
**/
require_once "WxPay.Config.php";
require_once "WxPay.Exception.php";

/**
 * 
 * 数据对象基础类，该类中定义数据类最基本的行为，包括：
 * 计算/设置/获取签名、输出xml格式的参数、从xml读取数据对象等
 * @author widyhu
 *
 */
class WxPayDataBase
{
	protected $values = array();
	
	/**
     * 设置签名，详见签名生成算法
     * @param string $value 
     **/
	public function SetSign()
	{
		$sign = $this->MakeSign();
		$this->values['sign'] = $sign;
		return $sign;
	}
	
	/**
     * 获取签名，详见签名生成算法的值
     * @return 值
     **/
	public function GetSign()
	{
		return $this->values['sign'];
	}
	
	/**
     * 判断签名，详见签名生成算法是否存在
     * @return true 或 false
     **/
	public function IsSignSet()
	{
		return array_key_exists('sign', $this->values);
	}

	/**
     * 输出xml字符
     * @throws WxPayException
     **/
	public function ToXml()
	{
		if(!is_array($this->values) 
			|| count($this->values) <= 0)
		{
    		throw new WxPayException("数组数据异常！");
    	}
    	
    	$xml = "<xml>";
    	foreach ($this->values as $key=>$val)
    	{
    		if (is_numeric($val)){
    			$xml.="<".$key.">".$val."</".$key.">";
    		}else{
    			$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
    		}
        }
        $xml.="</xml>";
        return $xml; 
	}
	
    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	public function FromXml($xml)
	{	
		if(!$xml){
			throw new WxPayException("xml数据异常！");
		}
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $this->values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);		
		return $this->values;
	}
	
	/**
     * 格式化参数格式化成url参数
     */
	public function ToUrlParams()
	{
		$buff = "";
		foreach ($this->values as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
	
	/**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
	public function MakeSign()
	{
		//签名步骤一：按字典序排序参数
		ksort($this->values);
		$string = $this->ToUrlParams();
		//签名步骤二：在string后加入KEY
		$string = $string . "&key=".WxPayConfig::KEY;
		//签名步骤三：MD5加密
		$string = md5($string);
		//签名步骤四：所有字符转为大写
		$result = strtoupper($string);
		return $result;
	}
	
	/**
     * 获取设置的值
     */
	public function GetValues()
	{
		return $this->values;
	}
}

/**
 * 
 * 接口调用结果类
 * @author widyhu
 *
 */
class WxPayResults extends WxPayDataBase
{
	/**
     * 
     * 检测签名
     */
	public function CheckSign()
	{
		//fix异常
		if(!$this->IsSignSet()){
			throw new WxPayException("签名错误！");
		}
		
		$sign = $this->MakeSign();
		if($this->GetSign() == $sign){
			return true;
		}
		throw new WxPayException("签名错误！");
	}
	
	/**
     * 
     * 使用数组初始化
     * @param array $array
     */
	public function FromArray($array)
	{
		$this->values = $array;
	}
	
	/**
     * 
     * 使用数组初始化对象
     * @param array $array
     * @param 是否检测签名 $noCheckSign
     */
	public static function InitFromArray($array, $noCheckSign = false)
	{
		$obj = new self();
		$obj->FromArray($array);
		if($noCheckSign == false){
			$obj->CheckSign();
		}
        return $obj;
	}
	
	/**
     * 
     * 设置参数
     * @param string $key
     * @param string $value
     */
	public function SetData($key, $value)
	{
		$this->values[$key] = $value;
	}
	
    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	public static function Init($xml)
	{	
		$obj = new self();
		$obj->FromXml($xml);
		//fix bug 2015-06-29
		if($obj->values['return_code'] != 'SUCCESS'){
            return $obj->GetValues();
		}
		//$obj->CheckSign();
        return $obj->GetValues();
	}
}


/**
 * 
 * 企业付款到个人账户
 * @author 
 *
 */
class WxPayTransfers extends WxPayDataBase
{	
	/**
     * 设置微信分配的公众账号ID
     * @param string $value 
     **/
	public function SetAppid($value)
	{
		$this->values['mch_appid'] = $value;
	}
	/**
     * 获取微信分配的公众账号ID的值
     * @return 值
     **/
	public function GetAppid()
	{
		return $this->values['mch_appid'];
	}
	/**
     * 判断微信分配的公众账号ID是否存在
     * @return true 或 false
     **/
	public function IsAppidSet()
	{
		return array_key_exists('mch_appid', $this->values);
	}


	/**
     * 设置微信支付分配的商户号
     * @param string $value 
     **/
	public function SetMch_id($value)
	{
		$this->values['mchid'] = $value;
	}
	/**
     * 获取微信支付分配的商户号的值
     * @return 值
     **/
	public function GetMch_id()
	{
		return $this->values['mchid'];
	}
	/**
     * 判断微信支付分配的商户号是否存在
     * @return true 或 false
     **/
	public function IsMch_idSet()
	{
		return array_key_exists('mchid', $this->values);
	}


	/**
     * 设置微信支付分配的终端设备号，商户自定义
     * @param string $value 
     **/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
     * 获取微信支付分配的终端设备号，商户自定义的值
     * @return 值
     **/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
     * 判断微信支付分配的终端设备号，商户自定义是否存在
     * @return true 或 false
     **/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
     * 设置随机字符串，不长于32位。推荐随机数生成算法
     * @param string $value 
     **/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
     * 获取随机字符串，不长于32位。推荐随机数生成算法的值
     * @return 值
     **/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
     * 判断随机字符串，不长于32位。推荐随机数生成算法是否存在
     * @return true 或 false
     **/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}

	/**
     * 设置商户订单号
     * @param string $value 
     **/
	public function SetTradeno($value)
	{
		$this->values['partner_trade_no'] = $value;
	}
	/**
     * 获取商户订单号
     * @return 值
     **/
	public function GetTradeno()
	{
		return $this->values['partner_trade_no'];
	}
	/**
     * 判断商户订单号
     * @return true 或 false
     **/
	public function IsTradenoSet()
	{
		return array_key_exists('partner_trade_no', $this->values);
	}


	/**
     * 设置Openid
     * @param string $value 
     **/
	public function SetOpenid($value)
	{
		$this->values['openid'] = $value;
	}
	/**
     * 获取Openid
     * @return 值
     **/
	public function GetOpenid()
	{
		return $this->values['openid'];
	}
	/**
     * 判断Openid是否存在
     * @return true 或 false
     **/
	public function IsOpenidSet()
	{
		return array_key_exists('openid', $this->values);
	}


	/**
     * 设置校验用户姓名选项
     * @param string $value 
     **/
	public function SetCheckName($value)
	{
		$this->values['check_name'] = $value;
	}
	/**
     * 获取校验用户姓名选项
     * @return 值
     **/
	public function GetCheckName()
	{
		return $this->values['check_name'];
	}
	/**
     * 判校验用户姓名选项
     * @return true 或 false
     **/
	public function IsCheckName()
	{
		return array_key_exists('check_name', $this->values);
	}


	/**
     * 设置收款用户姓名
     * @param string $value 
     **/
	public function Setre_user_name($value)
	{
		$this->values['re_user_name'] = $value;
	}
	/**
     * 获取收款用户姓名
     * @return 值
     **/
	public function Getre_user_name()
	{
		return $this->values['re_user_name'];
	}
	/**
     * 判断收款用户姓名
     * @return true 或 false
     **/
	public function Isre_user_name()
	{
		return array_key_exists('re_user_name', $this->values);
	}


	/**
     * 设置金额
     * @param string $value 
     **/
	public function SetAmount($value)
	{
		$this->values['amount'] = $value;
	}
	/**
     * 获取金额
     * @return 值
     **/
	public function GetAmount()
	{
		return $this->values['amount'];
	}
	/**
     * 判断金额
     * @return true 或 false
     **/
	public function IsAmount()
	{
		return array_key_exists('amount', $this->values);
	}


	/**
     * 设置描述
     * @param string $value 
     **/
	public function SetDesc($value)
	{
		$this->values['desc'] = $value;
	}
	/**
     * 获取描述
     * @return 值
     **/
	public function GetDesc()
	{
		return $this->values['desc'];
	}
	/**
     * 判断描述
     * @return true 或 false
     **/
	public function IsDesc()
	{
		return array_key_exists('desc', $this->values);
	}

    /**
     * 设置APP和网页支付提交用户端ip，Native支付填调用微信支付API的机器IP。
     * @param string $value 
     **/
	public function SetSpbill_create_ip($value)
	{
		$this->values['spbill_create_ip'] = $value;
	}
	/**
     * 获取APP和网页支付提交用户端ip，Native支付填调用微信支付API的机器IP。的值
     * @return 值
     **/
	public function GetSpbill_create_ip()
	{
		return $this->values['spbill_create_ip'];
	}
	/**
     * 判断APP和网页支付提交用户端ip，Native支付填调用微信支付API的机器IP。是否存在
     * @return true 或 false
     **/
	public function IsSpbill_create_ipSet()
	{
		return array_key_exists('spbill_create_ip', $this->values);
	}

}
