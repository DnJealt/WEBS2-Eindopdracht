<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_View_Helper_HtmlPurifier_YoutubeIframe extends HTMLPurifier_Filter
{
    public $name = 'YouTubeIframe';

    public function preFilter($html, $config, $context)
	{
        if (strstr($html, '<iframe')) {
            $html = str_ireplace("</iframe>", "", $html);
            if (preg_match_all("/<iframe(.*?)>/si", $html, $result)) {
                foreach ($result[1] as $key => $item) {
                    preg_match('/width="([0-9]+)"/', $item, $width);
                    $width = $width[1];
                    preg_match('/height="([0-9]+)"/', $item, $height);
                    $height = $height[1];
                    preg_match('/https?:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_]+)/', $item, $id);
                    $id = $id[1];
                    $html = str_replace($result[0][$key], '<img class="YouTubeIframe" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/' . $id . '">', $html);
                }
            }
        }
        return $html;
    }

    public function postFilter($html, $config, $context)
	{
       $post_regex = '#<img class="YouTubeIframe" ([^>]+)>#';
       $html = preg_replace_callback($post_regex, array($this, 'postFilterCallback'), $html);
       return $html;
    }

    protected function postFilterCallback($matches)
	{
        return '<iframe frameborder="0" allowfullscreen '.$matches[1].'></iframe>';
    }
}