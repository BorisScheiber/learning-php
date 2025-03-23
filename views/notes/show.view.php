<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <button class="text-blue-400 mb-6 hover:underline">
                <a href="/notes"><strong>GO BACK</strong></a>
            </button>

            <p><?= htmlspecialchars($note['body']) ?></p>

            <form method="POST" class="mt-6">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>

        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>