# Personal Expense Tracker 💸

A PHP-based web application to help users manage and analyze personal expenses with ease.

## 🚀 Features

- ✅ User Registration & Login
- 💳 Add, Update, Delete Expenses
- 📊 View Reports with Charts
- 🔐 Change Password
- 👤 Profile
- 📱 Responsive UI using Bootstrap

## 📁 Project Structure


## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, Bootstrap, Chart.js
- **Backend:** PHP
- **Database:** MySQL

## ⚙️ Setup Instructions

1. **Clone the repository**
   
   ```bash
   git clone https://github.com/Anaghaank/Personal-Expense-Tracker.git
   cd Personal-Expense-Tracker
   ```
2. Import the SQL database  
   Open phpMyAdmin or your preferred MySQL interface:

   1. Create a new database (e.g., `expense_tracker`)  
   2. Select the new database  
   3. Click the **Import** tab  
   4. Choose the `PersonalExpenseTracker.sql` file  
   5. Click **Go** to import  

3. Update database configuration  
   Edit the `config.php` file and set the following:

   ```php
   $dbHost = 'localhost';
   $dbUser = 'your_username';
   $dbPass = 'your_password';
   $dbName = 'expense_tracker';
   ```

4. Run the app locally

   1. Install and run **XAMPP**.
   2. Place the project folder inside the `htdocs/` directory  
      - Example path: `C:/xampp/htdocs/Personal-Expense-Tracker`
   3. Start **Apache** and **MySQL** via the XAMPP/WAMP Control Panel
   4. Open your browser and visit:  
      [http://localhost/Personal-Expense-Tracker](http://localhost/Personal-Expense-Tracker)


🙌 Contribution
Pull requests are welcome.

📜 License
This project is open-source and free to use for educational or personal use.
