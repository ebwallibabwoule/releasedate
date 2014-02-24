<?php
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//  * this file was modified by Ebwallibabwoule                //
//    based on demo.write.php                                  //
/////////////////////////////////////////////////////////////////

$TaggingFormat = 'UTF-8';
require_once('../getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;
$getID3->setOption(array('encoding'=>$TaggingFormat));

getid3_lib::IncludeDependency(GETID3_INCLUDEPATH.'write.php', __FILE__, true);

$Filename = (isset($_REQUEST['Filename']) ? $_REQUEST['Filename'] : '');
$format = (isset($_REQUEST['format']) ? $_REQUEST['format'] : '');

// POST: Write tags
if (isset($_POST['WriteTags'])) {
    header('Content-Type: text/html; charset='.$TaggingFormat);
    
	$TagFormatsToWrite = (isset($_POST['TagFormatsToWrite']) ? $_POST['TagFormatsToWrite'] : array());
	if (!empty($TagFormatsToWrite)) {
		$tagwriter = new getid3_writetags;
		$tagwriter->filename       = $Filename;
		$tagwriter->tagformats     = $TagFormatsToWrite;
		$tagwriter->overwrite_tags = true;
		$tagwriter->tag_encoding   = $TaggingFormat;
		if (!empty($_POST['remove_other_tags'])) {
			$tagwriter->remove_other_tags = true;
		}

		$commonkeysarray = array('Title', 'Album', 'Year', 'Artist', 'Comment');
		foreach ($commonkeysarray as $key) {
			if (!empty($_POST[$key])) {
				$TagData[strtolower($key)][] = $_POST[$key];
			}
		}
		if (!empty($_POST['Genre'])) {
			$TagData['genre'][] = $_POST['Genre'];
		}
		if (!empty($_POST['GenreOther'])) {
			$TagData['genre'][] = $_POST['GenreOther'];
		}
		if (!empty($_POST['Track'])) {
			$TagData['track'][] = $_POST['Track'].(!empty($_POST['TracksTotal']) ? '/'.$_POST['TracksTotal'] : '');
		}

		if (!empty($_FILES['userfile']['tmp_name'])) {
			if (in_array('id3v2.4', $tagwriter->tagformats) || in_array('id3v2.3', $tagwriter->tagformats) || in_array('id3v2.2', $tagwriter->tagformats)) {
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
					ob_start();
					if ($fd = fopen($_FILES['userfile']['tmp_name'], 'rb')) {
						ob_end_clean();
						$APICdata = fread($fd, filesize($_FILES['userfile']['tmp_name']));
						fclose ($fd);

						list($APIC_width, $APIC_height, $APIC_imageTypeID) = GetImageSize($_FILES['userfile']['tmp_name']);
						$imagetypes = array(1=>'gif', 2=>'jpeg', 3=>'png');
						if (isset($imagetypes[$APIC_imageTypeID])) {

							$TagData['attached_picture'][0]['data']          = $APICdata;
							$TagData['attached_picture'][0]['picturetypeid'] = $_POST['APICpictureType'];
							$TagData['attached_picture'][0]['description']   = $_FILES['userfile']['name'];
							$TagData['attached_picture'][0]['mime']          = 'image/'.$imagetypes[$APIC_imageTypeID];

						} else {
							echo '<b>invalid image format (only GIF, JPEG, PNG)</b><br>';
						}
					} else {
						$errormessage = ob_get_contents();
						ob_end_clean();
						echo '<b>cannot open '.$_FILES['userfile']['tmp_name'].'</b><br>';
					}
				} else {
					echo '<b>!is_uploaded_file('.$_FILES['userfile']['tmp_name'].')</b><br>';
				}
			} else {
				echo '<b>WARNING:</b> Can only embed images for ID3v2<br>';
			}
		}

		$tagwriter->tag_data = $TagData;
		if ($tagwriter->WriteTags()) {
			echo 'Successfully wrote tags<BR>';
			if (!empty($tagwriter->warnings)) {
				echo 'There were some warnings:<BLOCKQUOTE STYLE="background-color:#FFCC33; padding: 10px;">'.implode('<br><br>', $tagwriter->warnings).'</BLOCKQUOTE>';
			}
		} else {
			echo 'Failed to write tags!<BLOCKQUOTE STYLE="background-color:#FF9999; padding: 10px;">'.implode('<br><br>', $tagwriter->errors).'</BLOCKQUOTE>';
		}

	} else {

		echo 'WARNING: no tag formats selected for writing - nothing written';

	}
}

// GET request: Return JSON of tags
if (!empty($Filename) && !empty($format)) {
	header('Content-Type: application/json');

	// Initialize getID3 engine
	$getID3 = new getID3;
	$OldThisFileInfo = $getID3->analyze($Filename);
	getid3_lib::CopyTagsToComments($OldThisFileInfo);

	switch ($OldThisFileInfo['fileformat']) {
		case 'mp3':
		case 'mp2':
		case 'mp1':
			$ValidTagTypes = array('id3v1', 'id3v2.3', 'ape');
			break;

		case 'mpc':
			$ValidTagTypes = array('ape');
			break;

		case 'ogg':
			if (!empty($OldThisFileInfo['audio']['dataformat']) && ($OldThisFileInfo['audio']['dataformat'] == 'flac')) {
				//$ValidTagTypes = array('metaflac');
				// metaflac doesn't (yet) work with OggFLAC files
				$ValidTagTypes = array();
			} else {
				$ValidTagTypes = array('vorbiscomment');
			}
			break;

		case 'flac':
			$ValidTagTypes = array('metaflac');
			break;

		case 'real':
			$ValidTagTypes = array('real');
			break;

		default:
			$ValidTagTypes = array();
			break;
	}


	$ArrayOfGenresTemp = getid3_id3v1::ArrayOfGenres();   // get the array of genres
	foreach ($ArrayOfGenresTemp as $key => $value) {      // change keys to match displayed value
		$ArrayOfGenres[$value] = $value;
	}
	unset($ArrayOfGenresTemp);                            // remove temporary array
	unset($ArrayOfGenres['Cover']);                       // take off these special cases
	unset($ArrayOfGenres['Remix']);
	unset($ArrayOfGenres['Unknown']);
	$ArrayOfGenres['']      = '- Unknown -';              // Add special cases back in with renamed key/value
	$ArrayOfGenres['Cover'] = '-Cover-';
	$ArrayOfGenres['Remix'] = '-Remix-';
	asort($ArrayOfGenres);                                // sort into alphabetical order
	$AllGenresArray = (!empty($OldThisFileInfo['comments']['genre']) ? $OldThisFileInfo['comments']['genre'] : array());
	foreach ($ArrayOfGenres as $key => $value) {
		if (in_array($key, $AllGenresArray)) {
			unset($AllGenresArray[array_search($key, $AllGenresArray)]);
			sort($AllGenresArray);
		}
	}

	echo '{"tag": {"artist": "' .
	 	 (!empty($OldThisFileInfo['comments']['artist']) ? implode(', ', $OldThisFileInfo['comments']['artist']) : '')
		 . '", "title": "' .
	     (!empty($OldThisFileInfo['comments']['title'])  ? implode(', ', $OldThisFileInfo['comments']['title'] ) : '')
		 . '", "year": "' .
	     htmlentities((!empty($OldThisFileInfo['comments']['year'])   ? implode(', ', $OldThisFileInfo['comments']['year']  ) : ''), ENT_QUOTES)
		 . '", "genre": "' .
		 htmlentities((!empty($AllGenresArray[0]) ? $AllGenresArray[0] : ''), ENT_QUOTES)
	     . '"}}';
}
