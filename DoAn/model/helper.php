<?php
    class Helper
    {
        public static function get_url($url = '')
        {
            $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
            $app_path = explode('/', $uri);
            return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $app_path[1] . '/' . $url;
        }
    
        public static function redirect($url)
        {
            header("Location:{$url}");
            exit();
        }
    
        public static function input_value($inputname, $filter = FILTER_DEFAULT, $option = FILTER_SANITIZE_STRING)
        {
            $value = filter_input(INPUT_POST, $inputname, $filter, $option);
            if ($value === null) {
                $value = filter_input(INPUT_GET, $inputname, $filter, $option);
            }
            return $value;
        }
    
        public static function is_submit($hidden)
        {
            return (!empty(self::input_value('action')) && self::input_value('action') == $hidden);
        }

        public static function paging($link, $total_records, $current_page, $limit)
        {
            $total_page = ceil($total_records / $limit);
            // Limit current_page in 1 to total_page
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }

            $start = ($current_page - 1) * $limit;

            $html = '<ul class="pagination">';

            if ($current_page > 1 && $total_page > 1) {
                $html .= '<li class="page-item"><a class="page-link" href="' . str_replace('{page}', $current_page - 1, $link) . '">Prev</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    $html .= '<li class="page-link bg-warning">' . $i . '</li>';
                } else {
                    $html .= '<li class="page-item"><a class="page-link" href="' . str_replace('{page}', $i, $link) . '">' . $i . '</a></li>';
                }
            }

            if ($current_page < $total_page && $total_page > 1) {
                $html .= '<li class="page-item"></li><a class="page-link" href="' . str_replace('{page}', $current_page + 1, $link) . '">Next</a></li></ul>';
            }

            return array(
                'start' => $start,
                'limit' => $limit,
                'html' => $html
            );
        }
        public static function redirect_js($url)
        {
            if ($url) {
                echo '<script>window.location.href="' . $url . '"</script>';
            }
        }

        public static function process_image($dir, $filename)
        {
        //     // Set up the variables
             $dir = $dir . DIRECTORY_SEPARATOR;
             $i = strrpos($filename, '.');
            $image_name = substr($filename, 0, $i);
            $ext = substr($filename, $i);

        //     // Set up the read path
          $image_path = $dir . DIRECTORY_SEPARATOR . $filename;

        //     // Set up the write paths
        //     $image_path_400 = $dir . $image_name . '_400' . $ext;
        //     $image_path_100 = $dir . $image_name . '_100' . $ext;
            $image_path_500 = $dir . $image_name . '_500' . $ext;

        //     // Create an image that's a maximum of 400x300 pixels
        //     self::resize_image($image_path, $image_path_400, 400, 300);

        //     // Create a thumbnail image that's a maximum of 100x100 pixels
        //     self::resize_image($image_path, $image_path_100, 100, 100);
             self::resize_image($image_path, $image_path_500, 1000, 1000);
         }

        // /*******************************************
        //  * Resize image to 400x300 max
        //  ********************************************/
        public static function resize_image($old_image_path, $new_image_path,
            $max_width, $max_height) {

        //     // Get image type
             $image_info = getimagesize($old_image_path);
             $image_type = $image_info[2];

        //     // Set up the function names
             switch ($image_type) {
                case IMAGETYPE_JPEG:
                     $image_from_file = 'imagecreatefromjpeg';
                     $image_to_file = 'imagejpeg';
                    break;
                case IMAGETYPE_GIF:
                    $image_from_file = 'imagecreatefromgif';
                    $image_to_file = 'imagegif';
                    break;
                case IMAGETYPE_PNG:
                    $image_from_file = 'imagecreatefrompng';
                    $image_to_file = 'imagepng';
                    break;
                default:
                    echo 'File must be a JPEG, GIF, or PNG image.';
                    exit;
            }

            // Get the old image and its height and width
            $old_image = $image_from_file($old_image_path);
            $old_width = imagesx($old_image);
            $old_height = imagesy($old_image);

            // Calculate height and width ratios
            $width_ratio = $old_width / $max_width;
            $height_ratio = $old_height / $max_height;

            // If image is larger than specified ratio, create the new image
            if ($width_ratio > 1 || $height_ratio > 1) {

                // Calculate height and width for the new image
                $ratio = max($width_ratio, $height_ratio);
                $new_height = round($old_height / $ratio);
                $new_width = round($old_width / $ratio);

                // Create the new image
                $new_image = imagecreatetruecolor($new_width, $new_height);

                // Set transparency according to image type
                if ($image_type == IMAGETYPE_GIF) {
                    $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
                    imagecolortransparent($new_image, $alpha);
                }
                if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
                    imagealphablending($new_image, false);
                    imagesavealpha($new_image, true);
                }

                // Copy old image to new image - this resizes the image
                $new_x = 0;
                $new_y = 0;
                $old_x = 0;
                $old_y = 0;
                imagecopyresampled($new_image, $old_image,
                    $new_x, $new_y, $old_x, $old_y,
                    $new_width, $new_height, $old_width, $old_height);

                // Write the new image to a new file
                $image_to_file($new_image, $new_image_path);

                // Free any memory associated with the new image
                imagedestroy($new_image);
            } else {
                // Write the old image to a new file
                $image_to_file($old_image, $new_image_path);
            }
            // Free any memory associated with the old image
            imagedestroy($old_image);
        }

        public static function upload_file($inputfile, &$imgfile)
        {
            if (!empty($_FILES[$inputfile])) {
                $check = getimagesize($_FILES[$inputfile]['tmp_name']);
                // Check if image file is a actual image or fake image and error upload file
                if (($_FILES[$inputfile]['error'] > 0) && $check === false) {
                    return false;
                } else {
                    $clientpath = $_FILES[$inputfile]['tmp_name'];
                    $imgfile = $_FILES[$inputfile]['name'];
                    $extension = "." . strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
                    $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");
                    $imgnewfile = substr(md5($imgfile),0,6) . $extension;

                    if (in_array($extension, $allowed_extensions)) {
                        move_uploaded_file($clientpath, '../public/img/' . $imgnewfile);
                        //image size
                        // self::process_image('../uploads/', $imgnewfile);
                        $imgfile = $imgnewfile;
                        return true;
                    } else {
                        echo "<script>alert('Phần mở rộng file không hợp lệ. Chỉ phần mở rộng jpg /jpeg/png/gif cho phép upload file !');</script>";
                        return false;
                    }
                }
            } else {
                return false;
            }
        }
    }
    

  
   
?>