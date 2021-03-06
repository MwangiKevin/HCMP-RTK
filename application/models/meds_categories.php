<?php
/**
 * @author Collins
 */
class meds_categories extends Doctrine_Record {
	
	public function setTableDefinition() {
		$this -> hasColumn('id', 'int');
		$this -> hasColumn('category_name', 'varchar', 100);
		$this -> hasColumn('status', 'int');
		
	}

	public function setUp() {
		$this -> setTableName('meds_categories');
		//$this -> hasMany('commodity_source as supplier_name', array('local' => 'commodity_source_id', 'foreign' => 'id'));
		//$this -> hasMany('commodity_sub_category as sub_category_data', array('local' => 'commodity_sub_category_id', 'foreign' => 'id'));
		//$this -> hasOne('Facility_stocks as facility', array('local' => 'id', 'foreign' => 'commodity_id'));
	}
	//get all the categories for the commodities available
	public static function get_all() {
		$query = Doctrine_Query::create() -> select("*") -> from("meds_categories")->where("status = 1");
		$categories = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		
		return $categories;
	}
	
}