<div align="center">

<img src="https://readme-typing-svg.herokuapp.com?font=Inter&weight=700&size=32&pause=1000&color=6366F1&center=true&vCenter=true&width=500&lines=✅+TaskFlow;Smart+To-Do+Web+App" alt="TaskFlow" />

<p align="center">
  <b>A modern, professional task management web application</b><br>
  Built with PHP · MySQL · Bootstrap 5 · Vanilla JavaScript
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen?style=for-the-badge" />
  <img src="https://img.shields.io/badge/Version-1.0.0-6366f1?style=for-the-badge" />
  <img src="https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Bootstrap_5-7952B3?style=flat-square&logo=bootstrap&logoColor=white" />
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black" />
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white" />
</p>

</div>

---

## 📌 About The Project

**TaskFlow** is a full-stack task management web application designed to help users organize their daily tasks efficiently. It features a clean sidebar dashboard layout, real-time filtering, dark mode, and priority-based task management — all built from scratch using core web technologies.

> 💡 This project was built as part of **BS Computer Science — Semester 6** coursework at **UET Mardan**, focused on practical Web Development skills.

---

## ✨ Features

<table>
<tr>
<td>

**Core Features**
- ✅ Add, Complete & Delete Tasks
- 🔴 Priority System (High / Medium / Low)
- 📚 Task Categories (Study / Work / Personal)
- 📅 Due Date with Overdue Detection
- 📊 Real-time Progress Bar

</td>
<td>

**UI Features**
- 🌙 Dark Mode (localStorage)
- 🔍 Live Search
- 🏷️ Filter by Status & Priority
- 🔔 Toast Notifications
- 📱 Fully Responsive Design

</td>
</tr>
</table>

---

## 🛠️ Technology Stack

| Layer | Technology | Purpose |
|---|---|---|
| Frontend | HTML5 + CSS3 | Page structure & styling |
| UI Framework | Bootstrap 5 | Responsive components |
| Interactivity | JavaScript ES6 | DOM manipulation, search, filters |
| Backend | PHP 8 | Server-side logic & CRUD |
| Database | MySQL | Data storage |
| Local Server | XAMPP | Development environment |
| Version Control | Git & GitHub | Source control & deployment |

---

## 📁 Project Structure
taskflow-webapp/
│
├── 📁 includes/
│   └── db.php              # Database connection file
│
├── 📄 index.php            # Main dashboard (UI + task display)
├── 📄 add_task.php         # Handle add task form submission
├── 📄 complete_task.php    # Mark task as completed
├── 📄 delete_task.php      # Delete a task
├── 🎨 style.css            # All custom styles + dark mode
├── ⚡ darkmode.js          # Dark mode toggle logic
├── 🗄️ todo_db.sql          # Database schema & structure
└── 📘 README.md

---

## ⚙️ Installation & Setup

### ✅ Requirements
- [XAMPP](https://www.apachefriends.org/) installed on your PC
- Any modern web browser (Chrome, Firefox, Edge)

### 🚀 Setup Steps

**Step 1** — Download or clone this repository
```bash
git clone https://github.com/Rifaqajmal/taskflow-webapp-to-do-app.git
```

**Step 2** — Move the folder to your XAMPP directory
C:\xampp\htdocs\taskflow-webapp\

**Step 3** — Start XAMPP and run both:
- ✅ Apache
- ✅ MySQL

**Step 4** — Open phpMyAdmin in your browser
http://localhost/phpmyadmin

**Step 5** — Create a new database
```sql
CREATE DATABASE todo_db;
```

**Step 6** — Import the database file
> phpMyAdmin → select `todo_db` → Import tab → choose `todo_db.sql` → Go

**Step 7** — Open the app
http://localhost/taskflow-webapp/

---

## 🗄️ Database Schema

```sql
CREATE TABLE tasks (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    task_name   VARCHAR(255) NOT NULL,
    priority    VARCHAR(50)  DEFAULT 'Medium',
    status      VARCHAR(50)  DEFAULT 'Pending',
    category    VARCHAR(50)  DEFAULT 'General',
    due_date    DATE         NULL,
    created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🎯 What I Learned

By building this project, I gained hands-on experience with:

- ✅ Full CRUD operations using PHP & MySQL
- ✅ Database connection and query execution
- ✅ Bootstrap 5 grid and component system
- ✅ JavaScript DOM manipulation
- ✅ localStorage for persistent settings
- ✅ Responsive dashboard UI design
- ✅ Git & GitHub version control workflow

---

## 🔮 Future Improvements

- [ ] User Authentication (Login / Register)
- [ ] Task editing functionality
- [ ] Email reminders for due dates
- [ ] Drag & drop task reordering
- [ ] Data export to PDF

---

## 👨‍💻 Developer

<div align="center">

**Rifaq Ajmal**

BS Computer Science — Semester 6 | UET Mardan, Pakistan

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-0077B5?style=for-the-badge&logo=linkedin)](https://linkedin.com/in/rifaq-ajmal-4b5a513b3)
[![GitHub](https://img.shields.io/badge/GitHub-Follow-181717?style=for-the-badge&logo=github)](https://github.com/Rifaqajmal)

</div>

---

<div align="center">

⭐ **If you find this project helpful, please give it a star!** ⭐

*Built with ❤️ by Rifaq Ajmal — UET Mardan*

</div>
