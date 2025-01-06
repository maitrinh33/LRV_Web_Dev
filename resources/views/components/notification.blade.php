<div class="{{ $type === 'success' ? 'bg-green-500' : 'bg-red-500' }} py-2 px-4 rounded-md text-white text-center fixed top-4 right-4 flex gap-4 z-50">
    <p>{{ $message }}</p>
    <span class="cursor-pointer font-bold" onclick="this.parentNode.remove()"><sup>X</sup></span>
</div>
