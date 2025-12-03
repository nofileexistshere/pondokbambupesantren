<?php
/**
 * Manual Storage Link Creator for InfinityFree Hosting
 * 
 * This script creates a storage symlink when php artisan storage:link doesn't work.
 * Upload this file to your public folder and access it via browser once.
 * Delete this file after use for security.
 */

// Enable error display for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Storage Link Setup</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 800px; margin: 0 auto; }
        .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .error { color: #721c24; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .warning { color: #856404; background: #fff3cd; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .info { color: #004085; background: #cce5ff; padding: 10px; border-radius: 4px; margin: 10px 0; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto; }
        code { background: #e9ecef; padding: 2px 6px; border-radius: 3px; }
        hr { border: none; border-top: 1px solid #ddd; margin: 20px 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Storage Link Setup for InfinityFree</h1>
    
    <div class="info">
        <strong>Target Folder:</strong> <?php echo htmlspecialchars($targetFolder); ?><br>
        <strong>Link Folder:</strong> <?php echo htmlspecialchars($linkFolder); ?>
    </div>

    <?php
    
    // Check if target folder exists
    if (!file_exists($targetFolder)) {
        echo '<div class="error">❌ Target storage folder does not exist!<br>';
        echo 'Expected location: ' . htmlspecialchars($targetFolder) . '<br>';
        echo 'You may need to create it manually via FTP.</div>';
        
        // Try to create it
        if (@mkdir($targetFolder, 0755, true)) {
            echo '<div class="success">✅ Created target folder successfully!</div>';
        } else {
            echo '<div class="error">Failed to create target folder. Please create it manually via FTP.</div>';
            echo '</div></body></html>';
            exit;
        }
    } else {
        echo '<div class="success">✅ Target storage folder exists</div>';
    }

    // Check if link already exists
    if (file_exists($linkFolder)) {
        if (is_link($linkFolder)) {
            echo '<div class="warning">⚠️ Symbolic link already exists!<br>';
            echo 'Link points to: ' . readlink($linkFolder) . '</div>';
            $linkExists = true;
        } else {
            echo '<div class="error">❌ A folder/file named "storage" exists but is NOT a symbolic link.<br>';
            echo 'You need to delete/rename it first, then run this script again.</div>';
            
            // Show contents
            echo '<div class="info"><strong>Current "storage" folder contents:</strong><pre>';
            try {
                $items = @scandir($linkFolder);
                if ($items) {
                    foreach ($items as $item) {
                        if ($item != '.' && $item != '..') {
                            echo htmlspecialchars($item) . "\n";
                        }
                    }
                } else {
                    echo "Could not read folder contents";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            echo '</pre></div>';
            $linkExists = false;
        }
    } else {
        echo '<div class="info">ℹ️ Storage link does not exist yet. Creating...</div>';
        
        // Check if symlink function is available
        if (!function_exists('symlink')) {
            echo '<div class="error">❌ symlink() function is disabled on this server.</div>';
            $symlinkDisabled = true;
        } else {
            // Try to create symbolic link
            $result = @symlink($targetFolder, $linkFolder);
            
            if ($result) {
                echo '<div class="success">✅ Symbolic link created successfully!</div>';
                $linkExists = true;
            } else {
                echo '<div class="warning">⚠️ Symbolic link creation failed (common on InfinityFree)</div>';
                $symlinkDisabled = true;
            }
        }
        
        // If symlink failed, create alternative solution
        if (isset($symlinkDisabled) && $symlinkDisabled) {
            echo '<div class="info">📝 Creating alternative solution (redirect script)...</div>';
            
            try {
                // Create storage directory
                if (!@mkdir($linkFolder, 0755, true)) {
                    throw new Exception("Could not create storage folder");
                }
                
                // Create an index.php that serves files from actual storage
                $redirectScript = '<?php
// Storage file server for InfinityFree (symlink alternative)
$uri = $_SERVER["REQUEST_URI"];
$uri = parse_url($uri, PHP_URL_PATH);
$file = str_replace("/storage/", "", $uri);
$actualPath = __DIR__ . "/../storage/app/public/" . $file;

if (file_exists($actualPath) && is_file($actualPath)) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $actualPath);
    finfo_close($finfo);
    
    header("Content-Type: " . $mimeType);
    header("Cache-Control: public, max-age=31536000");
    readfile($actualPath);
    exit;
} else {
    header("HTTP/1.0 404 Not Found");
    echo "File not found: " . htmlspecialchars($file);
    exit;
}
?>';
                
                if (@file_put_contents($linkFolder . '/index.php', $redirectScript) === false) {
                    throw new Exception("Could not create index.php");
                }
                
                // Create .htaccess for proper routing
                $htaccess = '<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?file=$1 [L,QSA]
</IfModule>';
                
                if (@file_put_contents($linkFolder . '/.htaccess', $htaccess) === false) {
                    throw new Exception("Could not create .htaccess");
                }
                
                echo '<div class="success">✅ Alternative storage access created successfully!<br>';
                echo '• Created: public/storage/index.php<br>';
                echo '• Created: public/storage/.htaccess</div>';
                
                $linkExists = true;
                
            } catch (Exception $e) {
                echo '<div class="error">❌ Error creating alternative: ' . htmlspecialchars($e->getMessage()) . '</div>';
                $linkExists = false;
            }
        }
    }

    ?>

    <hr>
    
    <h3>📋 Next Steps:</h3>
    <ol>
        <li>Update your <code>.env</code> file with correct domain:
            <pre>APP_URL=https://pesantrenpondokbambu.ct.ws</pre>
        </li>
        <li>Clear Laravel cache (via SSH or create a clear-cache.php file):
            <pre>php artisan config:clear
php artisan cache:clear</pre>
        </li>
        <li>Test if images are now visible in your admin panel</li>
        <li><strong style="color: red;">🗑️ DELETE THIS FILE (create-storage-link.php) after use!</strong></li>
    </ol>

    <hr>

    <h3>🔍 Diagnostics:</h3>
    <pre><?php
    echo "PHP Version: " . PHP_VERSION . "\n";
    echo "Server: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
    echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n\n";
    
    echo "Function Availability:\n";
    echo "  symlink(): " . (function_exists('symlink') ? "✅ Available" : "❌ Disabled") . "\n";
    echo "  scandir(): " . (function_exists('scandir') ? "✅ Available" : "❌ Disabled") . "\n";
    echo "  readlink(): " . (function_exists('readlink') ? "✅ Available" : "❌ Disabled") . "\n\n";
    
    echo "Storage Structure:\n";
    if (file_exists($targetFolder)) {
        echo "  ✅ $targetFolder exists\n";
        if (is_writable($targetFolder)) {
            echo "     ✅ Writable\n";
        } else {
            echo "     ❌ Not writable\n";
        }
        
        // Check for registration folders
        $photosDir = $targetFolder . '/registrations/photos';
        $docsDir = $targetFolder . '/registrations/documents';
        
        echo "  Photos directory: " . (file_exists($photosDir) ? "✅ Exists" : "❌ Missing") . "\n";
        echo "  Documents directory: " . (file_exists($docsDir) ? "✅ Exists" : "❌ Missing") . "\n";
    } else {
        echo "  ❌ $targetFolder does not exist\n";
    }
    
    echo "\nPublic Storage:\n";
    if (file_exists($linkFolder)) {
        echo "  ✅ $linkFolder exists\n";
        echo "     Type: " . (is_link($linkFolder) ? "Symbolic Link" : "Directory/File") . "\n";
        if (is_link($linkFolder)) {
            echo "     Points to: " . readlink($linkFolder) . "\n";
        }
    } else {
        echo "  ❌ $linkFolder does not exist\n";
    }
    ?></pre>

    <?php if ($linkExists): ?>
    <div class="success">
        <h3>✅ Setup Complete!</h3>
        <p>Test your images by accessing:<br>
        <code>https://pesantrenpondokbambu.ct.ws/storage/registrations/photos/[filename]</code></p>
    </div>
    <?php else: ?>
    <div class="error">
        <h3>❌ Setup Incomplete</h3>
        <p>Please resolve the errors above and try again, or contact support.</p>
    </div>
    <?php endif; ?>

</div>
</body>
</html>
