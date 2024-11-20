# Vescel: E-Commerce Platform

**Vescel** is a robust, feature-rich e-commerce platform designed to handle products, categories, subcategories, user management, and orders in a seamless way. Developed by **Sameed**, this platform provides an easy-to-use interface for both admins and users, ensuring smooth business operations and shopping experiences.

---

## Features

### 🛒 **Product Management**
- **Add, Edit, and Delete Products**: Admins can manage product details like name, description, price, and images.
- **Product Variations**: Support for multiple product variants (e.g., size, color, etc.).
- **Stock Management**: Real-time stock management with low stock alerts.

### 📂 **Categories & Subcategories**
- **Dynamic Categories**: Create and manage categories for different product types.
- **Subcategory Support**: Products can be organized into categories and subcategories for easy navigation.

### 📦 **Order Management**
- **Order Tracking**: View order status, including `Pending`, `Processing`, `Shipped`, and `Delivered`.
- **Invoice Generation**: Generate invoices for orders, which can be downloaded as PDFs.
- **Shipping Integration**: Integrate shipping providers to calculate real-time shipping costs.
  
### 🧑‍🤝‍🧑 **User Management**
- **Admin Dashboard**: Manage user roles, including admins, customers, and support staff.
- **Customer Management**: View customer profiles, order history, and manage addresses.
- **User Roles**: Define different roles (Admin, Seller, Customer) with specific access levels.

---

## Modules and Functionality

### **Categories & Subcategories**
- **Create Categories**: Admins can create categories for different products (e.g., Electronics, Apparel).
- **Manage Subcategories**: Organize products into relevant subcategories (e.g., Phones under Electronics).
- **Dynamic Navigation**: Filter products by categories and subcategories.

### **Product Management**
- **Add Products**: Admins can upload products with images, descriptions, prices, and inventory.
- **Bulk Upload**: Option to upload multiple products at once via CSV import.
- **Product Reviews**: Customers can leave reviews and ratings for products.

### **Order Management**
- **Order Status**: Admins can update order statuses (Pending, Shipped, Delivered).
- **Order History**: Customers can view their complete order history with statuses.
- **Tracking Numbers**: Admins can add tracking numbers for shipped orders.

### **User Management**
- **Admin Roles**: Admins can add/edit users and assign specific roles (Admin, Customer).
- **Customer Profiles**: Admins can manage customer data, including email, shipping addresses, and order history.
- **Authentication**: Integrated authentication system with secure login and registration.

---

## Installation

### Prerequisites
- PHP 8.2+
- Laravel 11
- MySQL
- Composer
- Node.js

### Steps
1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-username/vescel.git
    ```
2. **Navigate to the project directory**:
    ```bash
    cd vescel
    ```
3. **Install dependencies**:
    ```bash
    composer install
    npm install && npm run dev
    ```
4. **Set up environment variables**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
5. **Run migrations and seeders**:
    ```bash
    php artisan migrate --seed
    ```
6. **Start the server**:
    ```bash
    php artisan serve
    ```

---

## Usage

### User Features
- **Product Catalog**: Browse products by categories and subcategories.
- **Order Placement**: Add products to the cart and proceed to checkout.
- **Customer Profile**: View and manage your account details, order history, and shipping addresses.

### Admin Panel
- **Dashboard Overview**: Quick access to sales statistics, recent orders, and product management.
- **Order Management**: View and update order statuses, track shipments, and generate invoices.
- **Product Management**: Add, update, and delete products and manage categories and subcategories.
- **User Management**: Create, manage, and assign roles to users.

---

## Technologies Used
- **Backend**: Laravel 11
- **Frontend**: Livewire 3
- **Authentication**: Laravel Sanctum, JWT
- **Database**: MySQL
- **File Handling**: Spatie Media Library

---

## Developer Information
- **Developer**: Sameed
- **Instagram**: [@not_sameed52](https://www.instagram.com/not_sameed52/)
- **Discord**: sameededitz
- **Linktree**: [linktr.ee/sameededitz](https://linktr.ee/sameededitz)
- **Company**: TecClubb
  - **Website**: [https://tecclubb.com/](https://tecclubb.com/)
  - **Contact**: tecclubb@gmail.com

---

## Contributing
We welcome contributions! Fork the repository, create a new branch, and submit a pull request. For larger changes, please open an issue first to discuss.

---

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Contact
For inquiries or support, reach out via:
- **Email**: tecclubb@gmail.com
- **Website**: [https://tecclubb.com/](https://tecclubb.com/)
