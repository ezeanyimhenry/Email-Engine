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
        ]);

    }
}
