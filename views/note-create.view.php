<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>

<?php require "partials/banner.php" ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <label for="body">Text:</label>
            <div>
                <textarea id="body" name="body" class="bg-blue-100 p-1 w-96 h-48" placeholder="You text here"></textarea>
            </div>
            <p>
                <button type="submit" class="cursor-pointer px-1 rounded hover:border">Create</button>
            </p>
        </form>
    </div>
</main>
<?php require "partials/footer.php" ?>