<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>
<?php if (!empty($articles)) : ?>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li>
                <h3><?= htmlspecialchars(string: $article->getTitle()); ?></h3>
                <a href="?controller=article&action=show&id=<?= $article->getId(); ?>">Lire plus</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Pas d'article </p>
<?php endif; ?>
<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>

