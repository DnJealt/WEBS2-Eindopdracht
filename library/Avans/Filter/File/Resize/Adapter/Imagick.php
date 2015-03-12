<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Filter_File_Resize_Adapter_Imagick extends Avans_Filter_File_Resize_Adapter_Abstract
{
	/**
	 * @see Avans_Filter_File_Resize_Adapter_Abstract
	 * @param array $options
	 * @return string
	 */
	public function resize(array $options)
	{
		if(extension_loaded('imagick'))
		{
			$imagick = new Imagick($options['file']);
			
			if(isset($options['width'], $options['height']))
			{
				if($imagick->getImageHeight() <= $imagick->getImageWidth())
				{
					$width = $options['width'];
					$height = $options['height'];
				}
				else
				{
					$width = $options['height'];
					$height = $options['width'];
				}
				
				if(isset($options['crop']) && $options['crop'] == true)
				{
					$imagick->cropThumbnailImage($width, $height);	
				}
				else
				{
					$imagick->thumbnailImage($width, $height, 0);
				}
			}
			
			if(isset($options['watermark']['backgroundColor'], $options['watermark']['copyright']))
			{
				$draw = new ImagickDraw();
				$draw->setStrokeColor('black');
				$draw->setStrokeWidth(1);
				$draw->setFillColor($options['watermark']['backgroundColor']);
				$draw->setFillOpacity(0.7);
				$draw->rectangle(0, $imagick->getImageHeight() - 43, $imagick->getImageWidth(), $imagick->getImageHeight() - 22);
							
				$draw->setFont($options['watermark']['copyright']['font']);							
				$draw->setFontSize($options['watermark']['copyright']['fontSize']);
				$draw->setFillColor($options['watermark']['copyright']['fontColor']);
				$draw->setTextAlignment(2);
				
				$copyrightText = (!empty($options['watermark']['copyright']['author'])) ? 
					$options['watermark']['copyright']['author'] . ' ' . $options['watermark']['copyright']['text'] :
					$options['watermark']['copyright']['text'];
				
				$draw->annotation($imagick->getImageWidth() / 2, $imagick->getImageHeight() - 27, $copyrightText);
				
				$imagick->drawImage($draw);
				
				if(file_exists($options['watermark']['copyright']['img']['top']))
				{
					$watermark = new Imagick();
					$watermark->readImage($options['watermark']['copyright']['img']['top']);
					
					$imagick->compositeImage($watermark, IMAGICK::COMPOSITE_OVER, 0, 0);
				}
				
				if(file_exists($options['watermark']['copyright']['img']['center']))
				{
					$watermarkCopyright = new Imagick();
					$watermarkCopyright->readImage($options['watermark']['copyright']['img']['center']);
				
					$imagick->compositeImage($watermarkCopyright, IMAGICK::COMPOSITE_OVER, ($width / 2) - ($watermarkCopyright->getImageWidth() / 2), ($height / 2) - ($watermarkCopyright->getImageHeight() / 2));
				}
			}
			
			$imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
			$imagick->setImageCompressionQuality(95);
			$imagick->writeImage($options['target']);
			$imagick->clear();
			$imagick->destroy();
		}
		
		return $options['target'];
	}
}