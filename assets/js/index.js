

function createToggleText(el, message) {
    const next = el.nextElementSibling;
    if (next && next.tagName === 'DIV') {
        next.remove();
        return;
    }

    const d = document.createElement('div');
    const p = document.createElement('p');

    p.textContent = message;
    d.appendChild(p);

    d.style.opacity = '0';
    d.style.transition = 'opacity 2s';
    d.style.marginTop = '8px';
    d.style.padding = '10px';

    el.parentNode.insertBefore(d, el.nextSibling);

    setTimeout(() => {
        d.style.opacity = '1';
    }, 10);
}

// Fonctions individuelles pour chaque ligne :
function showText_1(el) {
    const message = "Nos équipes disposent de compétences techniques solides, acquises sur le terrain et renforcées par des formations continues. Chaque intervention est réalisée dans les règles de l’art, avec rigueur et précision. Nous maîtrisons les technologies classiques comme les systèmes les plus récents. Cette expertise nous permet de diagnostiquer rapidement et d’agir efficacement. Vous bénéficiez ainsi d’un service fiable, fondé sur le savoir-faire et l’expérience.";
    createToggleText(el, message);
}

function showText_2(el) {
    const message = "La sécurité est au cœur de notre démarche, que ce soit pour les personnes ou les biens. Nous appliquons des protocoles stricts et des vérifications systématiques. Les dispositifs installés sont choisis pour leur fiabilité et leur conformité. Chaque projet intègre une réflexion sur la prévention des risques électriques. Notre priorité : assurer une installation sans danger, durable et conforme.";
    createToggleText(el, message);
}

function showText_3(el) {
    const message = "Toutes nos prestations respectent scrupuleusement les normes en vigueur. Qu’il s’agisse de la norme NF C 15-100 ou d’autres référentiels sectoriels, rien n’est laissé au hasard. Nos équipes assurent une veille réglementaire permanente. Vous avez ainsi la garantie d’une installation légale, validée et prête pour toute inspection. Cette rigueur protège vos biens, votre activité, et votre responsabilité.";
    createToggleText(el, message);
}

function showText_4(el) {
    const message = "Nos interventions sont pensées pour durer : diagnostic rigoureux, matériel certifié, pose soignée. Nous testons systématiquement nos installations avant livraison. Un service après-vente réactif vient compléter notre engagement qualité. Nos clients peuvent compter sur la stabilité de leurs équipements. Faire appel à nous, c’est choisir une prestation fiable sur le long terme.";
    createToggleText(el, message);
}

function showText_5(el) {
    const message = "Nous savons qu’une panne peut devenir critique pour votre activité ou votre confort. C’est pourquoi nous avons mis en place un service réactif et structuré. Nos techniciens interviennent dans les plus brefs délais, avec les bons outils. Le diagnostic est immédiat, la réparation souvent réalisée sur place. Votre tranquillité est notre priorité : on ne vous laisse jamais sans solution.";
    createToggleText(el, message);
}

function showText_6(el) {
    const message = "Chaque projet est unique, et mérite une attention sur mesure. Nous vous conseillons dès les premières étapes : choix techniques, budget, contraintes spécifiques. Un interlocuteur dédié suit l’ensemble de votre dossier. Nous adaptons nos solutions à votre réalité, et non l’inverse. Notre accompagnement vous assure clarté, confort et satisfaction à chaque étape.";
    createToggleText(el, message);
}

function showText_7(el) {
    const message = "Nous intervenons aussi bien en logement individuel qu’en entreprise ou collectivité. Nos équipes savent adapter leur approche selon l’environnement : maison, bureau, commerce, atelier… Les contraintes ne sont pas les mêmes, et nous en tenons compte. Cette polyvalence garantit une prestation adaptée, quel que soit le contexte. Vous avez un seul partenaire pour tous vos besoins en électricité.";
    createToggleText(el, message);
}

function showText_8(el) {
    const message = "Nous sélectionnons des marques reconnues pour leur performance et leur durabilité. Tous les équipements sont certifiés et conformes aux standards de sécurité. Cette exigence garantit la fiabilité de votre installation dans le temps. Elle réduit aussi les coûts d’entretien et de remplacement. Investir dans la qualité, c’est faire le choix de la tranquillité.";
    createToggleText(el, message);
}

function showText_9(el) {
    const message = "Nos plannings sont précis et nos engagements tenus. Nous définissons ensemble les délais dès le devis, et les respectons scrupuleusement. En cas d’aléa, vous êtes immédiatement informé, avec une solution proposée. Cette rigueur permet de planifier sereinement vos travaux ou projets. Gagner votre confiance passe aussi par notre ponctualité.";
    createToggleText(el, message);
}

function showText_10(el) {
    const message = "Nous croyons en une relation client basée sur la confiance. Les devis sont clairs, sans surprise, et expliqués en détail. Nous vous guidons vers les solutions les plus adaptées à vos besoins réels. Pas de vente forcée, pas de jargon technique inutile. Juste des conseils honnêtes, pour vous aider à faire les bons choix.";
    createToggleText(el, message);
}