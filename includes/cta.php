<!-- CTA Buttons Section -->
<div class="fixed bottom-4 right-4 flex flex-col gap-3 z-50">

    <!-- Zalo Button -->
    <a href="https://zalo.me/[your_zalo_id]" target="_blank" rel="noopener noreferrer"
       class="relative flex items-center justify-center w-14 h-14 bg-[#e91e63] text-white rounded-full shadow-lg 
              hover:bg-green-600 hover:scale-110 transition-all duration-300 ease-in-out ripple-effect">
        <i class="ri-chat-smile-3-line text-2xl"></i>
    </a>

    <!-- Phone Button -->
    <a href="tel:+[your_phone_number]"
       class="relative flex items-center justify-center w-14 h-14 bg-[#e91e63] text-white rounded-full shadow-lg 
              hover:bg-blue-600 hover:scale-110 transition-all duration-300 ease-in-out ripple-effect">
        <i class="ri-phone-line text-2xl"></i>
    </a>

    <!-- Messenger Button -->
    <a href="https://m.me/[your_messenger_username]" target="_blank" rel="noopener noreferrer"
       class="relative flex items-center justify-center w-14 h-14 bg-[#e91e63] text-white rounded-full shadow-lg 
              hover:bg-indigo-600 hover:scale-110 transition-all duration-300 ease-in-out ripple-effect">
        <i class="ri-messenger-line text-2xl"></i>
    </a>

    <!-- Scroll to Top Button -->
    <button id="scrollTopBtn"
       class="hidden relative flex items-center justify-center w-14 h-14 bg-[#e91e63] text-white rounded-full shadow-lg 
              hover:bg-[#1ec9e9] hover:scale-110 transition-all duration-300 ease-in-out ripple-effect">
        <i class="ri-arrow-up-line text-2xl"></i>
    </button>
</div>

<!-- CSS Ripple Animation -->
<style>
.ripple-effect::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 9999px;
  border: 2px solid #c4446eff;
  top: 0;
  left: 0;
  animation: ripple 1.5s infinite;
}

@keyframes ripple {
  0% {
    transform: scale(1);
    opacity: 0.8;
  }
  100% {
    transform: scale(1.5);
    opacity: 0;
  }
}
</style>

<!-- Script for Scroll to Top -->
<script>
    const scrollTopBtn = document.getElementById("scrollTopBtn");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollTopBtn.classList.remove("hidden");
            scrollTopBtn.classList.add("flex");
        } else {
            scrollTopBtn.classList.remove("flex");
            scrollTopBtn.classList.add("hidden");
        }
    });

    scrollTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
</script>