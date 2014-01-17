<?php 

/**
 * 图文编辑模型
 *
 */
class ArticleModel extends BaseModel {
	
	/*
	 * 验证form字段规则
	 */
	protected $aValidate = array(
		array('title', 'required', '请填写标题名称！'),
		array('content','required','请填写文章内容!'),
	);
	
	/*
	 * 获取新闻内容
	 */
	public function getNews($data) {
		$ret = array();
		foreach($data as $value) {
			$ret[] = array(
						'id'=>$value['id'],
						'href'=> U('/Article/edit/id/' . $value['id']),
						'title'=>$value['title'],
						'info'=>$value['info'],
						'content'=>$value['content'],
						'createtime'=>$value['createtime']
					);
		}
		
		return $ret;
	}
	
	
	
	
}



?>