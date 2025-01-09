# LRV_Web_Dev

A full-stack web development project utilizing modern technologies for both backend and frontend to deliver an advanced and user-friendly application.
![Makeup Service](/public/images/homepage.png)
---

## **Technologies Used**

### **Backend:**
- **Laravel**: A PHP framework for web application development.
- **Eloquent ORM**: Database abstraction for handling database operations.
- **Sanctum**: Lightweight authentication for SPA and APIs.
- **Telescope**: Debugging and monitoring tools for Laravel applications.
- **Sentry**: Error tracking and performance monitoring.
- **MySQL**: Relational database for persistent data storage.

### **Frontend:**
- **Tailwind CSS**: Utility-first CSS framework for styling.
- **Bootstrap**: Frontend toolkit for responsive designs.
- **Vite**: Frontend build tool for bundling and faster development.
- **JavaScript/ES6**: For interactivity and client-side functionality.

---

## **Setup Instructions**

Follow these steps to set up and run the application locally.

### **1. Clone the Repository**
```bash
git clone https://github.com/maitrinh33/LRV_Web_Dev.git
cd LRV_Web_Dev/backend
```

### **2. Configure the Environment**
Create the .env file by copying the example:

```bash
cp .env.example .env
```
Update database credentials in the .env file:
Set the DB_DATABASE, DB_USERNAME, and DB_PASSWORD values.
If using MySQL Workbench, replace the password with your MySQL credentials.
If using XAMPP, leave the password empty.

### **3. Install Dependencies**
Run the following commands to install PHP and Node.js dependencies:
```bash
composer install
npm install
```

### **4. Start Apache and MySQL (XAMPP)**
Open XAMPP and click "Start" for Apache and MySQL.

### **5. Migrate and Seed the Database**
Run database migrations and seeders:
```bash
php artisan migrate --seed
```

### **6. Start Development Servers**
Open one terminal for the frontend:
```bash
npm run dev
```
Open another terminal for the backend:
```bash
php artisan serve
```
### **7. Access the Application**
Visit the application at http://127.0.0.1:8000.

