<?php

use Livewire\Component;
use App\Models\Contact;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required|string|min:3', message: 'Name must be at least 3 characters')]
    public string $name = '';

    #[Validate('required|email', message: 'Please enter a valid email address')]
    public string $email = '';

    #[Validate('required|string|min:5', message: 'Message payload must be at least 5 characters')]
    public string $message = '';

    public bool $submitted = false;

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'package' => 'general',
            'messenger_contact' => 'email',
            'message' => $this->message,
        ]);

        // Send notification email to Valdric
        try {
            Mail::to('valdricapd@gmail.com')
                ->send(new ContactReceived(
                    senderName: $this->name,
                    senderEmail: $this->email,
                    senderMessage: $this->message,
                ));
        } catch (\Exception $e) {
            // Log error but don't break the UX — submission still recorded in DB
            \Illuminate\Support\Facades\Log::error('Mail send failed: ' . $e->getMessage());
        }

        $this->submitted = true;

        // Reset fields
        $this->reset(['name', 'email', 'message']);
    }

    public function resetForm()
    {
        $this->submitted = false;
    }
};
?>

<div class="w-full">
    <form wire:submit.prevent="submit" class="space-y-8 p-8 border-2 border-charcoalText rounded-2xl bg-creamBg relative">
        <!-- Name -->
        <div class="flex flex-col space-y-2">
            <label for="form-name" class="text-[10px] font-bold uppercase tracking-widest font-tech text-charcoalText/50">Your Name</label>
            <input type="text" id="form-name" wire:model="name" placeholder="Name" class="minimal-input py-3 text-sm">
            @error('name') <span class="text-rose-600 text-[10px] font-bold uppercase font-tech">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="flex flex-col space-y-2">
            <label for="form-email" class="text-[10px] font-bold uppercase tracking-widest font-tech text-charcoalText/50">Email Coordinate</label>
            <input type="email" id="form-email" wire:model="email" placeholder="Email" class="minimal-input py-3 text-sm">
            @error('email') <span class="text-rose-600 text-[10px] font-bold uppercase font-tech">{{ $message }}</span> @enderror
        </div>

        <!-- Message -->
        <div class="flex flex-col space-y-2">
            <label for="form-message" class="text-[10px] font-bold uppercase tracking-widest font-tech text-charcoalText/50">Details / Pitch</label>
            <textarea id="form-message" wire:model="message" rows="4" placeholder="Your Message" class="minimal-input py-3 text-sm resize-none"></textarea>
            @error('message') <span class="text-rose-600 text-[10px] font-bold uppercase font-tech">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" wire:loading.attr="disabled"
            class="w-full py-4 bg-charcoalText hover:bg-cobaltBlue text-creamBg font-extrabold uppercase text-xs tracking-widest font-tech transition-colors duration-300">
            <span wire:loading.remove>Dispatch Transmission</span>
            <span wire:loading>
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-creamBg inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg> Dispatching...
            </span>
        </button>
    </form>

    <!-- SUCCESS MODAL POPUP (Rendered inside the component tree) -->
    @if($submitted)
        <div class="fixed inset-0 w-full h-full bg-charcoalText/60 backdrop-blur-sm flex items-center justify-center z-50 p-6">
            <div class="w-full max-w-md bg-creamBg border-2 border-charcoalText rounded-2xl p-8 shadow-2xl text-center space-y-6 animate-in fade-in zoom-in duration-300">
                <div class="w-12 h-12 rounded-full border-2 border-charcoalText text-charcoalText flex items-center justify-center text-xl mx-auto font-bold bg-creamHighlight">
                    ✓
                </div>
                <div class="font-tech">
                    <h3 class="text-lg font-extrabold uppercase">Transmission Sent</h3>
                    <p class="text-charcoalText/75 text-xs tracking-wide mt-2">
                        Your details payload has been compiled and dispatched. Expect an engineering response sequence soon.
                    </p>
                </div>
                <button wire:click="resetForm" class="w-full py-3 bg-charcoalText text-creamBg font-bold rounded-lg hover:bg-cobaltBlue transition-colors uppercase font-tech text-xs tracking-widest">
                    Acknowledge
                </button>
            </div>
        </div>
    @endif
</div>