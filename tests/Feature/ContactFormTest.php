<?php

use App\Models\Contact;
use Livewire\Livewire;

it('renders the contact form component', function () {
    $this->get('/')
        ->assertStatus(200)
        ->assertSeeLivewire('contact-form');
});

it('validates contact form inputs', function () {
    Livewire::test('contact-form')
        ->set('name', '')
        ->set('email', '')
        ->set('message', '')
        ->call('submit')
        ->assertHasErrors(['name' => 'required', 'email' => 'required', 'message' => 'required']);
});

it('submits contact form and stores in database', function () {
    Livewire::test('contact-form')
        ->set('name', 'Valdric Tester')
        ->set('email', 'val@example.com')
        ->set('message', 'Hello Valdric, let us collaborate on a brand new design!')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    $this->assertDatabaseHas('contacts', [
        'name' => 'Valdric Tester',
        'email' => 'val@example.com',
        'package' => 'general',
        'messenger_contact' => 'email',
        'message' => 'Hello Valdric, let us collaborate on a brand new design!',
    ]);
});
