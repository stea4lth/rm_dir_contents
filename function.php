<?php

/**
 * [rm_dir_contents - removes dir contents ]
 * @param  [string] $dir     [dir location]
 * @return [bool]   $result  [return true unless failed to unlink]
 */
function rm_dir_contents($dir) {
	$result = true;
    $files = glob( $dir . '*', GLOB_MARK );
    foreach( $files as $file ){
        if( substr( $file, -1 ) == '/' ){
            rm_dir_contents( $file );
        }
        else{
        	if(!unlink( $file )){
        		$result = false;
        	}
        }
    }
    // don't remove the actual dir - just all of it's contents recursively
    //rmdir( $dir ); // uncomment this to remove $dir too
    return $result;
}

