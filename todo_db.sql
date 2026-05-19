-- ============================================
-- TaskFlow — Smart To-Do Web App
-- Database File
-- Developer: Rifaq Ajmal
-- University: UET Mardan
-- ============================================

CREATE DATABASE IF NOT EXISTS todo_db;
USE todo_db;

CREATE TABLE tasks (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    task_name   VARCHAR(255) NOT NULL,
    priority    VARCHAR(50)  DEFAULT 'Medium',
    status      VARCHAR(50)  DEFAULT 'Pending',
    category    VARCHAR(50)  DEFAULT 'General',
    due_date    DATE         NULL,
    created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);
