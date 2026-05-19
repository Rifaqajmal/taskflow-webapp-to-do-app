<div align="center">

# ✅ TaskFlow — Smart To-Do Web App

**A modern, professional task management web app**
built with PHP · MySQL · Bootstrap 5 · JavaScript

![Status](https://img.shields.io/badge/Status-Active-brightgreen?style=flat-square)
![PHP](https://img.shields.io/badge/PHP-Backend-777BB4?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat-square&logo=bootstrap)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat-square&logo=javascript)

</div>

---

## 🚀 Features

- ✅ Add, Complete, and Delete Tasks
- 🔴 Priority System — High / Medium / Low
- 📚 Task Categories — Study / Work / Personal / General
- 📅 Due Date with Overdue Detection
- 🔍 Live Search
- 🏷️ Filter by Status — All / Pending / Completed
- 🔽 Filter by Priority — High / Medium / Low
- 📊 Real-time Progress Bar
- 🌙 Dark Mode (saved in localStorage)
- 📱 Fully Responsive Design
- 🔔 Toast Notifications

---

## 🛠️ Technology Stack

| Technology | Purpose |
|---|---|
| HTML5 | Page Structure |
| CSS3 | Custom Styling |
| Bootstrap 5 | Responsive UI Components |
| JavaScript | Interactivity & DOM |
| PHP | Backend Logic |
| MySQL | Database |
| XAMPP | Local Development Server |
| Git & GitHub | Version Control |

---

## 📁 Project Structure
taskflow-webapp/
│
├── includes/
│   └── db.php              # Database connection
│
├── index.php               # Main page (UI + task display)
├── add_task.php            # Add task logic
├── complete_task.php       # Mark task as done
├── delete_task.php         # Delete task
├── style.css               # All custom styles + dark mode
├── darkmode.js             # Dark mode toggle logic
├── todo_db.sql             # Database structure
└── README.md
---

## ⚙️ Installation Guide

### Requirements
- XAMPP installed on your PC
- Any modern web browser

### Setup Steps

**1.** Download or clone this repository

**2.** Move the folder to:

C:\xampp\htdocs\taskflow-webapp

**3.** Start **Apache** and **MySQL** in XAMPP Control Panel

**4.** Open phpMyAdmin:

http://localhost/phpmyadmin

**5.** Create a new database named:

todo_db

**6.** Import the `todo_db.sql` file

**7.** Open the app in your browser:
http://localhost/taskflow-webapp/
