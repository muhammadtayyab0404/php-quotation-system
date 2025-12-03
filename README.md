# 🌟 PHP Quotation & Popup Management System  
A fully dynamic, database-driven PHP application that allows users to register, manage popup notifications, add products, generate quotations, and export them as downloadable PDFs — all powered by clean backend logic and modern frontend techniques.

## ✨ Overview
This project solves a real-world need for small businesses and freelancers who need to:

✔ Create quotations  
✔ Manage dynamic popups on their website  
✔ Add products and calculate totals  
✔ Download clean PDF quotations  
✔ Handle user login/registration with email validation  

Everything is handled through a clean backend interface with real-time updates (using Fetch API), making the system highly interactive and user-friendly.

---

## 🔐 User Authentication
The system includes a complete login/register module:

#### ✔ Features
- Secure user registration  
- PHP Mailer-based email verification  
- Username/password login  
- Prevents unauthorized access  
- Session management  

#### 📤 Email Verification
New users receive a verification email through **PHPMailer**, improving security and authenticity.

---

## 📢 Popup Management System
A powerful backend panel to create and control popups shown on the website frontend.

#### ✔ What You Can Control
- Popup heading & text  
- Display time (`3 sec`, `5 sec`, `Always`)  
- Popup type (`Flash` / `Straight`)  
- Popup position (`Right`, `Center`, `Left`)  
- Activation toggle (Active / Not Active)  
- Real-time updates via JavaScript fetch (no page reload)  

#### ⚙ Behind the Scenes
- Settings saved into database (`popup` table)  
- Only active popup appears in frontend  
- Display logic uses JSON + SQL  

---

## 🛒 Product Management
Add products dynamically — stored safely in JSON format.

#### ✔ Features
- Add unlimited products  
- Product name  
- Product price  
- Data stored as JSON in database  
- Automatically injected into quotation builder  
- Validation for empty fields  
- Smooth and responsive frontend  

---

## 🧾 Quotation Generator
A complete quotation system that:

✔ Shows customer information  
✔ Lists all selected products  
✔ Calculates totals automatically  
✔ Contains terms & conditions  
✔ Generates PDF with a single click  

#### 📄 PDF Generation
The PDF includes:
- Logo (optional)
- Quotation date
- Customer email
- Item-wise price breakdown
- Grand total
- Footer notes

Generated using **DOMPDF/TCPDF**.


#### 📄 Screenshots:

<img width="400" height="500" alt="Image" src="https://github.com/user-attachments/assets/5d00a322-5cb5-4d3f-9954-07b1cdb035e0" />
<img width="400" height="500" alt="Image" src="https://github.com/user-attachments/assets/13aeb753-9008-414e-9c05-21785c22cd7b" />
<img width="400" height="500" alt="Image" src="https://github.com/user-attachments/assets/b875d9a5-f60e-4be4-92cb-8786a0aca02e" />
<img width="400" height="500" alt="Image" src="https://github.com/user-attachments/assets/2d44576c-0765-4bf9-9566-e6fe2bd2edb3" />

<img width="400" height="500" alt="Image" src="https://github.com/user-attachments/assets/4cea476d-d7d7-4810-94a1-1828ddda770b" />

---

## 🛠 Technology Stack
| Technology | Purpose |
|-----------|----------|
| **PHP** | Core backend logic |
| **MySQL** | Database storage |
| **PHPMailer** | Email verification |
| **JavaScript (Fetch API)** | Ajax-like asynchronous updates |
| **HTML / CSS** | Frontend UI |
| **Bootstrap** | Styling and layout |
| **DOMPDF / TCPDF** | PDF generation |
| **GitHub** | Version control |

