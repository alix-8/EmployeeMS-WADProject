#  Employee Management System (EMPLOYEE-MS)

The **Employee Management System**  is designed to streamline the management of employee records through a clean, efficient, and user-friendly interface.

## Features
* **Full CRUD Operations**: Create, Read, Update, and Delete employee records seamlessly.
* * **Responsive UI**: A modern interface built using **Bootstrap 5** and **Bootstrap Icons** for a consistent experience across devices.

## Additional Features
* **Search & Filter**: Quickly find employees by name or filter them by their specific **Department**.
<img width="1705" height="197" alt="Screenshot 2026-03-17 172235" src="https://github.com/user-attachments/assets/c5b0b92f-fca7-4ec3-ad72-92c8252cc579" />

## Database Schema
The `employees` table consists of the following fields:

| Field | Type | Description |
| :--- | :--- | :--- |
| `employee_id` | String | Unique company identification (EMP-####) |
| `name` | String | The employee's full name |
| `email` | String | Professional/Personal email address |
| `department` | String | IT, HR, Finance, Marketing, or Operations |
| `date_hired` | Date | The official date the employee joined the company |

## Screenshots of CRUD operations
### CREATE
<img width="1919" height="1017" alt="Screenshot 2026-03-17 172008" src="https://github.com/user-attachments/assets/2c051a4f-2210-43e4-9c84-e73f8c972310" />

### READ
Employees' list information
<img width="1919" height="1017" alt="Screenshot 2026-03-17 171953" src="https://github.com/user-attachments/assets/5926eb9f-4027-449c-a385-b23e71872c24" />

Individual Employee Information
<img width="959" height="509" alt="image" src="https://github.com/user-attachments/assets/6b94fc4c-1d17-44bf-9be3-c7e500db3829" />

### UPDATE
<img width="1919" height="1015" alt="Screenshot 2026-03-17 172028" src="https://github.com/user-attachments/assets/c1cf4c16-d18c-4cb1-a614-aa87df938e00" />

### DELETE
<img width="682" height="221" alt="Screenshot 2026-03-17 172212" src="https://github.com/user-attachments/assets/a3d1188c-7fdc-4791-bf6f-a10d94cf2468" />



##Local Installation Guide

1.  **Clone the repository**:
    ```bash
    git clone [https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git](https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git)
    ```
2.  **Install PHP dependencies**:
    ```bash
    composer install
    ```
3.  **Install Frontend assets**:
    ```bash
    npm install && npm run dev
    ```
4.  **Environment Setup**:
    * Duplicate `.env.example` and rename it to `.env`.
    * Configure your database credentials in the `.env` file.
    * Generate the application key:
        ```bash
        php artisan key:generate
        ```
5.  **Database Migration**:
    ```bash
    php artisan migrate --seed
    ```
6.  **Launch the Application**:
    ```bash
    php artisan serve
    ```
