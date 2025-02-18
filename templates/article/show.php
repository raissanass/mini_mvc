<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>

<?php if ($article) : ?>
    <h1><?= htmlspecialchars($article->getTitle()); ?></h1>
    <p><?= htmlspecialchars($article->getDescription()); ?></p> <!-- Afficher la description de l'article -->
    <!-- Si tu as d'autres champs, affiche-les ici -->
<?php else : ?>
    <p>Article non trouvé.</p>
<?php endif; ?>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>
