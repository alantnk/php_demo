<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <p class="mb-6">

            <a href="/notes" class="text-blue-400 hover:underline">
                back to notes
            </a>
        </p>

        <p>
            <?= htmlentities($note['body']) ?>
        </p>
        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="cursor-pointer px-1 rounded border">
                Edit
            </a>
        </footer>
    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>