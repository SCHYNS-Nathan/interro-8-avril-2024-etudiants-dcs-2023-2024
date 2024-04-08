<nav id="main-menu">
    <h2 class="sr-only">Menu principal</h2>
    <ul class="flex gap-4">
        <li><a class="underline text-blue-500"
               href="/jiris">Jiris</a></li>
        <li><a class="underline text-blue-500"
               href="/contacts">Contacts</a></li>
        <li><a class="underline text-blue-500"
               href="/projects">Projets</a></li>
        <?php   if(isset($_SESSION['user'])) {
            echo "Bonjour, " . $_SESSION['user'] . " !";
        ?>
            <form action="/logout"
                  method="post">
                <?php
                method('delete') ?>
                <?php
                component('forms.controls.button-danger', ['text' => 'Se déconnecter']); ?>
            </form>
        <?php } else { ?>
            <li class="ml-20"><a class="underline text-blue-500"
                                 href="/register">Créer un compte</a></li>
            <li><a class="underline text-blue-500"
                   href="/login">Se connecter</a></li>
        <?php   }; ?>
    </ul>
</nav>