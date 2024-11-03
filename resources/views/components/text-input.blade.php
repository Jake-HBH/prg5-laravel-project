@props(['disabled' => false, 'checked' => false])

<input
    @disabled($disabled)
    @checked($checked)
    {{ $attributes->merge(['class' => '
        border-gray-300 dark:border-gray-700
        bg-gray-50 dark:bg-gray-900
        text-gray-900 dark:text-gray-300
        focus:ring-indigo-500 focus:border-indigo-500
        rounded-lg shadow-sm p-3
        transition duration-150 ease-in-out
        hover:border-indigo-400
    ']) }}
/>
