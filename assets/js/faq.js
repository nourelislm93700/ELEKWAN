  
        document.addEventListener("DOMContentLoaded", function() {
            const faqQuestions = document.querySelectorAll(".faq-question");

            faqQuestions.forEach(question => {
                question.addEventListener("click", function() {
                    const faqItem = this.parentNode;
                    faqItem.classList.toggle("active");
                });
            });
        });
    