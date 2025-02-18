# 🏥 IoT Health Tracking System

## 🛠️ Project Description
The **IoT Health Tracking System** is a web-based platform that enables users to track their health metrics, manage medical appointments, and interact with healthcare professionals. Built using **PHP** and **MySQL**, this system provides an interactive and user-friendly experience for healthcare monitoring.

## 📝 Features
- ✔️ User authentication and login system
- ✔️ Health record tracking
- ✔️ Appointment scheduling
- ✔️ Chat functionality for doctor-patient interaction
- ✔️ Feedback and support system
- ✔️ Secure database management using MySQL

## 🛡️ Tech Stack
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL

## 📚 Installation Guide

### Prerequisites
Ensure you have the following installed:
- ✨ XAMPP/WAMP for running Apache and MySQL
- ✨ PHP (v7.4 or later)
- ✨ MySQL Database

### File Structure
```
IoT-Health-Tracking/
│── health_tracking/
│   ├── appointments.php
│   ├── chat.php
│   ├── dashboard.php
│   ├── db.sql
│   ├── feedback.php
│   ├── health_tracking.sql
│   ├── help.php
│   ├── history.php
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── register.php
│   ├── profile.php
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   ├── images/
│   ├── includes/
│   │   ├── db_connect.php
│   │   ├── functions.php
│   ├── config.php
```

### Steps to Set Up the Project
1. **Clone the Repository**
   ```sh
   git clone https://github.com/RohanPatil2/Iot-Health-Tracking.git
   ```
2. **Move the Project Files**
   - Copy the `health_tracking` folder into your local web server directory (`htdocs` for XAMPP or `www` for WAMP).
   
3. **Configure the Database**
   - Open **phpMyAdmin** and create a database (e.g., `health_tracking`).
   - Import the provided **`health_tracking.sql`** file into the database.

4. **Configure Database Connection**
   - Open the `includes/db_connect.php` file.
   - Update the database credentials:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "health_tracking";
     ```

5. **Start the Server**
   - Open XAMPP/WAMP and start **Apache** and **MySQL**.
   - Open a browser and visit:
     ```
     http://localhost/health_tracking/
     ```

## 🔧 Usage
- **Login/Register** to access the dashboard.
- **Schedule Appointments** with healthcare providers.
- **Chat** with doctors in real-time.
- **View Health History** and manage medical records.
- **Provide Feedback** to improve services.

## 🌟 Contributing
We welcome contributions! If you'd like to contribute:
1. Fork the repository.
2. Create a feature branch (`feature-branch-name`).
3. Commit your changes and push to the forked repo.
4. Create a pull request.

## 👤 Author
**Rohan Patil** <br> 
GitHub: [@RohanPatil2](https://github.com/RohanPatil2)<br>
**Shreyas Khandale**<br>
Github: [@sherurox](https://github.com/sherurox).<br>

## ✨ License
This project is **open-source** under the MIT License.

---

🌟 *Empowering Healthcare with Technology!*
