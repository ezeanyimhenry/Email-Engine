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
              <body style="font-family: \'Malgun Gothic\', Arial, sans-serif; margin: 0; padding: 0; width: 100%; -webkit-text-size-adjust: none; -webkit-font-smoothing: antialiased;">
  <table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;">
    <tr>
      <td align="center" valign="top">
        <table width="600" border="0" bgcolor="#F6F6F6" cellspacing="0" cellpadding="20" style="background-color: black;">
          <tr>
            <td valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td valign="top" width="600">
                    <div style="text-align: right;">
                      <p style="color: #666666; font-size: 10px; line-height: 22px; text-align: right;">Unable to view this message? <a href="javascript:void(0)" style="color: #666666; font-weight: bold; text-decoration: none; cursor: pointer; text-decoration: underline;">Click here</a></p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td valign="top" width="600">
                    <div style="text-align: left;">
                      <a href="javascript:void(0)" style="color: #514F4E; font-size: 18px; font-weight: bold; text-decoration: none;"><img src="https://munarealestate.ng/wp-content/uploads/2024/03/cropped-Muna-Real-estate-01.png" style="width: 100px;" /></a>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!-- // END #preheader -->

        <table width="600" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" bgcolor="#474544" cellspacing="0" cellpadding="0">
                <!-- // END #header -->
              </table>
            </td>
          </tr>
        </table>
        <!-- // END #header_container -->

        <table width="600" border="0" bgcolor="#C7B39A" cellspacing="0" cellpadding="20" style="position: relative; background-image: url(\'https://munarealestate.ng/wp-content/uploads/2024/04/pexels-jdgromov-4471207-scaled.jpg\'); background-position: center center; background-size: cover;">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td valign="top">
                    <h2 style="color: #FFFFFF; font-size: 22px; text-align: center;">Webinar Malfunction and Replay Information</h2>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <div>
                      <a href="https://munarealestate.ng" style="background-color: #474544; border-radius: 3px; color: #FFFFFF; display: inline-block; font-family: \'Helvetica\', Arial, sans-serif; font-size: 13px; height: 45px; line-height: 45px; text-align: center; text-decoration: none; text-transform: uppercase; width: 150px;">VISIT WEBSITE</a>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!-- // END #body_container -->

        <table width="600" border="0" cellspacing="0" cellpadding="20">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td valign="top">
                    <h2 style="color: #474544; font-size: 20px; text-align: left;">Dear {{ name }},</h2>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We are writing to sincerely apologize for the malfunction that occurred during the webinar. We understand that you were unable to receive the presentation as planned, and we deeply regret any inconveniences this may have caused.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">Unfortunately the Webinar hosting provider’s data center in the UK had to go through an unexpected emergency maintenance procedure yesterday due to some circumstances beyond their control which resulted to the downtime of the webinar’s link.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">Our team is currently analyzing the issue to ensure it doesn’t happen again in future webinars. We are committed to resolving this problem as quickly as possible and getting the valuable information you signed up for into your hands.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">Here’s what to expect; We will be sending a replay link to all registered attendees as soon as possible. This will allow you to watch the entire webinar at your convenience.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We will also be providing access to any additional materials that were supposed to be covered in the webinar, such as presentations, handouts, or Q&A summaries.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">In the meantime, if you have any questions or require further information, please do not hesitate to contact us at [+234 903 499 2966].</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We appreciate your patience and understanding.</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;">We look forward to sharing Dr. Muna’s valuable insights with you soon!</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="600" border="0" bgcolor="#F2F2F2" cellspacing="0" cellpadding="20">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td align="center">
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: center;">Sincerely,</p>
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: center;">The Muna Real Estate Webinar Team.</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="600" border="0" bgcolor="#CA9731" cellspacing="0" cellpadding="20">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td>
                    <h2 style="color: #F4F4F4; font-size: 20px; text-align: center;">Address</h2>
                    <p style="color: #F4F4F4; font-size: 14px; line-height: 22px; text-align: center;">Plot 69 Coal City Garden Estate, GRA 400283 Enugu, Nigeria.</p>
                  </td>
                  <td>
                    <h2 style="color: #F4F4F4; font-size: 20px; text-align: center;">Contact</h2>
                    <p style="color: #F4F4F4; font-size: 14px; line-height: 22px; text-align: center;"><strong>Tel:</strong> 0810 006 0265</p>
                    <p style="color: #F4F4F4; font-size: 14px; line-height: 22px; text-align: center;"><strong>Email:</strong> info@munarealestate.ng</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!-- // END #contact_container -->

        <table width="600" border="0" cellspacing="0" cellpadding="20">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td align="center" valign="top">
                    <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: center;">© 2024 Muna Real Estate. All Rights Reserved.</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!-- // END #footer_container -->
      </td>
    </tr>
  </table>
</body>

          ',
          'thumbnail' => 'https://via.placeholder.com/150',
    ]);

  }
}
