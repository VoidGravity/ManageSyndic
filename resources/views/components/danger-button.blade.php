<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger waves-effect waves-light']) }}>
    {{ $slot }}
</button>
