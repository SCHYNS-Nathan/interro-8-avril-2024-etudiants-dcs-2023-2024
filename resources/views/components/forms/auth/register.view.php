<form action="/register"
      method="post"
      class="flex flex-col gap-6">
    <?php
    csrf_token() ?>
    <div class="flex flex-col gap-2">
        <?php
        component('forms.controls.label-and-input', [
            'name' => 'name',
            'label' => 'Nom <small>au moins 3 caractères, au plus 255</small>',
            'type' => 'text',
            'value' => '',
            'placeholder' => 'John Smith'
        ]);
        ?>
    </div>

    <div class="flex flex-col gap-2">
        <?php
        component('forms.controls.label-and-input', [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'value' => '',
            'placeholder' => 'john.smith@email.com'
        ]);
        ?>
    </div>

    <div class="flex flex-col gap-2">
        <?php
        component('forms.controls.label-and-input', [
            'name' => 'password',
            'label' => 'Mot de passe',
            'type' => 'password',
            'value' => '',
            'placeholder' => ''
        ]);
        ?>
    </div>

    <div>
        <?php
        component('forms.controls.button', ['text' => 'Créer un compte']) ?>
    </div>
    <?php
    $_SESSION['errors'] = [];
    $_SESSION['old'] = [];
    ?>
</form>