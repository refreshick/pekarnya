document.addEventListener("DOMContentLoaded", function () {
    const headlines = document.querySelectorAll(".truncate");
  
    headlines.forEach((el) => {
      const maxLength = 50;
      if (el.textContent.length > maxLength) {
        el.textContent = el.textContent.substring(0, maxLength) + "...";
      }
    });
  });
  