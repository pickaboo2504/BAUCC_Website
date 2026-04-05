<?php
// compress-images.php - Windows compatible image compressor

// Function to compress JPEG
function compressJPEG($source, $destination, $quality = 80) {
    $img = imagecreatefromjpeg($source);
    imagejpeg($img, $destination, $quality);
    imagedestroy($img);
    return true;
}

// Function to compress PNG (preserves transparency)
function compressPNG($source, $destination, $compression = 9) {
    $img = imagecreatefrompng($source);
    // Preserve transparency
    imagepalettetotruecolor($img);
    imagealphablending($img, true);
    imagesavealpha($img, true);
    imagepng($img, $destination, $compression);
    imagedestroy($img);
    return true;
}

// Function to create thumbnail
function createThumbnail($source, $destination, $width = 400, $height = 400) {
    $info = getimagesize($source);
    
    if ($info['mime'] == 'image/jpeg') {
        $img = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/png') {
        $img = imagecreatefrompng($source);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
    } else {
        return false;
    }
    
    $origWidth = imagesx($img);
    $origHeight = imagesy($img);
    
    // Calculate new dimensions (maintain aspect ratio)
    if ($origWidth > $origHeight) {
        $newWidth = $width;
        $newHeight = ($origHeight / $origWidth) * $width;
    } else {
        $newHeight = $height;
        $newWidth = ($origWidth / $origHeight) * $height;
    }
    
    $thumb = imagecreatetruecolor($newWidth, $newHeight);
    
    // Preserve transparency for PNG
    if ($info['mime'] == 'image/png') {
        imagealphablending($thumb, false);
        imagesavealpha($thumb, true);
        $transparent = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
        imagefilledrectangle($thumb, 0, 0, $newWidth, $newHeight, $transparent);
    }
    
    imagecopyresampled($thumb, $img, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
    
    // Save thumbnail
    if ($info['mime'] == 'image/jpeg') {
        imagejpeg($thumb, $destination, 75);
    } elseif ($info['mime'] == 'image/png') {
        imagepng($thumb, $destination, 9);
    }
    
    imagedestroy($img);
    imagedestroy($thumb);
    return true;
}

// Create folders
$folders = [
    'img/ncc/original',
    'img/ncc/gallery',
    'img/ncc/thumbnails'
];

foreach ($folders as $folder) {
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        echo "Created folder: $folder<br>";
    }
}

// Get all images from original folder
$originalFolder = 'img/ex2023/original/';
$galleryFolder = 'img/ex2023/gallery/';
$thumbnailFolder = 'img/ex2023/thumbnails/';

$allowedExtensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
$images = [];

foreach ($allowedExtensions as $ext) {
    $files = glob($originalFolder . "*." . $ext);
    $images = array_merge($images, $files);
}

if (empty($images)) {
    echo "<h3>No images found!</h3>";
    echo "<p>Please place your images in: <strong>$originalFolder</strong></p>";
    echo "<p>Supported formats: JPG, JPEG, PNG</p>";
    exit;
}

echo "<h2>Processing " . count($images) . " images...</h2>";
echo "<div style='font-family: monospace;'>";

foreach ($images as $image) {
    $filename = basename($image);
    $name = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    $galleryPath = $galleryFolder . $name . '.' . $extension;
    $thumbnailPath = $thumbnailFolder . $name . '.' . $extension;
    
    echo "<br><strong>📷 $filename</strong><br>";
    
    // Get original file size
    $originalSize = filesize($image) / 1024;
    echo "Original size: " . round($originalSize, 2) . " KB<br>";
    
    // Compress based on type
    if (in_array(strtolower($extension), ['jpg', 'jpeg'])) {
        compressJPEG($image, $galleryPath, 75);
        echo "✓ JPEG compressed<br>";
    } elseif (strtolower($extension) == 'png') {
        compressPNG($image, $galleryPath, 9);
        echo "✓ PNG compressed<br>";
    }
    
    // Create thumbnail
    createThumbnail($galleryPath, $thumbnailPath, 400, 400);
    echo "✓ Thumbnail created<br>";
    
    // New file size
    $newSize = filesize($galleryPath) / 1024;
    $saved = round($originalSize - $newSize, 2);
    $percent = round(($saved / $originalSize) * 100);
    echo "💾 Saved: $saved KB ($percent% smaller)<br>";
}

echo "</div>";
echo "<h3>✅ All done!</h3>";
echo "<p>Compressed images saved to: <strong>$galleryFolder</strong></p>";
echo "<p>Thumbnails saved to: <strong>$thumbnailFolder</strong></p>";
echo "<p><a href='ncc.php' target='_blank'>View your gallery →</a></p>";
?>