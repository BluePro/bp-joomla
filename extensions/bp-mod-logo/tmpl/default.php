<?php
defined('_JEXEC') or die('Restricted access');

$template = '';

foreach ($image->uri as $index => $url) {
	$template .= sprintf('<img src="%s" width="%d" height="%d" alt="%s"%s style="position: absolute; z-index: %d;" id="mod_bplogo_%d"/>',
		$url, $image->width, $image->height, $image->name, $image_style, $index == 0 ? 10 : 1, $index);
}
if ($link) {
	$template = sprintf('<a href="%s" style="display: block; width: 100%; height: 100%;">%s</a>', $link, $template);
}
$template = sprintf('<div class="mod_bplogo%s" id="mod_bplogo" style="width: %dpx; height: %dpx; overflow: hidden;">%s</div>',
	$params->get('moduleclass_sfx'), $image->width, $image->height, $template);

if (count($image->uri) > 1) {
	$template .= sprintf("
<script>
	$(document).addEvent('domready', function() {
			var banners = $$('#mod_bplogo img');
			var index = 0;
			
			var switchLogo = function() {
				var opacity = 1;
				var newIndex = (index + 1 < banners.length) ? index + 1 : 0;
				
				banners[newIndex].setStyle('z-index', 9);
				
				var interval = setInterval(function() {
					opacity -= 0.1;
					banners[index].setStyle('opacity', opacity);
					if (opacity <= 0) {
						clearInterval(interval);
						banners[index].setStyle('z-index', 1);
						banners[newIndex].setStyle('z-index', 10);
						banners[index].setStyle('opacity', 1);
						index = newIndex;
					}
				}, 50);
			}
			
			setInterval(switchLogo, %d);
	});
</script>", $timeout * 1000);
	
}

echo $template;