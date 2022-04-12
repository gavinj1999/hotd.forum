<nav class="hidden md:flex items-center justify-between text-xs">
    <ul class="flex uppercase font-semibold space-x-10 pb-3">
       <li>
           <a wire:click.prevent="setStatus('All')" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status ==='All')border-blue text-gray-900 @endif" href="">All Ideas({{$statusCount['all_statuses']}})</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('Considering')" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status ==='Considering')border-blue text-gray-900 @endif" href="">Considering({{$statusCount['considering']}}))</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('In Progress')" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status ==='In Progress')border-blue text-gray-900 @endif" href="">In Progress({{$statusCount['in_progress']}}))</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('Implemented')" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status ==='Implemented')border-blue text-gray-900 @endif" href="">Implemented({{$statusCount['implemented']}}))</a>
         </li>
         <li>
             <a wire:click.prevent="setStatus('Closed')" class=" transition duration-150 ease-in border-b-4 pb-3 hover:border-blue @if($status ==='Closed')border-blue text-gray-900 @endif" href="">Closed({{$statusCount['closed']}}))</a>
         </li>
    </ul>
</nav>
