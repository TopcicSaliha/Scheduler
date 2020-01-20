
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
            <div class="form-group">
            <div class="form-label-group">

            <?= $this->Form->input('email', [
                'type' => 'email',
                'class' => 'form-control',
                'id' => 'email',
                'placeholder' => 'Email adress',
                'required' => 'required',
                'autofocus' => 'autofocus',
                'label' => false,
                'templates' => [
                    'inputContainer' => '{{content}}'
                ],
            ]) ?>
                <?=  $this->Form->label('email', 'Email adress'); ?>
            </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">

            <?= $this->Form->input('password', [
                'type' => 'password',
                'class' => 'form-control',
                'id' => 'password',
                'placeholder' => 'Password',
                'required' => 'required',
                'label' => false,
                'templates' => [
                    'inputContainer' => '{{content}}{{error}}'
                ],
            ]) ?>
            <?=  $this->Form->label('password', 'Password'); ?>
                </div>
            </div>
            <?= $this->Form->submit('Login', ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>


