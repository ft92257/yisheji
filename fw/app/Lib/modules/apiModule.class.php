<?php
class apiModule extends BaseModule{
	
public function index()
	{		
		
		$l = intval($_REQUEST['l']) ? "limit ".intval($_REQUEST['l']) : "";
		$r = strim($_REQUEST['r']);   //推荐类型
		$id = intval($_REQUEST['id']);  //分类id
		$loc = strim($_REQUEST['loc']);  //地区
		$tag = strim($_REQUEST['tag']);  //标签
		$kw = strim($_REQUEST['k']);    //关键词
		
		if(intval($_REQUEST['redirect'])==1)
		{
			$param = array();
			if($r!="")
			{
				$param = array_merge($param,array("r"=>$r));
			}
			if($id>0)
			{
				$param = array_merge($param,array("id"=>$id));
			}
			if($loc!="")
			{
				$param = array_merge($param,array("loc"=>$loc));
			}
			if($tag!="")
			{
				$param = array_merge($param,array("tag"=>$tag));
			}
			if($kw!="")
			{
				$param = array_merge($param,array("k"=>$kw));
			}
		}
		
		$image_list = load_dynamic_cache("INDEX_IMAGE_LIST");
		if($image_list===false)
		{
			$image_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."index_image order by sort asc");
		}
		$cate_result = load_dynamic_cache("INDEX_CATE_LIST");
		if($cate_result===false)
		{
			$cate_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal_cate order by sort asc");
			$cate_result= array();
			foreach($cate_list as $k=>$v)
			{
				$cate_result[$v['id']] = $v;
			}
		}
		$loc_result = load_dynamic_cache("INDEX_CATE_LOC");
		if($loc_result===false)
		{
			$loc_list = $GLOBALS['db']->getAll("select province from ".DB_PREFIX."deal GROUP by province");
			$loc_result= array();
			foreach($loc_list as $k=>$v)
			{
				$loc_result[$v['province']] = $v;
			}
		}
		
		$condition = " is_delete = 0 and is_effect = 1 "; 
		if($r!="")
		{
			if($r=="new")
			{
				$condition.=" and ".NOW_TIME." - begin_time < ".(24*3600)." and ".NOW_TIME." - begin_time > 0 ";  //上线不超过一天
			}
			if($r=="nend")
			{
				$condition.=" and end_time - ".NOW_TIME." < ".(24*3600)." and end_time - ".NOW_TIME." > 0 ";  //当天就要结束
			}
			if($r=="classic")
			{
				$condition.=" and is_classic = 1 ";
			}
		}
		if($id>0)
		{
			$condition.= " and cate_id = ".$id;		
		}
		
		if($loc!="" && $loc!="all")
		{
			$condition.=" and (province = '".$loc."' or city = '".$loc."') ";
		}
		
		if($tag!="")
		{
			$unicode_tag = str_to_unicode_string($tag);
			$condition.=" and match(tags_match) against('".$unicode_tag."'  IN BOOLEAN MODE) ";
		}
		
		if($kw!="")
		{		
			$kws_div = div_str($kw);
			foreach($kws_div as $k=>$item)
			{
				
				$kws[$k] = str_to_unicode_string($item);
			}
			$ukeyword = implode(" ",$kws);
			$condition.=" and (match(name_match) against('".$ukeyword."'  IN BOOLEAN MODE) or match(tags_match) against('".$ukeyword."'  IN BOOLEAN MODE)  or name like '%".$kw."%') ";
		}
		
		$deal_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."deal where ".$condition." order by sort asc ");
		$deal_count = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."deal where ".$condition);
		foreach($deal_list as $k=>$v)
		{
			$deal_list[$k]['support_amount'] = number_price_format($deal_list[$k]['support_amount']);
			$deal_list[$k]['image'] = APP_ROOT.substr($deal_list[$k]['image'], 1);
			$deal_list[$k]['remain_days'] = floor(($v['end_time'] - NOW_TIME)/(24*3600));
			$deal_list[$k]['percent'] = round($v['support_amount']/$v['limit_price']*100);
			$deal_list[$k]['limit_price']=number_format($v['limit_price']);
		}
		$arr = array(
				'data' => $deal_list,
				'total' => $deal_count
				);
		
		echo json_encode($arr);
	}
}