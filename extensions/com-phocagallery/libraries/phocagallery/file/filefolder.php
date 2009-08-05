<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.filesystem.folder' ); 
jimport( 'joomla.filesystem.file' );
phocagalleryimport('phocagallery.image.image');
phocagalleryimport('phocagallery.path.path');

class PhocaGalleryFileFolder
{
	/*
	 * Clear Thumbs folder - if there are files in the thumbs directory but not original files e.g.:
	 * phoca_thumbs_l_some.jpg exists in thumbs directory but some.jpg doesn't exists - delete it
	 */
	function cleanThumbsFolder() {
		//Get folder variables from Helper
		$path = PhocaGalleryPath::getPath();
		
		// Initialize variables
		$pathOrigImg 		= $path->image_abs;
		$pathOrigImgServer 	= str_replace(DS, '/', $path->image_abs);

		// Get the list of files and folders from the given folder
		$fileList 	= JFolder::files($pathOrigImg, '', true, true);
			
		// Iterate over the files if they exist
		if ($fileList !== false) {
			foreach ($fileList as $file) {	
				if (JFile::exists($file) && substr($file, 0, 1) != '.' && strtolower($file) !== 'index.html') {
					
					//Clean absolute path
					$file = str_replace(DS, '/', JPath::clean($file));
					
					$positions = strpos($file, "phoca_thumb_s_");//is there small thumbnail
					$positionm = strpos($file, "phoca_thumb_m_");//is there medium thumbnail
					$positionl = strpos($file, "phoca_thumb_l_");//is there large thumbnail
					
					//Clean small thumbnails if original file doesn't exist
					if ($positions === false) {}
					else {
						$filenameThumbs = $file;//only thumbnails will be listed
						$fileNameOrigs	= str_replace ('thumbs/phoca_thumb_s_', '', $file);//get fictive original files 
						
						//There is Thumbfile but not Originalfile - we delete it
						if (JFile::exists($filenameThumbs) && !JFile::exists($fileNameOrigs)) {
							JFile::delete($filenameThumbs);
						}
					//  Reverse
					//  $filenameThumb = PhocaGalleryHelper::getTitleFromFilenameWithExt($file);
					//	$fileNameOriginal = PhocaGalleryHelper::getTitleFromFilenameWithExt($file);	
					//	$filenameThumb = str_replace ($fileNameOriginal, 'thumbs/phoca_thumb_m_' . $fileNameOriginal, $file); 
					}
					
					//Clean medium thumbnails if original file doesn't exist
					if ($positionm === false) {}
					else {
						$filenameThumbm = $file;//only thumbnails will be listed
						$fileNameOrigm 	= str_replace ('thumbs/phoca_thumb_m_', '', $file);//get fictive original files 
						
						//There is Thumbfile but not Originalfile - we delete it
						if (JFile::exists($filenameThumbm) && !JFile::exists($fileNameOrigm)) {
							JFile::delete($filenameThumbm);
						}
					}
					
					//Clean large thumbnails if original file doesn't exist
					if ($positionl === false) {}
					else {
						$filenameThumbl = $file;//only thumbnails will be listed
						$fileNameOrigl 	= str_replace ('thumbs/phoca_thumb_l_', '', $file);//get fictive original files 
						
						//There is Thumbfile but not Originalfile - we delete it
						if (JFile::exists($filenameThumbl) && !JFile::exists($fileNameOrigl)) {
							JFile::delete($filenameThumbl);
						}
					}
				}
			}
		}
	}
	
	function createFolder($folder, &$errorMsg) {
		$paramsC = JComponentHelper::getParams('com_phocagallery');
		$folder_permissions = $paramsC->get( 'folder_permissions', 0755 );
		$path 	= PhocaGalleryPath::getPath();
		$folder = JPath::clean($path->image_abs . $folder);	
		if (strlen($folder) > 0) {				
			if (!JFolder::exists($folder) && !JFile::exists($folder)) {
				@JFolder::create($folder, $folder_permissions );
				@JFile::write($folder.DS."index.html", "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>");
				// folder was not created
				if (!JFolder::exists($folder)) {
					$errorMsg = "CreatingFolder";
					return false;
				}
			} else {
				$errorMsg = "FolderExists";
				return false;
			}
		} else {
			$errorMsg = "FolderNameEmpty";
			return false;
		}
		return true;
	}
}
?>