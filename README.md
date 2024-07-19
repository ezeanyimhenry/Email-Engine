# Email Engine

Email Engine is a dynamic platform for designing and sending HTML emails from different configured servers. It provides features for selecting SMTP servers, uploading logos for each server, and sending customized HTML emails with a preview feature.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [File Structure](#file-structure)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Dynamic SMTP Server Selection:** Choose from multiple SMTP servers configured in the platform.
- **Logo Upload:** Upload and associate logos with specific SMTP servers.
- **Email Preview:** Preview the HTML email before sending.
- **Error Handling:** Handles errors and displays appropriate messages for successful or failed email sending.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/ezeanyimhenry/email-engine.git
    cd email-engine
    ```

2. Ensure you have PHP and a web server (e.g., Apache, Nginx) installed.

3. Place the project files in the web server's root directory.

4. Start your web server.

## Configuration

1. Copy the `config.example.php` into `config.php` file to configure your SMTP servers.

    ```php
    <?php
    $server = [
        "server_1_id" => [
            "name" => "Server Name",
            "host" => "server host",
            "username" => "server username",
            "password" => "server password",
            "encryption" => "ssl", //replace with actual encryption [ssl,tls,starttls etc]
            "port" => 465, //replace with actual port
            "logo_url" => "path/to/logo1.png"
        ],
        "server_2_id" => [
            "name" => "Server Name",
            "host" => "server host",
            "username" => "server username",
            "password" => "server password",
            "encryption" => "ssl", //replace with actual encryption [ssl,tls,starttls etc]
            "port" => 465, //replace with actual port
            "logo_url" => "path/to/logo2.png"
        ],
        // Add more servers as needed
    ];
    ```

2. Ensure the `logo_url` points to the correct path where the logos are stored.

## Usage

1. **Upload Logo:**

    - Navigate to the logo upload section.
    - Select the server from the dropdown.
    - Upload the desired logo for the selected server.

2. **Send Email:**

    - Select the SMTP server from the dropdown.
    - Fill in the email subject and recipient email address.
    - Design your email body using the provided tools (Add Header, Paragraph, Bold, Italic, Link, Button, Image, Break Line).
    - Preview the email in the preview section.
    - Click on "Send Email" to send the email.

3. **Preview Logo:**

    - The logo associated with the selected SMTP server will be displayed in the email preview.

## File Structure

email-engine/
├── config.php          # Configuration file for SMTP servers
├── get_servers.php     # Endpoint to fetch server configurations
├── upload_logo.php     # Script to handle logo uploads
├── process_email.php    # Script to handle email sending
├── sendmail.php         # Email Form
├── index.php           # Main HTML file
├── assets/             # Directory for assets like logos
│   └── logos/           # Directory for server logos
│       ├── logo1.png     # Logo for Server 1
│       ├── logo2.png     # Logo for Server 2
│       └── logo3.png     # Logo for Server 3
└── README.md           # This README file

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
