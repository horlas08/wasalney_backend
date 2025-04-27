<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تطبيق خدمات </title>
    <link rel="stylesheet" href="/theme/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
        <style>
      
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #e63946;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c5303a;
        }
        .note {
            color: #333;
            font-size: 14px;
            text-align: center;
            margin-top: 15px;
        }
        .success-message {
            color: green;
            font-size: 16px;
            text-align: center;
            display: none;
        }
    </style>
    
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="{{ url('/') }}">
                    <img src="/theme/img/logo.png" alt="شعار خدمات النقل" class="logo" />
                </a>
            </div>
            <nav class="nav-links">
                <ul>
                    <li><a href="/about" class="nav-button">حولنا</a></li>
                    <li><a href="/contact" class="nav-button">الاتصال بنا</a></li>
                    <li><a href="/terms" class="nav-button">الشروط والأحكام</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner" style="background-image: url('/theme/img/transport.svg');"></section>

<form onsubmit="sendToWhatsApp(event)">
        <h2>طلب حذف الحساب</h2>

        <label for="fullName">الاسم الكامل:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="driverNumber">رقم السائق:</label>
        <input type="text" id="driverNumber" name="driverNumber" required>

        <label for="description">التفاصيل:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">تأكيد الحذف</button>

        <p class="note">سيتم مراجعة طلبك خلال 24 ساعة القادمة.</p>
        <p class="success-message" id="successMessage">تم إرسال طلبك بنجاح.</p>
    </form>    


    <footer>
        <p>&copy; 2024 جميع الحقوق محفوظة. تطبيق  اوكي</p>
    </footer>
</body>
    <script>
        function sendToWhatsApp(event) {
            event.preventDefault();

            // دریافت اطلاعات فرم
            const fullName = document.getElementById("fullName").value;
            const driverNumber = document.getElementById("driverNumber").value;
            const description = document.getElementById("description").value;

            // ساخت پیام واتساپ با کاراکترهای خط جدید و کدگذاری صحیح
            const message = `طلب حذف الحساب:%0Aالاسم الكامل: ${encodeURIComponent(fullName)}%0Aرقم السائق: ${encodeURIComponent(driverNumber)}%0Aالتفاصيل: ${encodeURIComponent(description)}`;
            const whatsappNumber = "9647751685863"; // شماره واتساپ گیرنده (کد کشور + شماره)

            // ایجاد لینک واتساپ
            const whatsappLink = `https://wa.me/${whatsappNumber}?text=${message}`;

            // باز کردن لینک واتساپ در یک تب جدید
            window.open(whatsappLink, "_blank");

            // نمایش پیام موفقیت‌آمیز
            document.getElementById('successMessage').style.display = 'block';
        }
    </script>
</html>
