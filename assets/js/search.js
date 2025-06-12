
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("toggleSearch");
        const searchInput = document.getElementById("searchInput");

        toggleBtn.addEventListener("click", function () {
            searchInput.classList.toggle("active");
            if (searchInput.classList.contains("active")) {
                searchInput.focus();
            }
        });
    });

