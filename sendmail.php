<?php
session_start();

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$baseUrl = $scheme . $host . '/';
?>
<!DOCTYPE html>
<html lang="en">
<style>
    #preview {
        border: none;
        width: 100%;
        height: 500px;
    }
</style>
<?php include "layout/head.php"; ?>


<body class="bg-dark nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div id="loading-spinner" class="d-none justify-content-center align-items-center"
        style="position: fixed; width:100%;height:100%;background:rgba(95, 56, 249,0.3);z-index:9999999">
        <div class="spinner-border text-primary" style="width:3rem;height:3rem" role="status">
            <!-- <span class="sr-only">Loading...</span> -->
        </div>
    </div>
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap">
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head">

                                        <?php
                                        if (!empty($_SESSION['successMessage'])) {
                                            $message = $_SESSION['successMessage'];
                                            echo "<div class='alert alert-success' role='alert' id='alert'> $message  </div>";
                                            unset($_SESSION['successMessage']);
                                        } elseif (!empty($_SESSION['errorMessage'])) {
                                            $message = $_SESSION['errorMessage'];
                                            echo "<div class='alert alert-danger' role='alert' id='alert'> $message</div>";
                                            unset($_SESSION['errorMessage']);
                                        }
                                        ?>
                                        <div class="nk-block-head-between flex-wrap gap g-2 align-items-start">
                                            <div class="nk-block-head-content">

                                                <div class="d-flex flex-column flex-md-row align-items-md-center">


                                                    <div class="mt-3 mt-md-0 ms-md-3">
                                                        <h3 class="title mb-1 text-white">Email Engine</h3>

                                                        <ul class="nk-list-option pt-1">
                                                            <li>


                                                                <span class="small text-white">Send Email
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="nk-block">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane show active" id="tab-1" tabindex="0">
                                            <div class="card card-gutter-md">
                                                <div class="card-body">
                                                    <div class="bio-block">
                                                        <h2 class="bio-block-title mb-4">Upload Logo</h2>
                                                        <form action="upload_logo.php" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="row g-3">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <h4 class="bio-block-title mb-4">Select SMTP
                                                                            Server
                                                                        </h4>
                                                                        <select name="smtp_server" id="smtp_server"
                                                                            class="form-control" required>
                                                                            <option value="">Select Server</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div style="display: none;"
                                                                        id="logo-preview-container">
                                                                        <div class="d-flex justify-content-center"
                                                                            style="background-color: #0a1488;">
                                                                            <img src="" alt="logo" id="logo-preview"
                                                                                style="width: 150px;">
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <label for="logo">Upload Logo:</label>
                                                                        <input type="file" name="logo" id="logo"
                                                                            class="form-control">
                                                                        <br>
                                                                        <button type="submit" name="uploadLogo"
                                                                            class="btn btn-primary">Upload</button>

                                                                    </div>
                                                                    </di>
                                                                </div>
                                                        </form>
                                                        <h2 class="bio-block-title mb-4">Send Email</h2>
                                                        <form action="" method="post" id="sendemail">

                                                            <div class="row g-3">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <h4 class="bio-block-title mb-4">Select SMTP
                                                                            Server
                                                                        </h4>
                                                                        <select name="server" id="server"
                                                                            class="form-control" required>
                                                                            <option value="">Select Server</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="base-url" id="base-url"
                                                                    value="<?= $baseUrl ?>">
                                                                <input type="hidden" id="server-logo" value="">
                                                                <input type="hidden" id="server-name" value="">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="subject" class="form-label">Subject
                                                                        </label>

                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                id="subject" placeholder="Subject"
                                                                                name="name" value=""
                                                                                oninput="subjects()" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="email" class="form-label">Email
                                                                            address
                                                                        </label>

                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control"
                                                                                id="email" name="email"
                                                                                placeholder="Email address" value="" />
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="address" class="form-label">Body
                                                                        </label>

                                                                        <div class="form-control-wrap">
                                                                            <div class="mb-1">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-h2">Add Header</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-p">Add Paragraph</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-bold">Add Bold</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-italic">Add Italic</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-link">Add Link</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-button">Add Button</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-image">Add Image</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    id="add-break">Break Line</button>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-6">
                                                                                    <textarea class="form-control"
                                                                                        id="body"
                                                                                        placeholder="Email body"
                                                                                        oninput="updatePreview()"
                                                                                        name="body" rows="10"
                                                                                        required></textarea>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <h2>Preview</h2>
                                                                                    <iframe id="preview">

                                                                                    </iframe>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>




                                                                <div class="col-lg-12">
                                                                    <button class="btn btn-primary" type="submit"
                                                                        name="updateProfile">Send Email
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div id='alertContainer'></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<script>
    document.addEventListener('DOMContentLoaded', async function () {
        const serverSelect = document.getElementById('smtp_server');
        const smtpSelect = document.getElementById('server');
        const baseUrl = document.getElementById('base-url').value;
        const logoImage = document.getElementById('server-logo');
        const logoPreview = document.getElementById('logo-preview');
        const serverName = document.getElementById('server-name');

        try {
            const response = await fetch('get_servers.php');
            const servers = await response.json();
            // console.log(servers);
            Object.keys(servers).forEach(serverId => {
                const option = document.createElement('option');
                option.value = serverId;
                option.textContent = servers[serverId].name;

                // Append option to both select elements
                serverSelect.appendChild(option.cloneNode(true));
                smtpSelect.appendChild(option.cloneNode(true));
            });

            serverSelect.addEventListener('change', function () {
                const selectedServer = this.value;
                const logoUrl = servers[selectedServer]?.logo_url || '';
                const newServerName = servers[selectedServer]?.name || '';

                if (logoUrl && imageExists(logoUrl)) {
                    document.getElementById('logo-preview-container').style.display = 'block';
                } else {
                    document.getElementById('logo-preview-container').style.display = 'none';
                }

                logoPreview.src = baseUrl + logoUrl;
            });

            function imageExists(image_url) {

                var http = new XMLHttpRequest();

                http.open('HEAD', image_url, false);
                http.send();

                return http.status != 404;

            }

            smtpSelect.addEventListener('change', function () {
                const selectedServer = this.value;
                const logoUrl = servers[selectedServer]?.logo_url || '';
                const newServerName = servers[selectedServer]?.name || '';
                logoImage.value = baseUrl + logoUrl;
                serverName.value = newServerName;
            });
        } catch (error) {
            console.error('Error fetching servers:', error);
        }
    });

    //update subject
    let subject = '';
    var sub = document.getElementById('subject');
    function subjects() {
        var logo = document.getElementById('server-logo').value;
        var company = document.getElementById('server-name').value;
        subject = sub.value;
        var preview = document.getElementById('preview');
        preview.srcdoc = `
<html>

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta name='x-apple-disable-message-reformatting'>
<head>
<style type='text/css'>
      @media only screen and (min-width: 620px) {
  .u-row {
    width: 600px !important;
  }
  .u-row .u-col {
    vertical-align: top;
  }

  .u-row .u-col-100 {
    width: 600px !important;
  }

}

@media (max-width: 620px) {
  .u-row-container {
    max-width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
  }
  .u-row .u-col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important;
  }
  .u-row {
    width: 100% !important;
  }
  .u-col {
    width: 100% !important;
  }
  .u-col > div {
    margin: 0 auto;
  }
}
body {
  margin: 0;
  padding: 0;
}

table,
tr,
td {
  vertical-align: top;
  border-collapse: collapse;
}

p {
  margin: 0;
}

.ie-container table,
.mso-container table {
  table-layout: fixed;
}

* {
  line-height: inherit;
}

a[x-apple-data-detectors='true'] {
  color: inherit !important;
  text-decoration: none !important;
}

table, td { color: #000000; } #u_body a { color: #161a39; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: 100% !important; } #u_content_image_1 .v-src-max-width { max-width: 100% !important; } #u_content_image_1 .v-text-align { text-align: center !important; } #u_content_button_1 .v-size-width { width: auto !important; } }
    </style>
  
  

<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap' rel='stylesheet' type='text/css'>

</head>

<body>
<body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000'>
  <!--[if IE]><div class='ie-container'><![endif]-->
  <!--[if mso]><div class='mso-container'><![endif]-->
  <table id='u_body' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%' cellpadding='0' cellspacing='0'>
  <tbody>
  <tr style='vertical-align: top'>
    <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #f9f9f9;'><![endif]-->
    

<div class='u-row-container' style='padding: 0px;background-color: #f9f9f9'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f9f9f9;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: #f9f9f9;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #f9f9f9;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:15px;font-family:Lato,sans-serif;' align='left'>
        
  <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #f9f9f9;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
    <tbody>
      <tr style='vertical-align: top'>
        <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
          <span>&#160;</span>
        </td>
      </tr>
    </tbody>
  </table>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0a1488;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #0a1488;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table id='u_content_image_1' style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:25px 10px;font-family:Lato,sans-serif;' align='left'>
        
<table width='100%' cellpadding='0' cellspacing='0' border='0'>
  <tr>
    <td class='v-text-align' style='padding-right: 0px;padding-left: 0px;' align='center'>
      
      <img align='center' border='0' src='${logo}' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 29%;max-width: 168.2px;' width='168.2' class='v-src-width v-src-max-width'/>
      
    </td>
  </tr>
</table>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #131372;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #131372;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:0px 10px 30px;font-family:Lato,sans-serif;' align='left'>
        
  <div class='v-text-align' style='line-height: 140%; text-align: left; word-wrap: break-word;'>
    <p style='font-size: 14px; line-height: 140%; text-align: center;'> </p>
<p style='font-size: 14px; line-height: 140%; text-align: center;'><span style='font-size: 28px; line-height: 39.2px; color: #ffffff; font-family: Lato, sans-serif;'>${subject}</span></p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #ffffff;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  


<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:5px 40px 33px;font-family:Lato,sans-serif;' align='left'>
        
  <div class='v-text-align' style='font-family: Lato,sans-serif; font-size: 18px; line-height: 140%; text-align: left; word-wrap: break-word;'>
    <p style='line-height: 140%;'>${body}</a></p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0a1488;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #0a1488;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 20px 20px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 20px 20px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:14px;font-family:Lato,sans-serif;' align='left'>
        
  <div class='v-text-align' style='font-family: Lato,sans-serif; color: #fafafa; line-height: 140%; text-align: center; word-wrap: break-word;'>
    <p style='line-height: 140%;'>Copyright ©<?= date('Y') ?> ${company}. All Rights Reserved.</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>


    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    </td>
  </tr>
  </tbody>
  </table>
</body>
</html>
`;

    }
    // Add event listeners for the buttons
    document.getElementById('add-h2').addEventListener('click', function () {
        insertTag('h2');
    });
    document.getElementById('add-p').addEventListener('click', function () {
        insertTag('p');
    });
    document.getElementById('add-bold').addEventListener('click', function () {
        insertTag('b');
    });
    document.getElementById('add-italic').addEventListener('click', function () {
        insertTag('i');
    });
    document.getElementById('add-link').addEventListener('click', function () {
        insertTag('a');
    });
    document.getElementById('add-break').addEventListener('click', function () {
        insertTag('br');
    });
    document.getElementById('add-image').addEventListener('click', function () {
        insertTag('img');
    });
    document.getElementById('add-button').addEventListener('click', function () {
        insertTag('button');
    });

    // Function to insert the specified tag at the current cursor position
    function insertTag(tagName) {
        var textarea = document.getElementById('body');
        var startPos = textarea.selectionStart;
        var endPos = textarea.selectionEnd;
        var selectedText = textarea.value.substring(startPos, endPos) || 'Lorem Ipsum';
        if (tagName == 'a') {
            var replacement = '<' + tagName + ' href="#">' + selectedText + '</' + tagName + '>';
        } else if (tagName == 'br') {
            var replacement = '<br/>';
        } else if (tagName == 'img') {
            var replacement = '<' + tagName + ' src="#" style="width: 100px"></' + tagName + '>';
        } else if (tagName == 'button') {
            var replacement = '<a href="#" ><' + tagName + ' style="background-color:#0a1488; color:white; border-color: transparent; border-radius: 8px; min-width: 100px">' + selectedText + '</' + tagName + '></a>';
        } else {
            var replacement = '<' + tagName + '>' + selectedText + '</' + tagName + '>';
        }
        textarea.value = textarea.value.substring(0, startPos) + replacement + textarea.value.substring(endPos);
    }
    let body = ``;
    function updatePreview() {
        var logo = document.getElementById('server-logo').value;
        var company = document.getElementById('server-name').value;
        var textarea = document.getElementById('body');
        var preview = document.getElementById('preview');
        var content = textarea.value;
        //   preview.innerHTML = ''; // Clear the existing content
        body = content;
        //   preview.srcdoc = content;

        // var preview = document.getElementById('preview');


        preview.srcdoc = `
<html>

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta name='x-apple-disable-message-reformatting'>
<head>
<style type='text/css'>
      @media only screen and (min-width: 620px) {
  .u-row {
    width: 600px !important;
  }
  .u-row .u-col {
    vertical-align: top;
  }

  .u-row .u-col-100 {
    width: 600px !important;
  }

}

@media (max-width: 620px) {
  .u-row-container {
    max-width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
  }
  .u-row .u-col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important;
  }
  .u-row {
    width: 100% !important;
  }
  .u-col {
    width: 100% !important;
  }
  .u-col > div {
    margin: 0 auto;
  }
}
body {
  margin: 0;
  padding: 0;
}

table,
tr,
td {
  vertical-align: top;
  border-collapse: collapse;
}

p {
  margin: 0;
}

.ie-container table,
.mso-container table {
  table-layout: fixed;
}

* {
  line-height: inherit;
}

a[x-apple-data-detectors='true'] {
  color: inherit !important;
  text-decoration: none !important;
}

table, td { color: #000000; } #u_body a { color: #161a39; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: 100% !important; } #u_content_image_1 .v-src-max-width { max-width: 100% !important; } #u_content_image_1 .v-text-align { text-align: center !important; } #u_content_button_1 .v-size-width { width: auto !important; } }
    </style>
  
  

<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap' rel='stylesheet' type='text/css'>

</head>

<body>
<body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000'>
  <!--[if IE]><div class='ie-container'><![endif]-->
  <!--[if mso]><div class='mso-container'><![endif]-->
  <table id='u_body' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%' cellpadding='0' cellspacing='0'>
  <tbody>
  <tr style='vertical-align: top'>
    <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #f9f9f9;'><![endif]-->
    

<div class='u-row-container' style='padding: 0px;background-color: #f9f9f9'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f9f9f9;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: #f9f9f9;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #f9f9f9;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:15px;font-family:Lato,sans-serif;' align='left'>
        
  <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #f9f9f9;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
    <tbody>
      <tr style='vertical-align: top'>
        <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
          <span>&#160;</span>
        </td>
      </tr>
    </tbody>
  </table>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0a1488;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #0a1488;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table id='u_content_image_1' style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:25px 10px;font-family:Lato,sans-serif;' align='left'>
        
<table width='100%' cellpadding='0' cellspacing='0' border='0'>
  <tr>
    <td class='v-text-align' style='padding-right: 0px;padding-left: 0px;' align='center'>
      
      <img align='center' border='0' src='${logo}' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 29%;max-width: 168.2px;' width='168.2' class='v-src-width v-src-max-width'/>
      
    </td>
  </tr>
</table>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #131372;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #131372;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:0px 10px 30px;font-family:Lato,sans-serif;' align='left'>
        
  <div class='v-text-align' style='line-height: 140%; text-align: left; word-wrap: break-word;'>
    <p style='font-size: 14px; line-height: 140%; text-align: center;'> </p>
<p style='font-size: 14px; line-height: 140%; text-align: center;'><span style='font-size: 28px; line-height: 39.2px; color: #ffffff; font-family: Lato, sans-serif;'>${subject}</span></p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #ffffff;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  


<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:5px 40px 33px;font-family:Lato,sans-serif;' align='left'>
        
  <div class='v-text-align' style='font-family: Lato,sans-serif; font-size: 18px; line-height: 140%; text-align: left; word-wrap: break-word;'>
    <p style='line-height: 140%;'>${body}</a></p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>



<div class='u-row-container' style='padding: 0px;background-color: transparent'>
  <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0a1488;'>
    <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
      <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:600px;'><tr style='background-color: #0a1488;'><![endif]-->
      
<!--[if (mso)|(IE)]><td align='center' width='600' style='width: 600px;padding: 20px 20px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
<div class='u-col u-col-100' style='max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;'>
  <div style='height: 100%;width: 100% !important;'>
  <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 20px 20px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
  
<table style='font-family:Lato,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
  <tbody>
    <tr>
      <td style='overflow-wrap:break-word;word-break:break-word;padding:14px;font-family:Lato,sans-serif;' align='left'>
        
  <div class='v-text-align' style='font-family: Lato,sans-serif; color: #fafafa; line-height: 140%; text-align: center; word-wrap: break-word;'>
    <p style='line-height: 140%;'>Copyright ©<?= date('Y') ?> ${company}. All Rights Reserved.</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>


    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    </td>
  </tr>
  </tbody>
  </table>
</body>
</html>
`;
    }


    const form = document.querySelector('#sendemail');

    form.addEventListener('submit', (e) => {
        e.preventDefault()


        async function sendEmail() {
            try {
                // Show the loading spinner
                const loadingSpinner = document.getElementById('loading-spinner');
                loadingSpinner.classList.remove('d-none');
                loadingSpinner.classList.add('d-flex');

                const emailData = {
                    server: document.getElementById('server').value,
                    html: document.getElementById('preview').srcdoc,
                    subject: document.getElementById('subject').value,
                    recipient: document.getElementById('email').value
                };

                const response = await fetch('process_email.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(emailData)
                });

                const result = await response.text();
                // console.log(result);

                // Hide the loading spinner
                loadingSpinner.classList.remove('d-flex');
                loadingSpinner.classList.add('d-none');

                // Check if the email was sent successfully
                if (result === 'success') {
                    // Show the success modal
                    const alertContainer = document.getElementById('alertContainer');
                    alertContainer.innerHTML = `<div class="alert alert-success" role="alert">${data.message}</div>`;
                } else if (result === 'failed') {
                    // Show the success modal
                    const alertContainer = document.getElementById('alertContainer');
                    alertContainer.innerHTML = `<div class="alert alert-danger" role="alert">${data.message}</div>`;
                }
            } catch (error) {
                console.error(error);
            }
        }





        sendEmail()
    })



</script>

</html>