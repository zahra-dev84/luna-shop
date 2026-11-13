<?php

$page_title="درباره ما";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

?>

<div class="about-hero">

<div class="container">

<div class="breadcrumb breadcrumb-light">
<a href="index.php">صفحه اصلی</a> / <span>درباره ما</span>
</div>

<h1>داستان عروسک فروشی لونا 🌷</h1>

<p>ما اینجاییم تا لبخند را به خانه‌ی شما هدیه بدهیم</p>

</div>

</div>

<div class="container">

<div class="about-story">

<div class="about-story-image">

<img src="images/doll6.jpg" alt="داستان لونا">

</div>

<div class="about-story-text">

<h2>ما که هستیم؟</h2>

<p>
فروشگاه لونا از سال ۱۴۰۰ فعالیت خود را با یک هدف ساده آغاز کرد:
عرضه‌ی باکیفیت‌ترین و بامزه‌ترین عروسک‌ها برای کودکان و بزرگسالانی
که هنوز دلی کودکانه دارند. هر عروسکی که در لونا می‌بینید،
با دقت و عشق انتخاب شده تا لحظاتی گرم و پر از خاطره برای شما بسازد.
</p>

<p>
امروز، لونا با ارائه‌ی بیش از صدها مدل عروسک در سایزها و طرح‌های
متنوع، به یکی از انتخاب‌های مورد اعتماد خانواده‌های ایرانی تبدیل
شده است؛ چه برای هدیه دادن، چه برای دکوراسیون اتاق کودک و چه فقط
برای شادتر کردن یک روز معمولی.
</p>

<a href="products.php" class="btn">مشاهده محصولات ما</a>

</div>

</div>

</div>

<div class="stats-section">

<div class="container stats-grid">

<div class="stat-item">
<i class="fa-solid fa-award"></i>
<h3>+۵</h3>
<p>سال تجربه</p>
</div>

<div class="stat-item">
<i class="fa-solid fa-box-open"></i>
<h3>+۳۰۰</h3>
<p>محصول متنوع</p>
</div>

<div class="stat-item">
<i class="fa-solid fa-heart"></i>
<h3>+۵۰۰۰</h3>
<p>مشتری راضی</p>
</div>

<div class="stat-item">
<i class="fa-solid fa-face-smile"></i>
<h3>۹۸٪</h3>
<p>رضایت مشتریان</p>
</div>

</div>

</div>

<div class="container">

<h2 class="section-title">چرا لونا را انتخاب می‌کنند؟</h2>

<div class="values-grid">

<div class="value-card">

<i class="fa-solid fa-gem"></i>

<h3>کیفیت برتر</h3>

<p>تمام عروسک‌های لونا از پارچه‌های نرم، ضدحساسیت و باکیفیت تولید می‌شوند و استاندارد ایمنی کودک را رعایت می‌کنند.</p>

</div>

<div class="value-card">

<i class="fa-solid fa-layer-group"></i>

<h3>تنوع بی‌نظیر</h3>

<p>از عروسک‌های کوچک و قابل‌حمل تا عروسک‌های بزرگ برای دکوراسیون، برای هر ذوق و سنی گزینه‌ای داریم.</p>

</div>

<div class="value-card">

<i class="fa-solid fa-truck-fast"></i>

<h3>ارسال سریع و مطمئن</h3>

<p>سفارش شما با بسته‌بندی ایمن، طی ۲۴ تا ۴۸ ساعت به سراسر کشور ارسال می‌شود.</p>

</div>

<div class="value-card">

<i class="fa-solid fa-headset"></i>

<h3>پشتیبانی همیشگی</h3>

<p>تیم پشتیبانی لونا همیشه آماده پاسخگویی به سوالات و درخواست‌های شماست.</p>

</div>

</div>

</div>

<div class="container">

<div class="contact-section">

<div class="contact-info">

<h2>در تماس باشید</h2>

<p>هر سوال، پیشنهاد یا انتقادی دارید، خوشحال می‌شویم بشنویم.</p>

<ul>

<li><i class="fa-solid fa-location-dot"></i> تهران، خیابان ولیعصر، پلاک ۱۲۰</li>
<li><i class="fa-solid fa-phone"></i> ۰۲۱-۱۲۳۴۵۶۷۸</li>
<li><i class="fa-solid fa-envelope"></i> info@lunashop.ir</li>
<li><i class="fa-regular fa-clock"></i> شنبه تا پنج‌شنبه، ۹ صبح تا ۸ شب</li>

</ul>

<div class="contact-social">
<a href="#" title="اینستاگرام"><i class="fa-brands fa-instagram"></i></a>
<a href="#" title="تلگرام"><i class="fa-brands fa-telegram"></i></a>
<a href="#" title="واتساپ"><i class="fa-brands fa-whatsapp"></i></a>
</div>

</div>

<form class="contact-form" onsubmit="return handleContactForm(event)">

<h3>فرم تماس با ما</h3>

<input type="text" placeholder="نام کامل" required>

<input type="email" placeholder="ایمیل" required>

<input type="text" placeholder="موضوع پیام">

<textarea placeholder="پیام شما" required></textarea>

<button class="btn" type="submit">
<i class="fa-solid fa-paper-plane"></i> ارسال پیام
</button>

</form>

</div>

</div>

<div class="cta-banner">

<div class="container">

<h2>همین حالا بهترین عروسک را برای عزیزانتان انتخاب کنید 🧸</h2>

<a href="products.php" class="btn btn-hero">مشاهده محصولات</a>

</div>

</div>

<?php
include("includes/footer.php");
?>
