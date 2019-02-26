<?php
class OrdersAnalysis_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

    function analyForChannel($cons){
		$lists=array();
		$cache=Cache::getInstance();
		$channelList=$cache->get('channelList');
		if($channelList){
			$channelList=array_merge($channelList,array(array('id'=>'99999','channelname'=>'组合支付')));
			foreach($channelList as $key=>$val){
				$total_orders=0;
				$success_orders=0;
				$total_money=0;
				$success_money=0;
				$income_money=0;
				$s_income_money=0;
				$result=$this->db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons AND channelid=".$val['id']."");
				$total_orders=$this->db->num_rows($result);
				if($total_orders>0){
					while($row=$this->db->fetch_array($result)){
						//金额
						$res1=$this->db->query("SELECT sum(money) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row['orderid']."%'");
						$row1=$this->db->fetch_array($res1);
						$t_money=$row1[0]==null ? 0 : $row1[0];
						$total_money+=$t_money;
						//成功金额
						$res2=$this->db->query("SELECT sum(realmoney),sum(realmoney*price),sum(realmoney*(platformPrice)) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row['orderid']."%' AND is_state=1");
						$row2=$this->db->fetch_array($res2);
						$s_money=$row2[0]==null ? 0 : $row2[0];
						$i_money=$row2[1]==null ? 0 : $row2[1];
						$s_i_money=$row2[2]==null ? 0 : $row2[2];
						$success_money+=$s_money;
						$income_money+=$i_money;
						$s_income_money+=$s_i_money;
					}
				}
				$s_income_money=$s_income_money<0 ? 0 : $s_income_money;

				//成功订单数
				$result=$this->db->query("SELECT id FROM ".DB_PREFIX."buylist $cons AND channelid=".$val['id']." AND is_status<>0 AND is_status<>4");
				$success_orders=$this->db->num_rows($result);

				$lists[]=array(
					'channelid'=>$val['id'],
					'channelname'=>$val['channelname'],
					'total_orders'=>$total_orders,
					'success_orders'=>$success_orders,
					'total_money'=>$total_money,
					'success_money'=>$success_money,
					'income_money'=>$income_money,
					'sys_income_money'=>$s_income_money
					);
			}
		}

		return $lists;
	}

	function anaForHour($cons){
		$lists=array();
		for($i=0;$i<24;$i++){
			$cons1=$cons!='' ? $cons." AND hour(addtime)=$i" : '';
			//总订单和总金额
			$res=$this->db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons1");
			$total_orders=$this->db->num_rows($res);
			$total_money=0;
			if($total_orders>0){
			    while($row=$this->db->fetch_array($res)){
				    $res1=$this->db->query("SELECT sum(money) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row['orderid']."%'");
					$row1=$this->db->fetch_array($res1);
					$total_money+=$row1[0];
				}
			}

			//成功订单、金额、收入
			$res=$this->db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons1 AND is_status<>0 AND is_status<>4");
			$success_orders=$this->db->num_rows($res);
			$success_money=0;
			$income_money=0;
			$sys_income_money=0;
			if($success_orders>0){
			    while($row=$this->db->fetch_array($res)){
				    $res1=$this->db->query("SELECT sum(realmoney),sum(realmoney*price),sum(realmoney*(platformPrice)) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row['orderid']."%'");
					$row1=$this->db->fetch_array($res1);
					$success_money+=$row1[0];
					$income_money+=$row1[1];
					$sys_income_money+=$row1[2];
				}
			}

            $sys_income_money=$sys_income_money<0 ? 0 : $sys_income_money;

		    $lists[$i]=array(
				'total_orders'=>$total_orders,
			    'success_orders'=>$success_orders,
				'total_money'=>$total_money,
				'success_money'=>$success_money,
				'income_money'=>$income_money,
				'sys_income_money'=>$sys_income_money,
				'fail_orders'=>$total_orders-$success_orders,
			);
		}
        return $lists;
    }
}
?>