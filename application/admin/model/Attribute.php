<?php 
namespace app\admin\model;
use think\Model;

class Attribute extends Model{
	protected $pk = 'attr_id';
	protected $autoWriteTimestamp = true;
}