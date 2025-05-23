﻿# Simple_File_Encryptor_and_Decrypter
# 🔐 SecureCloudStore – Flask-Based Encrypted Online Storage System

**SecureCloudStore** is a modern, Flask-based cloud storage application that allows users to securely upload, encrypt, download, and share files. It supports both public and private file uploads, using strong cryptographic practices to ensure confidentiality, integrity, and user-controlled access. 

This application is ideal for individuals and organizations looking to maintain a secure, accessible, and user-friendly file storage system hosted online.

---

## 🚀 Features

### ✅ User Management
- User **Registration** and **Login** (session-based authentication)
- Each user has a personalized storage space

### 📁 Secure File Upload
- Upload files as **Public** or **Private**
- Private files are **AES-256-CBC encrypted** before storage
- Files are **categorized** and stored with metadata (name, type, timestamp, etc.)

### 🔑 Encryption & Decryption
- Encryption performed automatically during upload (Private files only)
- Secret key is auto-generated and **emailed** to the user
- Files can only be **decrypted using the correct secret key**
- PBKDF2-based key derivation for added security

### 📤 File Download
- Authenticated users can download their files
- Decryption occurs **only after key verification**
- Decryption logic uses secure salt and IV extraction from encrypted file

### 🌐 Web Interface
- Responsive design (HTML/CSS + Bootstrap)
- Users can browse, search, and manage their files online


---


