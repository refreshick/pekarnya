document.addEventListener("DOMContentLoaded", function () {
    const questions = document.querySelectorAll(".faq-question");
  
    questions.forEach((q) => {
      q.addEventListener("click", () => {
        const answer = q.nextElementSibling;
        answer.classList.toggle("open");
      });
    });
  });
  