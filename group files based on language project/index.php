<?php

// Function to create sub-folders and move files to them
function divide_files_based_on_language($folder_path) {
    $files = scandir($folder_path);

    foreach ($files as $file) {
    //function is used to retrieve information about a file path
        if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
        
        //useful when you have an array and want to assign its elements to individual variables without having to access each element separately
        // function is used to split a string into an array based on a specified delimiter
            list($language) = explode('-', $file);
            
            //represents the directory separator like /
            $language_folder = $folder_path . DIRECTORY_SEPARATOR . $language;

            // Create the sub-folder if it doesn't exist
            //check whether a given path is a directory or not
            if (!is_dir($language_folder)) {
            
            //used to create a new directory
                mkdir($language_folder);
            }

            // Move the file to the corresponding sub-folder
            $file_Path = $folder_path . DIRECTORY_SEPARATOR . $file;
            $destination_path = $language_folder . DIRECTORY_SEPARATOR . $file;
            
            //used to rename or move a file or directory
            rename($file_Path, $destination_path);
        }
    }
}

// folder path containes all files you want to devide based on languge to sub-folders 
$folder_path = '/home/rawabi/Desktop/group files based on language project/files';
divide_files_based_on_language($folder_path);
