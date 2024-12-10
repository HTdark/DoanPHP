const track = document.querySelector('.carousel-track');
const slides = Array.from(track.children);
const leftButton = document.querySelector('.carousel-button-left');
const rightButton = document.querySelector('.carousel-button-right');

const slideWidth = slides[0].getBoundingClientRect().width;
const visibleSlides = 5; // Số lượng sản phẩm hiển thị cùng lúc
let currentIndex = 0;

// Cập nhật carousel
function updateCarousel() {
    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
}

// Khi bấm nút ">" di chuyển phải
rightButton.addEventListener('click', () => {
    if (currentIndex >= slides.length - visibleSlides) {
        currentIndex = 0; // Quay lại đầu tiên
    } else {
        currentIndex++;
    }
    updateCarousel();
});

// Khi bấm nút "<" di chuyển trái
leftButton.addEventListener('click', () => {
    if (currentIndex <= 0) {
        currentIndex = slides.length - visibleSlides; 
    } else {
        currentIndex--;
    }
    updateCarousel();
});

// Đặt kích thước động nếu thay đổi kích cỡ cửa sổ
window.addEventListener('resize', () => {
    track.style.transition = 'none';
    updateCarousel();
    setTimeout(() => {
        track.style.transition = 'transform 0.5s ease';
    });
});
