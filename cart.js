// Функции для работы с корзиной
function addToCart(productId, quantity = 1) {
    // Показываем индикатор загрузки
    const button = event.target;
    const originalText = button.textContent;
    button.textContent = 'Добавляем...';
    button.disabled = true;
    
    // Перенаправляем на добавление в корзину
    window.location.href = `cart.php?id=${productId}&count=${quantity}`;
}

function updateQuantity(productId, change) {
    const input = document.querySelector(`input[data-product="${productId}"]`);
    if (!input) return;

    const currentQuantity = parseInt(input.value);
    // Если пытаются превысить 20 – предупреждаем и выходим
    if (currentQuantity >= 20 && change > 0) {
        showNotification('Нельзя добавить больше 20 единиц одного товара', 'error');
        return;
    }

    const newQuantity = currentQuantity + change;

    if (newQuantity < 1) {
        removeItem(productId);
        return;
    }
    if (newQuantity > 20) {
        showNotification('Нельзя добавить больше 20 единиц одного товара', 'error');
        return;
    }

    // Отправляем дельту на сервер
    window.location.href = `cart.php?id=${productId}&count=${change}`;
}

// Установка количества через поле ввода
function setQuantity(productId, inputEl) {
    let newQuantity = parseInt(inputEl.value);
    if (isNaN(newQuantity) || newQuantity < 1) newQuantity = 1;

    if (newQuantity > 20) {
        showNotification('Нельзя добавить больше 20 единиц одного товара', 'error');
        newQuantity = 20;
        inputEl.value = 20;
    }

    const initial = parseInt(inputEl.dataset.initial);
    if (newQuantity === initial) return; // нет изменений

    const diff = newQuantity - initial;
    window.location.href = `cart.php?id=${productId}&count=${diff}`;
}

function removeItem(productId) {
    if (confirm('Удалить товар из корзины?')) {
        const currentQuantity = parseInt(document.querySelector(`input[onchange*="${productId}"]`).value);
        window.location.href = `cart.php?id=${productId}&count=-${currentQuantity}`;
    }
}

function clearCart() {
    if (confirm('Очистить всю корзину?')) {
        window.location.href = 'cart.php?clear=1';
    }
}

function checkout() {
    alert('Функция оформления заказа в разработке. Спасибо за ваш заказ!');
}

// Функция для фильтрации товаров по категориям
function filterProducts(category) {
    // Убираем активный класс со всех кнопок
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Добавляем активный класс к нажатой кнопке
    event.target.classList.add('active');
    
    // Показываем/скрываем товары
    const products = document.querySelectorAll('.product-card');
    products.forEach(product => {
        if (category === 'all' || product.dataset.category === category) {
            product.style.display = 'block';
            product.style.animation = 'fadeIn 0.6s ease-out';
        } else {
            product.style.display = 'none';
        }
    });
}

// Функция для показа уведомлений
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 2rem;
        background: ${type === 'success' ? '#4CAF50' : '#f44336'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        z-index: 10000;
        animation: slideIn 0.3s ease-out;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Анимации для уведомлений
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Функция для плавной прокрутки
function smoothScrollTo(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Функция для валидации форм
function validateForm(form) {
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.style.borderColor = '#f44336';
            isValid = false;
        } else {
            input.style.borderColor = '';
        }
    });
    
    return isValid;
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Добавляем обработчики для форм
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                showNotification('Пожалуйста, заполните все обязательные поля', 'error');
            }
        });
    });
    
    // Добавляем обработчики для кнопок "Добавить в корзину"
    const addToCartButtons = document.querySelectorAll('.fancy-button');
    addToCartButtons.forEach(button => {
        if (button.textContent.includes('Добавить в корзину')) {
            button.addEventListener('click', function(e) {
                // Предотвращаем стандартное поведение, если есть onclick
                if (!this.onclick) {
                    e.preventDefault();
                    showNotification('Товар добавлен в корзину!', 'success');
                }
            });
        }
    });
    
    // Анимация появления элементов при скролле
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Наблюдаем за элементами товаров
    const products = document.querySelectorAll('.product, .product-card');
    products.forEach(product => {
        product.style.opacity = '0';
        product.style.transform = 'translateY(20px)';
        product.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(product);
    });
}); 