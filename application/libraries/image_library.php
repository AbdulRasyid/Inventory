<?php
/**********  IMAGE UPLOADER  ************/

class Image_library
{
	// Public
	public function add_convert_image($source_image_location, $new_image_location, $size_limit = 0, $quality = 75)
	{
		if(!$image_source = $this->create_source_from_img($source_image_location)) return false;
		list($src_width, $src_height) = getimagesize($source_image_location);
		$new_size = $this->size_converter($src_width, $src_height, $size_limit);
		$temp_image = imagecreatetruecolor($new_size['width'], $new_size['height']);
		imagecopyresampled($temp_image, $image_source, 0, 0, 0, 0, $new_size['width'], $new_size['height'], $src_width, $src_height);
		if(!imagejpeg($temp_image, $new_image_location, $quality)) return false;
		return true;
	}
	public function add_crop_image($source_image_location, $new_image_location, $image_height = 80, $image_width = 80, $quality = 75)
	{
		if(!$image_source = $this->create_source_from_img($source_image_location)) return false;
		$image_info = getimagesize($source_image_location);
		if(!$image_width || !$image_height)
		{
			$image_width  = $image_info[0];
			$image_height = $image_info[1];
			$width_new	= $image_info[0];
			$height_new	= $image_info[1];
			$src_x = 0;
			$src_y = 0;
		}
		else list($width_new, $height_new, $src_x, $src_y) = $this->image_size_zoom($image_width, $image_height, $image_info[0], $image_info[1]);
		$image_thumb = imagecreatetruecolor($image_width, $image_height);
		imagecopyresampled($image_thumb, $image_source, 0, 0, $src_x, $src_y, $image_width, $image_height, $width_new, $height_new);
		if(!imagejpeg($image_thumb, $new_image_location)) return false;
		return true;
	}
	public function add_thumb_image($source_image_location, $new_image_location, $image_height = 150, $image_width = 150, $quality = 75)
	{
		if(!$image_source = $this->create_source_from_img($source_image_location)) return false;
		$image_info = getimagesize($source_image_location);
		if(!$image_width || !$image_height)
		{
			$image_width  = $image_info[0];
			$image_height = $image_info[1];
			$width_new	= $image_info[0];
			$height_new	= $image_info[1];
			$src_x = 0;
			$src_y = 0;
		}
		else list($width_new, $height_new, $src_x, $src_y) = $this->image_size_zoom($image_width, $image_height, $image_info[0], $image_info[1]);
		$image_thumb = imagecreatetruecolor($image_width, $image_height);
		imagecopyresampled($image_thumb, $image_source, 0, 0, $src_x, $src_y, $image_width, $image_height, $width_new, $height_new);
		if(!imagejpeg($image_thumb, $new_image_location)) return false;
		return true;
	}
	
	// Private
	private function create_source_from_img($image_file)
	{
		$scr_image = false;
		$image_info = getimagesize($image_file);
		switch($image_info[2])
		{
			case IMAGETYPE_GIF:
			$scr_image = imagecreatefromgif($image_file);
			break;
			case IMAGETYPE_JPEG:
			$scr_image = imagecreatefromjpeg($image_file);
			break;
			case IMAGETYPE_PNG:
			$scr_image = imagecreatefrompng($image_file);
			break;
			case IMAGETYPE_BMP:
			$scr_image = imagecreatefromwbmp($image_file);
			break;
		}
		return $scr_image;
	}
	private function size_converter($src_width, $src_height, $size_limit = 0)
	{
		$new_size = array('width' => $src_width, 'height' => $src_height);
		if(!$size_limit) return $new_size;
		if($src_width > $src_height)
		{
			if($src_width < $size_limit) $new_width = $src_width;
			else $new_width = $size_limit;
			$new_height=($src_height/$src_width)*$new_width;
		}
		else 
		{
			if($src_height < $size_limit) $new_height = $src_height;
			else $new_height = $size_limit;
			$new_width = ($src_width/$src_height)*$new_height;
		}
		$new_size = array('width' => $new_width, 'height' => $new_height);
		return $new_size;
	}
	private function add_convert_image2($source_image_location, $new_image_location, $size_limit = 0, $quality = 75)
	{
		if(!$image_source = $this->create_source_from_img($source_image_location)) return false;
		list($src_width, $src_height) = getimagesize($source_image_location);
		$new_size = $this->size_converter($src_width, $src_height, $size_limit);
		$temp_image = imagecreatetruecolor($new_size['width'], $new_size['height']);
		imagecopyresampled($temp_image, $image_source, 0, 0, 0, 0, $new_size['width'], $new_size['height'], $src_width, $src_height);
		if(!imagejpeg($temp_image, $new_image_location, $quality)) return false;
		return true;
	}
	private function image_size_zoom($zoom_width, $zoom_height, $image_width, $image_height)
	{
		$zoom_width_ratio = $zoom_width/$zoom_height;
		$zoom_height_ratio = $zoom_height/$zoom_width;
		$image_width_ratio = $image_width/$image_height;
		$image_height_ratio = $image_height/$image_width;
		
		if($zoom_width_ratio > $zoom_height_ratio)
		{
			if($zoom_width_ratio > $image_width_ratio)
			{
				$new_width = $image_width;
				$new_height = $zoom_height_ratio*$image_width;
				$new_x = 0;
				$new_y = ($image_height-$new_height)/(2);
			}
			else
			{
				$new_width = $zoom_width_ratio*$image_height;
				$new_height = $image_height;
				$new_x = ($image_width-$new_width)/(2);
				$new_y = 0;
			}
		}
		else
		{
			if($zoom_height_ratio > $image_height_ratio)
			{
				$new_width = $zoom_width_ratio*$image_height;
				$new_height = $image_height;
				$new_x = ($image_width-$new_width)/(2);
				$new_y = 0;
			}
			else
			{
				$new_width = $image_width;
				$new_height = $zoom_height_ratio*$image_width;
				$new_x = 0;
				$new_y = ($image_height-$new_height)/(2);
			}
		}
		$new_size = array($new_width, $new_height, $new_x, $new_y);
		return $new_size;
	}
	private function add_crop_image2($source_image_location, $new_image_location, $image_height = 0, $image_width = 0, $quality = 75)
	{
		if(!$image_source = $this->create_source_from_img($source_image_location)) return false;
		$image_info = getimagesize($source_image_location);
		if(!$image_width || !$image_height)
		{
			$image_width  = $image_info[0];
			$image_height = $image_info[1];
			$width_new	= $image_info[0];
			$height_new	= $image_info[1];
			$src_x = 0;
			$src_y = 0;
		}
		else list($width_new, $height_new, $src_x, $src_y) = $this->image_size_zoom($image_width, $image_height, $image_info[0], $image_info[1]);
		$image_thumb = imagecreatetruecolor($image_width, $image_height);
		imagecopyresampled($image_thumb, $image_source, 0, 0, $src_x, $src_y, $image_width, $image_height, $width_new, $height_new);
		if(!imagejpeg($image_thumb, $new_image_location)) return false;
		return true;
	}
}
?>