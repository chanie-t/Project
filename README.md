# Laravel 12 Product Management System

Dự án này là một hệ thống quản lý sản phẩm được xây dựng bằng Laravel 12, sử dụng MySQL làm cơ sở dữ liệu, và tích hợp các chức năng cơ bản như:

- Quản lý sản phẩm (CRUD)
- Quản lý danh mục (CRUD)
- Quản lý nhãn hàng (CRUD)
- Tìm kiếm sản phẩm
- Phân quyền người dùng: Admin & Client
- Xác thực người dùng sử dụng Laravel Breeze
- Lazy load
---

## 🛠️ Công nghệ sử dụng

- **Framework**: Laravel 12
- **Cơ sở dữ liệu**: MySQL
- **Xác thực**: Laravel Breeze
- **Quản lý gói**: Composer, NPM
- **Frontend**: Blade / Tailwind CSS (Breeze mặc định)

---

## Định nghĩa Các bảng
### Bảng: categories

| Tên Cột       | Kiểu Dữ Liệu | Ràng Buộc             | Mô Tả                       |
|---------------|--------------|------------------------|-----------------------------|
| id            | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng      |
| name          | STRING       | NOT NULL               | Tên                        |
| slug          | STRING       | UNIQUE, NOT NULL       | Chuỗi định danh duy nhất  |
| description   | TEXT         | NULLABLE               | Mô tả (có thể để trống)    |
| created_at    | TIMESTAMP    | NULLABLE               | Thời gian tạo              |
| updated_at    | TIMESTAMP    | NULLABLE               | Thời gian cập nhật         |

### Bảng: brands

| Tên Cột       | Kiểu Dữ Liệu | Ràng Buộc             | Mô Tả                       |
|---------------|--------------|------------------------|-----------------------------|
| id            | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng      |
| name          | STRING       | NOT NULL               | Tên                        |
| slug          | STRING       | UNIQUE, NOT NULL       | Chuỗi định danh duy nhất  |
| description   | TEXT         | NULLABLE               | Mô tả (có thể để trống)    |
| created_at    | TIMESTAMP    | NULLABLE               | Thời gian tạo              |
| updated_at    | TIMESTAMP    | NULLABLE               | Thời gian cập nhật         |

### Bảng: products

| Tên Cột            | Kiểu Dữ Liệu     | Ràng Buộc                                       | Mô Tả                          |
|--------------------|------------------|--------------------------------------------------|--------------------------------|
| id                 | BIGINT           | PRIMARY KEY, AUTO_INCREMENT                     | Khóa chính                    |
| name               | STRING           | NOT NULL                                        | Tên sản phẩm                  |
| slug               | STRING           | UNIQUE, NOT NULL                                | Slug để SEO                   |
| short_description  | TEXT             | NULLABLE                                        | Mô tả ngắn                    |
| description        | LONGTEXT         | NULLABLE                                        | Mô tả chi tiết                |
| category_id        | UNSIGNED BIGINT  | FOREIGN KEY → categories(id), ON DELETE CASCADE | Danh mục                      |
| brand_id           | UNSIGNED BIGINT  | FOREIGN KEY → brands(id), ON DELETE CASCADE     | Nhãn hàng                     |
| image              | STRING           | NULLABLE                                        | Ảnh sản phẩm                  |
| price              | DECIMAL(10, 2)   | DEFAULT 0.00                                    | Giá tiền                      |
| quantity           | INTEGER          | DEFAULT 0                                       | Số lượng                      |
| status             | ENUM             | DEFAULT 'stock'                                 | Trạng thái: `stock`, `out_of_stock`,`discontinued` |
| created_at         | TIMESTAMP        | NULLABLE                                        | Thời gian tạo                 |
| updated_at         | TIMESTAMP        | NULLABLE                                        | Thời gian cập nhật            |

### Bảng: users

| Tên Cột             | Kiểu Dữ Liệu     | Ràng Buộc               | Mô Tả                                         |
|---------------------|------------------|--------------------------|-----------------------------------------------|
| id                  | BIGINT           | PRIMARY KEY, AUTO_INCREMENT | Khóa chính                                |
| name                | STRING           | NOT NULL                 | Tên người dùng                               |
| email               | STRING           | UNIQUE, NOT NULL         | Địa chỉ email                                |
| email_verified_at   | TIMESTAMP        | NULLABLE                 | Thời gian xác minh email                     |
| password            | STRING           | NOT NULL                 | Mật khẩu đã được mã hóa                      |
| remember_token      | STRING           | NULLABLE                 | Token để ghi nhớ đăng nhập                   |
| role                | ENUM             | DEFAULT 'client'         | Vai trò: `admin`, `client`                   |
| created_at          | TIMESTAMP        | NULLABLE                 | Thời gian tạo                                |
| updated_at          | TIMESTAMP        | NULLABLE                 | Thời gian cập nhật                           |

---
## ⚙️ Cài đặt

```bash
# Clone dự án
git clone https://github.com/chanie-t/Project.git
cd Project.git

# Cài đặt các gói PHP
composer install

# Cài đặt các gói Node (nếu dùng frontend Breeze)
npm install

# Tạo file cấu hình
cp .env.example .env

# Cấu hình thông tin database trong file .env
#DB_CONNECTION=mysql
#DB_HOST=
#DB_PORT=
#DB_DATABASE=
#DB_USERNAME=
#DB_PASSWORD=

# Tạo key ứng dụng
php artisan key:generate

# Chạy migration và seed dữ liệu (nếu có)
php artisan migrate

#Có thể hạy seeder để fake dữ liệu (không áp dụng với môi trường production)
php artisan db:seed

# Khởi động server
php artisan serve

# Chạy npm 
npm run dev

```
