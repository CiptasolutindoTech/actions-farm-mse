<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;
use App\Models\SystemMenu;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }

    public $menus = [];

    public function mount()
    {
        // Ambil menu berdasarkan user group yang login
        $this->menus = $this->getMenus();
    }

    public function getMenus()
    {
        // Ambil data user yang login
        $user = auth()->user();
        $userGroupId = $user->user_group_id;

        // Ambil menu berdasarkan user group
        return SystemMenu::whereHas('mappings', function ($query) use ($userGroupId) {
            $query->whereHas('userGroup', function ($subQuery) use ($userGroupId) {
                $subQuery->where('user_group_id', $userGroupId);
            });
        })
        ->with(['children' => function ($query) use ($userGroupId) {
            $query->whereHas('mappings', function ($subQuery) use ($userGroupId) {
                $subQuery->whereHas('userGroup', function ($subSubQuery) use ($userGroupId) {
                    $subSubQuery->where('user_group_id', $userGroupId);
                });
            });
        }])
        ->where('parent_id', '=', '#') // Menampilkan hanya menu top-level
        ->get();
    }

}; ?>

<nav x-data="{ open: false, openMenu: null }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200">
                        <x-application-logo />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @foreach ($menus as $menu)
                    @if ($menu->children->isEmpty())
                        <!-- Check if the menu has a URL -->
                        <a href="{{ $menu->id }}" class="nav-link {{ request()->is($menu->id) ? 'bg-blue-200 text-blue-700 rounded px-2 py-1' : '' }}">
                            {{ $menu->text }}
                        </a>
                    @else
                        <!-- Dropdown for Parent Menu with Children -->
                        <div class="relative">
                            <button x-on:click="openMenu === '{{ $menu->id_menu }}' ? openMenu = null : openMenu = '{{ $menu->id_menu }}'; activeParent = '{{ $menu->id_menu }}'"
                                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 flex items-center space-x-2">
                                <span>{{ $menu->text }}</span>
                                <svg class="h-4 w-4 transition-transform duration-200"
                                     :class="openMenu === '{{ $menu->id_menu }}' ? 'transform rotate-180' : ''"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="openMenu === '{{ $menu->id_menu }}'" x-transition
                                 class="absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-lg rounded-lg">
                                @foreach ($menu->children as $child)
                                    <!-- Check if child has URL and highlight the active one -->
                                    <a href="{{ $child->id }}"
                                       class="dropdown-link {{ request()->is($child->parent_id) ? 'bg-blue-200 text-blue-700 rounded px-2 py-1' : '' }} block py-2 px-4 hover:bg-blue-100 dark:hover:bg-gray-700">
                                        {{ $child->text }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Toggle Theme -->
                <button id="theme-toggle" class="flex items-center gap-2 px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i id="theme-icon-moon" class="uil uil-moon hidden"></i> <!-- Moon icon hidden by default -->
                    <i id="theme-icon-sun" class="uil uil-sun"></i> <!-- Sun icon visible by default -->
                </button>

               <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Profile Link -->
                        <a href="{{ route('profile') }}" class="block w-full text-start py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ __('Profile') }}
                        </a>

                        <!-- Logout Button -->
                        <button wire:click="logout" class="w-full text-start py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

