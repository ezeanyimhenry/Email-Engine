<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uploadLogo'])) {
    $server_id = $_POST['smtp_server'];
    $upload_dir = 'uploads/';

    // Ensure the upload directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle the file upload
    $logo = $_FILES['logo'];
    $logo_name = basename($logo['name']);
    $target_file = $upload_dir . $logo_name;

    if (move_uploaded_file($logo['tmp_name'], $target_file)) {
        $logo_url = $target_file;

        // Load the config file
        include 'config.php';

        // Update the corresponding server configuration with the logo URL
        if (isset($server[$server_id])) {
            $server[$server_id]['logo_url'] = $logo_url;

            // Save the updated configuration back to the config file
            file_put_contents('config.php', "<?php\n\n\$server = " . var_export($server, true) . ";\n");
            $_SESSION['successMessage'] = "Logo uploaded and configuration updated successfully.";
            header('Location: sendmail.php');
            exit();
        } else {
            $_SESSION['errorMessage'] = "Invalid server ID.";
            header('Location: sendmail.php');
            exit();
        }
    } else {
        $_SESSION['errorMessage'] = "Failed to upload logo.";
        header('Location: sendmail.php');
        exit();
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
    header('Location: sendmail.php');
    exit();
}
