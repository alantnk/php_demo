<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <label for="body">Text:</label>
            <div class="mb-2">
                <textarea id="body" name="body" class="bg-blue-100 p-1 w-96 h-48" placeholder="You text here"><?= $note['body'] ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-500 text-sm mb">
                        <?= $errors['body']; ?>
                    </p>
                <?php endif; ?>

            </div>
            <div class="flex gap-2">
                <button type="button" class="text-red-500 cursor-pointer px-1 rounded border" onclick="document.querySelector('#delete-form').submit()">Delete</button>

                <a href="/notes" class="cursor-pointer px-1 rounded border">Cancel</a>
                <button type="submit" class="cursor-pointer px-1 rounded border">Save</button>
            </div>
        </form>
        <form method="POST" id="delete-form" action="/note" class="hidden">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>" />
        </form>

    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>