<?php
return array(
		'status' => array(),
		//是否真实用户
		'isReal' => array(),
		//是否原创案例
		'isOriginal' => array(),
		//热门标识
		'hot' => array(),
		//推荐标识
		'recommend' => array(),
		//授权
		'authorize' => array(
				'0' => '不限制', 
				'1' => '禁止匿名转载；禁止商业使用', 
				'2' => '禁止匿名转载；禁止商业使用；禁止个人使用'
				),
		//用户分类
		'userType' => array(
				'1' => '业主', 
				'2' => '设计师', 
				'3' => '装修公司'
				),
		//设计费用
		'designFee' => array(
				'1' => '5,0000以下',
				'2' => '5,0000~20,0000',
				'3' => '20,0000~50,0000',
				'4' => '50,0000以上'
				),
		//服务地区
		'serviceArea' => array(
				'1' => '北京',
				'289' => '广州',
				'9' => '上海'
				),
		//户型分类
		'houseType' => array(
				'1' => '一房',
				'2' => '二房',
				'3' => '三房',
				'4' => '四房及以上平层公寓',
				'5' => '复式',
				'6' => '别墅'
				),
		//活动分类
		'activeType' => array(
				'1' => '展览', 
				'2' => '商业交流', 
				'3' => '聚会'
				),
		//设计风格分类
		'style' => array(
				'1'=>'意式风格',
				'2'=>'美国乡村',
				'3'=>'东南亚风格',
				'4'=>'简约主义',
				'5'=>'田园风格',
				'6'=>'中式',
				'7'=>'奢华',
				'8'=>'地中海风格'
				),
		//专业分类
		'decorationType' => array(
				'1' => '住宅设计', 
				'2' => '商业空间', 
				'3' => '软装设计',
				'4' => '景观设计',
				'5' => '建筑设计'
				),
		'sex' => array(
				'0' => '保密',
				 '1' => '男',
				 '2' => '女'
				),
		//设计师是否经过审核（只有审核通过的数据会被列表显示）
		'ischeck' => array(
				'0' => '未审核',
				'1' => '审核通过',
				'2' => '审核未通过'
				),
		//设计师职称
		'designation' => array(
				'0' => '无职称', 
				'1' => '中级',
				'2' => '高级'
				),
		//标签分类
		'tagType' => array(
				'1' => '装修公司', 
				'2' => '施工队', 
				'3' => '样板房', 
				'4' => '案例'
				),
		'pictureType' => array(
				'1' => '活动',
				'2' => '案例',
				'3' => '样板房'
				),
		//职业
		'occupation' => array(
				'1' => 'IT计算机软/硬件互联网',
				'2' => '证券/金融/投资',
				'3' => '销售',
				'4' => '客服及技术支持',
				'5' => '财务/审计/税务',
				'6' => '影视/媒体',
				'7' => '行政/人力资源',
				'8' => '物流',
				'9' => '物业',
				'10' => '教育培训',
				'11' => '医疗',
				'12' => '采购',
				'13' => '餐饮/娱乐',
				'15' => '银行/保险',
				'16' => '酒店/旅游',
				'17' => '通讯技术',
				'18' => '电子/电气/半导体/仪器仪表',
				'19' => '工程/机械/能源',
				'20' => '服装/纺织/皮革',
				'21' => '法律/法务'
				),
		//爱好
		'hobby' => array(
				'1' => '美食',
				'2' => '电影',
				'3' => '唱歌',
				'4' => '运动',
				'5' => '旅游',
				'6' => '汽车',
				'7' => '购车',
				'8' => '数码',
				'9' => '看书',
				'10' => '摄影',
				'11' => '设计',
				'12' => '休闲'
				),
		//问题属性
		'attr' => array(
			'1' => 'decoration_type',
			'2' => 'housetype',
			'3' => 'style',
			'4' => 'design_fee'
		),
	);
		
		
		
		
?>
