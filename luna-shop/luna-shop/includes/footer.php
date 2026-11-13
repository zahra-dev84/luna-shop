<footer>

<div class="footer-main container">

<div class="footer-col">

<h4>🧸 عروسک فروشی لونا</h4>

<p>ارائه بهترین و باکیفیت‌ترین عروسک‌های دخترانه و پسرانه، با قیمت مناسب و ارسال سریع به سراسر کشور.</p>

<div class="footer-social">
<a href="#" title="اینستاگرام"><i class="fa-brands fa-instagram"></i></a>
<a href="#" title="تلگرام"><i class="fa-brands fa-telegram"></i></a>
<a href="#" title="واتساپ"><i class="fa-brands fa-whatsapp"></i></a>
</div>

</div>

<div class="footer-col">

<h4>دسترسی سریع</h4>

<ul>
<li><a href="index.php">صفحه اصلی</a></li>
<li><a href="products.php">محصولات</a></li>
<li><a href="popular.php">محبوب‌ترین‌ها</a></li>
<li><a href="wishlist.php">علاقه‌مندی‌ها</a></li>
<li><a href="about.php">درباره ما</a></li>
<li><a href="cart.php">سبد خرید</a></li>
</ul>

</div>

<div class="footer-col">

<h4>دسته‌بندی‌ها</h4>

<ul>
<li><a href="products.php?size=کوچک">عروسک‌های کوچک</a></li>
<li><a href="products.php?size=متوسط">عروسک‌های متوسط</a></li>
<li><a href="products.php?size=بزرگ">عروسک‌های بزرگ</a></li>
</ul>

</div>

<div class="footer-col">

<h4>تماس با ما</h4>

<ul class="footer-contact">
<li><i class="fa-solid fa-location-dot"></i> تهران، خیابان ولیعصر</li>
<li><i class="fa-solid fa-phone"></i> ۰۲۱-۱۲۳۴۵۶۷۸</li>
<li><i class="fa-solid fa-envelope"></i> info@lunashop.ir</li>
</ul>

</div>

</div>

<div class="footer-bottom">

تمام حقوق متعلق به عروسک فروشی لونا می‌باشد &copy; <?php echo date("Y"); ?>

</div>

</footer>

<script>

var LUNA_WISHLIST_KEY = "luna_wishlist_<?php echo isset($_SESSION['user']) ? preg_replace('/[^a-zA-Z0-9_\-]/','',$_SESSION['user']) : 'guest'; ?>";

/* ---------- Dark mode ---------- */

var themeBtn=document.getElementById("themeBtn");

if(themeBtn){
themeBtn.onclick=function(){
document.body.classList.toggle("dark");
}
}

/* ---------- Mobile menu ---------- */

var menuToggle=document.getElementById("menuToggle");
var mainMenu=document.getElementById("mainMenu");

if(menuToggle && mainMenu){
menuToggle.onclick=function(){
mainMenu.classList.toggle("open");
}
}

/* ---------- Hero slider ---------- */

(function(){

var slides=document.querySelectorAll(".hero-slide");
var dots=document.querySelectorAll(".hero-dots .dot");
var current=0;

if(slides.length===0){
return;
}

function showSlide(i){

slides.forEach(function(s){
s.classList.remove("active");
});

dots.forEach(function(d){
d.classList.remove("active");
});

slides[i].classList.add("active");

if(dots[i]){
dots[i].classList.add("active");
}

current=i;

}

dots.forEach(function(dot,i){
dot.addEventListener("click",function(){
showSlide(i);
});
});

setInterval(function(){
showSlide((current+1) % slides.length);
},5000);

})();

/* ---------- Contact form (front-end only demo) ---------- */

function handleContactForm(e){

e.preventDefault();

alert("پیام شما با موفقیت ارسال شد! تیم لونا به‌زودی با شما تماس می‌گیرد 💌");

e.target.reset();

return false;

}

/* ---------- Newsletter (front-end only demo) ---------- */

function handleNewsletter(e){

e.preventDefault();

alert("با تشکر! شما با موفقیت در خبرنامه لونا عضو شدید 🌷");

e.target.reset();

return false;

}

/* ---------- Wishlist (stored in the browser via localStorage) ---------- */

function getWishlist(){

try{
return JSON.parse(localStorage.getItem(LUNA_WISHLIST_KEY)) || [];
}catch(e){
return [];
}

}

function setWishlist(list){

localStorage.setItem(LUNA_WISHLIST_KEY,JSON.stringify(list));

}

function updateWishlistBadge(){

var count=getWishlist().length;
var badge=document.getElementById("wishlistCount");

if(badge){
badge.textContent=count;
badge.style.display = count>0 ? "inline-flex" : "none";
}

}

function setHeartIcon(btn,active){

var icon=btn.querySelector("i");

if(active){
btn.classList.add("active");
icon.classList.remove("fa-regular");
icon.classList.add("fa-solid");
}else{
btn.classList.remove("active");
icon.classList.remove("fa-solid");
icon.classList.add("fa-regular");
}

}

function attachWishlistButtons(){

var buttons=document.querySelectorAll(".wishlist-btn");

buttons.forEach(function(btn){

var id=parseInt(btn.getAttribute("data-id"));
var list=getWishlist();

setHeartIcon(btn, list.indexOf(id)>-1);

btn.onclick=function(e){

e.preventDefault();

var list=getWishlist();
var idx=list.indexOf(id);

if(idx>-1){

list.splice(idx,1);
setHeartIcon(btn,false);

var card=btn.closest("#wishlistGrid .card");

if(card){
card.remove();
}

}else{

list.push(id);
setHeartIcon(btn,true);

}

setWishlist(list);
updateWishlistBadge();

if(getWishlist().length===0){

var emptyBox=document.getElementById("wishlistEmpty");

if(emptyBox){
emptyBox.style.display="block";
}

}

}

});

}

document.addEventListener("DOMContentLoaded",function(){
attachWishlistButtons();
updateWishlistBadge();
});

</script>

</body>

</html>
