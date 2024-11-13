# Frentals Web App

Welcome to **Frentals**!

Frentals is a web application that facilitates a community-driven marketplace for renting various items. Users can post items, browse listings based on location, and connect with each other to complete rental transactions. The application leverages a combination of modern web technologies and plans for advanced enhancements using AI and ML.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **API Integration:** Location-based services (e.g., Google Maps API or OpenCage Geocoding API)
- **Backend:** SQL database (e.g., MySQL, PostgreSQL)
- **Authentication:** User login system with secure password hashing (using bcrypt or similar hashing algorithms)

### Planned Enhancements:
- **Artificial Intelligence (AI):** For damage image recognition (e.g., identifying damages on rented items through image analysis).
- **Machine Learning (ML):** For personalized search and recommendations, enhancing the user experience by providing relevant item suggestions based on rental history and preferences.

## Getting Started

### Prerequisites

To run **Frentals**, you need:
- A web server environment (e.g., Apache, Nginx) with PHP support.
- A database server (e.g., MySQL, PostgreSQL).

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/frentals.git
   ```
   _Use this code with caution._

2. **Set up the database:**
   - Create a database for Frentals on your database server.
   - Import the provided SQL schema (if available) or create your own tables for users, posts, locations, etc.

3. **Configure database connection:**
   - Edit the `config.php` (or similar file) to match your database credentials:
     ```php
     $dbHost = 'localhost';
     $dbUsername = 'your-username';
     $dbPassword = 'your-password';
     $dbName = 'frentals_db';
     ```
   - Ensure your database and table structure is correctly set up.

### Running the Application

1. Start your web server.
2. Point your web browser to `http://localhost/frentals/` (or the appropriate URL based on your setup).
3. If everything is configured correctly, you should see the **Frentals** web interface.

## Features

- **User Login/Registration:** Users can create accounts and log in securely, with password encryption.
- **Location-Based Listings:** Users can view posts based on their current location or a specified area. This functionality uses integrated location services like the Google Maps API.
- **Post Creation and Management:** Users can post items for rent, providing descriptions, images, and rental details.
- **Search Functionality:** Users can search for items based on keywords or categories. **Planned ML-powered search** will make recommendations based on user preferences and search history.

### Planned Enhancements:
- **Damage Image Recognition using AI:** The application will integrate an AI model to analyze uploaded images of rental items for potential damage. This will help users assess the condition of items before renting.
- **Personalized Search and Recommendations using ML:** Machine learning algorithms will be used to personalize the search experience, offering suggestions based on user preferences, rental history, and trends.

## Contributing

We welcome contributions to **Frentals**! If you have any suggestions or code improvements, please feel free to fork the repository and submit a pull request. We will review and merge your changes as appropriate.

### How to Contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-xyz`).
3. Make your changes and commit (`git commit -am 'Add feature XYZ'`).
4. Push to the branch (`git push origin feature-xyz`).
5. Open a pull request from your branch to the `main` branch.

## License

Frentals is licensed under the **MIT License**.
