document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById("toggleSearch");
    const searchInput = document.getElementById("searchInput");
    const searchWrapper = document.querySelector(".search-wrapper");
    let currentHighlightedElements = [];

    // CSS dynamique pour les surlignages
    const style = document.createElement("style");
    style.textContent = `
        .highlight {
            background-color: #fff176;
            padding: 0 2px;
            border-radius: 2px;
            font-weight: bold;
            color: #000;
        }
        .search-input.active {
            width: 200px;
            padding: 8px 15px;
            opacity: 1;
        }
        .search-input {
            width: 0;
            padding: 8px 0;
            opacity: 0;
            transition: all 0.3s ease;
            border: none;
            border-bottom: 2px solid #fff;
            background: transparent;
            color: #000; /* Changed from #fff to #000 for better visibility */
        }
    `;
    document.head.appendChild(style);

    // Fonction pour basculer la recherche
    function toggleSearch() {
        searchInput.classList.toggle("active");
        console.log("toggleSearch called. searchInput active class: " + searchInput.classList.contains("active")); // Debugging line
        if (searchInput.classList.contains("active")) {
            searchInput.focus();
        } else {
            searchInput.value = "";
            removeHighlights();
        }
    }

    // Gestion des événements
    if (toggleBtn && searchInput) {
        toggleBtn.addEventListener("click", function(e) {
            e.stopPropagation();
            toggleSearch();
        });

        // Fermer la recherche si on clique ailleurs
        document.addEventListener("click", function(e) {
            if (!searchWrapper.contains(e.target) && searchInput.classList.contains("active")) {
                searchInput.classList.remove("active");
                searchInput.value = "";
                removeHighlights();
            }
        });

        // Gestion de la touche Entrée/Echap
        searchInput.addEventListener("keyup", function(e) {
            if (e.key === "Enter") {
                performSearch(searchInput.value);
            } else if (e.key === "Escape") {
                searchInput.value = "";
                removeHighlights();
                searchInput.blur();
            } else if (searchInput.value.trim() === "") {
                removeHighlights();
            }
        });

        // Recherche en temps réel avec délai
        let searchTimeout;
        searchInput.addEventListener("input", function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                if (searchInput.value.trim().length > 0) {
                    performSearch(searchInput.value);
                } else {
                    removeHighlights();
                }
            }, 300);
        });
    }

    // Fonction pour supprimer les surlignages
    function removeHighlights() {
        currentHighlightedElements.forEach(element => {
            const parent = element.parentNode;
            if (parent) {
                // Move all child nodes of the highlight element to its parent
                while (element.firstChild) {
                    parent.insertBefore(element.firstChild, element);
                }
                // Remove the highlight element itself
                parent.removeChild(element);
                parent.normalize(); // Clean up any empty text nodes
            }
        });
        currentHighlightedElements = [];
    }

    // Fonction pour surligner le texte
    function highlightText(text) {
        if (!text) return;
        
        removeHighlights();
        
        try {
            const searchRegex = new RegExp(escapeRegExp(text), "gi");
            const walker = document.createTreeWalker(
                document.body,
                NodeFilter.SHOW_TEXT,
                {
                    acceptNode: function(node) {
                        // Exclure les nœuds de texte qui sont des enfants de SCRIPT ou STYLE
                        if (node.parentNode.tagName === 'SCRIPT' || node.parentNode.tagName === 'STYLE') {
                            return NodeFilter.FILTER_REJECT;
                        }
                        // Exclure les nœuds de texte qui sont déjà dans un élément de surlignage
                        if (node.parentNode.classList && node.parentNode.classList.contains('highlight')) {
                            return NodeFilter.FILTER_REJECT;
                        }
                        return node.textContent.trim().length > 0 ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                    }
                },
                false
            );

            let node;
            while (node = walker.nextNode()) {
                const matches = node.textContent.match(searchRegex);
                if (matches && matches.length > 0) {
                    const parent = node.parentNode;
                    const textContent = node.textContent;
                    const parts = textContent.split(searchRegex);
                    let lastIndex = 0;

                    parts.forEach((part, i) => {
                        if (part.length > 0) {
                            parent.insertBefore(document.createTextNode(part), node);
                        }
                        if (i < matches.length) {
                            const match = textContent.substring(lastIndex + part.length, lastIndex + part.length + matches[i].length);
                            const span = document.createElement("span");
                            span.className = "highlight";
                            span.textContent = match;
                            parent.insertBefore(span, node);
                            currentHighlightedElements.push(span);
                            lastIndex += part.length + matches[i].length;
                        }
                    });
                    parent.removeChild(node);
                }
            }

            scrollToFirstHighlight();
        } catch (e) {
            console.error("Erreur dans la recherche:", e);
        }
    }

    // Fonction pour échapper les caractères spéciaux dans les regex
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    // Fonction pour faire défiler jusqu\'au premier résultat
    function scrollToFirstHighlight() {
        const highlights = document.querySelectorAll(".highlight");
        if (highlights.length > 0) {
            highlights[0].scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
            
            // Animation pour le premier résultat
            highlights[0].style.transition = "all 0.3s";
            highlights[0].style.backgroundColor = "#ffeb3b";
            setTimeout(() => {
                highlights[0].style.backgroundColor = "#fff176";
            }, 300);
        }
    }

    // Fonction principale de recherche
    function performSearch(query) {
        const searchTerm = query.trim();
        if (searchTerm !== "") {
            highlightText(searchTerm);
        } else {
            removeHighlights();
        }
    }
});

