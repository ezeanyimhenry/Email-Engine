<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('templates')->insert([
      'name' => 'Sample Email Template',
      'content' => '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Sample Email Template</title>
                  <style>
                    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
                    .container { width: 100%; max-width: 600px; margin: auto; padding: 20px; background-color: #f4f4f4; }
                    .header { background-color: #333; color: #fff; padding: 10px; text-align: center; }
                    .content { padding: 20px; background-color: #fff; }
                    .footer { background-color: #333; color: #fff; padding: 10px; text-align: center; }
                    h1 { font-size: 24px; }
                    p { font-size: 16px; }
                  </style>
                </head>
                <body>
                  <div class="container">
                    <div class="header">
                      <h1>Welcome to Our Newsletter!</h1>
                    </div>
                    <div class="content">
                      <p>Hello [Name],</p>
                      <p>Thank you for subscribing to our newsletter. We\'re excited to have you on board!</p>
                      <p>Best Regards,</p>
                      <p>The Team</p>
                    </div>
                    <div class="footer">
                      <p>&copy; 2024 Company Name. All rights reserved.</p>
                    </div>
                  </div>
                </body>
                </html>
            ',
            'thumbnail' => 'https://via.placeholder.com/150',
    ]);


    DB::table('templates')->insert([
      'name' => 'MRE Email Template',
      'content' => '
              <style type="text/css">
  @media only screen and (max-width: 480px) {
    table {
      display: block !important;
      width: 100% !important;
    }

    td {
      width: 480px !important;
    }
    .background-style {
      {
            position: relative;
            background-image: url("https://munarealestate.ng/wp-content/uploads/2024/04/pexels-jdgromov-4471207-scaled.jpg");
            background-position: center center;
            background-size: cover;
        }
    }
    .background-style::before {
      content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
            z-index: 1;
    }
  }
  </style>
  <body style="font-family: \'Malgun Gothic\', Arial, sans-serif; margin: 0; padding: 0; width: 100%; -webkit-text-size-adjust: none; -webkit-font-smoothing: antialiased;">
    <table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" id="background" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;">
      <tr>
        <td align="center" valign="top">
          <table width="600" border="0" bgcolor="#F6F6F6" cellspacing="0" cellpadding="20" id="preheader">
            <tr>
              <td valign="top" style="background-color:black;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td valign="top" width="600" >
                      <div class="preheader_links">
                        <p style="color: #666666; font-size: 10px; line-height: 22px; text-align: right;">Unable to view this message? <a href="javascript:void(0)" :hover="text-decoration: underline;" onclick="myEvent();" onmouseover="this.style.textDecoration=\'underline\'" onmouseout="this.style.textDecoration=\'none\'" style="color: #666666; font-weight: bold; text-decoration: none;">Click here</a></p>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" width="600">
                      <div class="logo">
                        <a href="javascript:void(0)" onclick="myEvent();" onmouseover="this.style.color=\'#666666\'" onmouseout="this.style.color=\'#514F4E\'" style="color: #514F4E; font-size: 18px; font-weight: bold; text-align: left; text-decoration: none;"><img src="https://munarealestate.ng/wp-content/uploads/2024/03/cropped-Muna-Real-estate-01.png" style="width:100px" /></a>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!-- // END #preheader -->

          <table width="600" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" id="header_container">
            <tr>
              <td align="center" valign="top">
                <table width="100%" border="0" bgcolor="#474544" cellspacing="0" cellpadding="0" id="header">

                </table>
                <!-- // END #header -->
              </td>
            </tr>
          </table>
          <!-- // END #header_container -->

          <table width="600" border="0" bgcolor="#C7B39A" cellspacing="0" cellpadding="20" id="body_container" class="background-style" style="position:relative; background-image: url(\'https://munarealestate.ng/wp-content/uploads/2024/04/pexels-jdgromov-4471207-scaled.jpg\'); background-position: center center; background-size: cover;">
            <tr>
              <td align="center" valign="top" class="body_content">
                <table width="100%" border="0" cellspacing="0" cellpadding="20">
                  <tr>
                    <td valign="top">
                      <h2 style="color: #FFFFFF; font-size: 22px; text-align: center;">Webinar Malfunction and Replay Information</h2>
<!--                       <p style="color: #FFFFFF; font-size: 14px; line-height: 22px; text-align: center;">Maximizing profits through strategic Property Investments. With expert market insights and a proven track record, we deliver lucrative returns for our investors.</p> -->
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                      <div>
                      <!--[if mso]>
                      <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:45px; v-text-anchor:middle; width:150px; "arcsize="7%" stroke="f" fill="t">
                      <v:fill color="#474544"/>
                      <w:anchorlock/>
                      <center style="color:#FFFFFF;font-family:\'Helvetica\',Arial,sans-serif; font-size:14px; text-transform:uppercase;">Find Out More</center></v:roundrect>
                      <![endif]--><a href="https://munarealestate.ng" onclick="myEvent();" style="background-color:#474544;border-radius:3px;color:#FFFFFF;display:inline-block;font-family:\'Helvetica\',Arial,sans-serif;font-size:13px;height:45px;line-height:45px;text-align:center;text-decoration:none;text-transform:uppercase;width:150px;-webkit-text-size-adjust:none;mso-hide:all;" onmouseover="this.style.backgroundColor=\'#514F4E\'" onmouseout="this.style.backgroundColor=\'#474544\'">VISIT WEBSITE</a>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!-- // END #body_container -->

        <table width="600" border="0" cellspacing="0" cellpadding="20" id="body_info_container">
          <tr>
            <td align="center" valign="top" class="body_info_content">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td valign="top">
                    <h2 style="color: #474544; font-size: 20px; text-align: left;">Dear {{ name }},
  </h2>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We are writing to sincerely apologize for the malfunction that occurred during the webinar. We understand that you were unable to receive the presentation as planned, and we deeply regret any inconveniences this may have caused.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">Unfortunately the Webinar hosting provider’s data center in the UK had to go through an unexpected emergency maintenance procedure yesterday due to some circumstances beyond their control which resulted to the downtime of the webinar’s link.
  </p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">Our team is currently analyzing the issue to ensure it doesn\'t happen again in future webinars. We are committed to resolving this problem as quickly as possible and getting the valuable information you signed up for into your hands.</p>

  <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">Here\'s what to expect; We will be sending a replay link to all registered attendees as soon as possible. This will allow you to watch the entire webinar at your convenience.</p>

  <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We will also be providing access to any additional materials that were supposed to be covered in the webinar, such as presentations, handouts, or Q&A summaries.</p>

  <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">In the meantime, if you have any questions or require further information, please do not hesitate to contact us at [+234 903 499 2966].</p>

  <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We appreciate your patience and understanding.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We look forward to sharing Dr. Muna\'s valuable insights with you soon!
  </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="600" border="0" bgcolor="#F2F2F2" cellspacing="0" cellpadding="20" id="body_item_container">
          <tr>
            <td align="center" valign="top" class="body_item_content">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td align="center" valign="top">
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: center;">Sincerely,
  </p><p style="color: #666666; font-size: 14px; line-height: 22px; text-align: center;">
  The Muna Real Estate Webinar Team.
  </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="600" border="0" bgcolor="#CA9731" cellspacing="0" cellpadding="20" id="contact_container">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20" id="contact">
                <tr>
                  <td>
                    <h2 style="color: #F4F4F4; font-size: 20px; text-align: center;">Address</h2>
                    <p style="color: #F4F4F4; font-size: 14px; line-height: 22px; text-align: center;">Plot 69 Coal City Garden Estate, GRA
                      400283 Enugu, Nigeria.</p>
                  </td>
                  <td>
                    <h2 style="color: #F4F4F4; font-size: 20px; text-align: center;">Contact</h2>
                    <p style="color: #F4F4F4; font-size: 14px; line-height: 22px; text-align: center;"><strong>Tel:</strong> 0810 006 0265</p>
                    <p style="color: #F4F4F4; font-size: 14px; line-height: 22px; text-align: center;"><strong>Email:</strong> info@munarealestate.ng</p>
                  </td>
                </tr>
              </table>
              <!-- // END #contact -->
            </td>
          </tr>
        </table>
        <!-- // END #contact_container -->

        <table width="600" border="0" cellspacing="0" cellpadding="20" id="footer_container">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20" id="footer">
                <tr>
                  <td align="center" valign="top" class="social_container">
                    <div class="social">
                      <a style="background-color:#C7B39A; -webkit-border-radius:50%; border-radius:50%; display:inline-block; height:35px; margin:0 0.215em; width:35px;" onmouseover="this.style.backgroundColor=\'#CEBCA7\'" onmouseout="this.style.backgroundColor=\'#C7B39A\'" href="https://web.facebook.com/munarealestatelimited"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#FFFFFF" style="border: 0; display: block; margin: 8px auto; vertical-align: middle;"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z"/></svg></a>
                      <a style="background-color:#C7B39A; -webkit-border-radius:50%; border-radius:50%; display:inline-block; height:35px; margin:0 0.215em; width:35px;" onmouseover="this.style.backgroundColor=\'#CEBCA7\'" onmouseout="this.style.backgroundColor=\'#C7B39A\'" href="https://twitter.com/munarealestate1"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512" style="border: 0; display: block; margin: 8px auto; vertical-align: middle;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
                      <a style="background-color:#C7B39A; -webkit-border-radius:50%; border-radius:50%; display:inline-block; height:35px; margin:0 0.215em; width:35px;" onmouseover="this.style.backgroundColor=\'#CEBCA7\'" onmouseout="this.style.backgroundColor=\'#C7B39A\'" href="https://linkedin.com/company/bestcomfortproperties"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 448 512" style="border: 0; display: block; margin: 8px auto; vertical-align: middle;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a>
                      <a style="background-color:#C7B39A; -webkit-border-radius:50%; border-radius:50%; display:inline-block; height:35px; margin:0 0.215em; width:35px;" onmouseover="this.style.backgroundColor=\'#CEBCA7\'" onmouseout="this.style.backgroundColor=\'#C7B39A\'" href="https://instagram.com/munarealestate"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 448 512" style="border: 0; display: block; margin: 8px auto; vertical-align: middle;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                    </div>
                  </td>
                </tr>
              </table>
              <!-- // END #footer -->
            </td>
          </tr>
        </table>
        <!-- // END #footer_container -->
      </td>
    </tr>
  </table>
  <!-- // END #background -->
  </body>
          ',
          'thumbnail' => 'https://via.placeholder.com/150',
    ]);

  }
}
