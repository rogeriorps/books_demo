<?php

class Book{
	private $bcid;
	private $isbn;
	private $title;
	private $author1;
	private $author2;
	private $author3;
	private $author4;
	private $author5;
	private $cover;
	private $category1;
	private $category2;
	private $category3;
	private $language;
	private $pages;
	private $hardcover_flag;
	private $description;
	private $edition;
	private $publisher;
	private $year;
        	private $activeBook = false;
	
	public function __construct( PHPEcommerceFrameworkRegistry $registry, $bookPath )
	{
		$this->registry = $registry;
		if( $bookPath != '' )
		{
			$bookPath = $this->registry->getObject('db')->sanitizeData( $bookPath );
			$bookQuery = "SELECT v.name as product_name, c.ID as product_id, p.allow_upload as allow_upload, p.custom_text_inputs as custom_text_inputs, ( SELECT sum(rating)/count(*) FROM content_ratings WHERE contentID=c.ID ) as rating, (SELECT GROUP_CONCAT( a.name,'--AV--', av.ID, '--AV--', av.name SEPARATOR '---ATTR---' ) FROM product_attribute_values av, product_attribute_value_association ava, product_attributes a WHERE a.ID = av.attribute_id AND av.ID=ava.attribute_id AND ava.product_id=c.ID ORDER BY ava.order ) AS attributes, p.image as product_image, p.stock as product_stock, p.weight as product_weight, p.price as product_price, p.SKU as product_sku, p.featured as product_featured, v.heading as product_heading, v.content as product_description, v.metakeywords as metakeywords, v.metarobots as metarobots, v.metadescription as metadescription FROM content_versions v, content c, content_types t, content_types_products p WHERE c.active=1 AND c.secure=0 AND c.type=t.ID AND t.reference='product' AND p.content_version=v.ID AND v.ID=c.current_revision AND c.path='{$bookPath}'";
			$this->registry->getObject('db')->executeQuery( $bookQuery );
			if( $this->registry->getObject('db')->numRows() == 1 )
			{
				
				// tells the controller we have a product!
				$this->activeProduct = true;
				// grab the product data, and associate it with the relevant fields for this object
				$data = $this->registry->getObject('db')->getRows();
				//if( $data['attributes'] != '' )
				//{
				//	$this->hasAttributes = true;
				//	$attrs = explode('---ATTR---', $data['attributes'] );
				//	foreach( $attrs as $atr )
				//	{
				//		$value = explode( '--AV--', $atr );
				//		$this->attributes[ $value[0] ][] = array( 'attrid' => $value[1], 'attrvalue' => $value[2] );
				//		
				//	}
					//echo '<pre>' . print_r( $this->attributes, true ) . '</pre>';
					
				//}
				
				//if( $data['allow_upload'] == 1)
				//{
				//	$this->allowUpload = true;
				//}

                                                                                                $this->bcid = $data['bcid'];
                                                                                                $this->isbn = $data['isbn'];
                                                                                                $this->title = $data['title'];
                                                                                                $this->author1 = $data['author1'];
                                                                                                $this->author2 = $data['author2'];
                                                                                               $this->author3 = $data['author3'];
                                                                                                $this->author4 = $data['author4'];
                                                                                                $this->author5 = $data['author5'];
                                                                                                $this->cover = $data['cover'];
                                                                                                $this->category1 = $data['category1'];
                                                                                                $this->category2 = $data['category2'];
                                                                                                $this->category3 = $data['category3'];
                                                                                                $this->language = $data['language'];
                                                                                                $this->pages = $data['pages'];
                                                                                                $this->hardcover_flag = $data['hardcover_flag'];
                                                                                                $this->description = $data['description'];
                                                                                                $this->edition = $data['edition'];
                                                                                                $this->publisher = $data['publisher'];
                                                                                                $this->year = $data['year'];                                
                               
                                                                                               // if( $data['custom_text_inputs'] != '' )
				//{
				//	$this->customTextInputs = unserialize( $data['custom_text_inputs'] );
				//}
				
			}
		}
		else
		{
			// here we may want to do something else...
		}
		
	}
	
	public function getData()
	{
		$data = array();
		foreach( $this as $field => $fdata )
		{
			if( ! is_object( $fdata ) )
			{
				$data[ $field ] = $fdata;
			}
			
		}
		return $data;
	}
	
        	public function isValid()
	{
		return $this->activeBook;
	}
	
	/*
		Also useful: getters and setters for various fields, as well as a save method, to update a database entry
	*/
		
}

?>