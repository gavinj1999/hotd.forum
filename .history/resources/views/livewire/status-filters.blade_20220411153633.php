<nav class="hidden md:flex items-center justify-between text-xs">
    <ul class="flex uppercase font-semibold space-x-10 pb-3">
       <li>
           <a wire:click.prevent="setStatus('All')" class="border-b-4 pb-3 border-blue text-gray-900" href="">All Ideas(87)</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('Considering')" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">Considering(6))</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('In Progress')" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">In Progress(1))</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('Implemented')" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">Implemented(6))</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('Closed')" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue" href="">Closed(55))</a>
         </li>
    </ul>
</nav>
