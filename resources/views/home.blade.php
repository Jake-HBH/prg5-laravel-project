{{--de home page--}}

<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
<h1>Welcome to Pawfect Match</h1>
    <p>Welcome to Pawfect Match! We’re thrilled to have you here! Our mission is to connect animals in need with loving families. On our site, you’ll find a diverse variety of pets, including dogs, cats, small animals, birds, and many more, all searching for a warm and caring home.</p>
    <p>Whether you’re looking for an energetic puppy, a gentle cat, or any other type of companion, you can find the perfect match here. We believe that every animal, big or small, deserves to be happy and to have a second chance at life.</p>
    <p>Join our community of animal lovers and discover how you can make a difference. Together, we can ensure these animals receive the love and care they deserve.</p>
    <br>
    <a href="{{ route('animals.index') }}">Let’s find your great match together! 🐾</a>

</x-layout>
