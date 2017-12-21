<?php
/**
 * 配置管理
 */
class ConfigAction extends BaseAction{
  /**
   * 保存配置
   * @return [type] [description]
   */
  public function save($key,$value){
     C($key,$value);
     $this->showData();
  }
}