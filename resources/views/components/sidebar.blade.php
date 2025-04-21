@php
		$categories = \App\Models\Category::with('subcategories')->get();
@endphp

<div id="hs-application-sidebar"
		class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-65 h-full
    hidden
    fixed inset-y-0 start-0 z-60
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-800 dark:border-neutral-700"
		role="dialog" tabindex="-1" aria-label="Sidebar">
		<div class="relative flex flex-col h-full max-h-full">
				<div class="px-6 pt-4 pb-[10px] flex items-center">
						<!-- Logo -->
						<a class="flex rounded-xl text-xl font-semibold focus:outline-hidden focus:opacity-80" href="{{ url('/') }}"
								aria-label="Inicio">
								<x-heroicon-o-rectangle-stack class="w-8 h-8" />
								<h5
										class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 ml-1">
										Repositorio
								</h5>
						</a>
						<!-- End Logo -->
				</div>

				<!-- Content -->
				<div
						class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
						<nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
								<ul class="flex flex-col space-y-1">
										<!-- Categorías y subcategorías -->
										@foreach ($categories as $category)
												@php
														$isActiveCategory = request()->is($category->slug . '/*');
												@endphp
												<li class="hs-accordion" id="account-accordion">
														<button type="button" @class([
																'hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-lg rounded-lg',
																'bg-gray-200 text-blue-800 font-semibold dark:bg-neutral-700 dark:text-blue-400' => $isActiveCategory,
																'text-gray-800 hover:bg-gray-100 focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200' => !$isActiveCategory,
														])
																aria-expanded="{{ $isActiveCategory ? 'true' : 'false' }}"
																aria-controls="account-accordion-child-{{ $category->id }}">
																@if ($category->icon)
																		<x-dynamic-component :component="$category->icon" class="shrink-0 mt-0.5 size-5" />
																@else
																		<x-heroicon-o-chevron-right class="shrink-0 mt-0.5 size-5" />
																		<!-- Icono por defecto si no hay icono en la categoría -->
																@endif
																{{ $category->name }}

																<svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
																		width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
																		stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
																		<path d="m18 15-6-6-6 6" />
																</svg>

																<svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
																		width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
																		stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
																		<path d="m6 9 6 6 6-6" />
																</svg>
														</button>

														<div id="account-accordion-child-{{ $category->id }}"
																class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ $isActiveCategory ? 'block' : 'hidden' }}"
																role="region" aria-labelledby="account-accordion">
																<ul id="dropdown-{{ $category->id }}" class="ps-8 pt-1 space-y-1">
																		@foreach ($category->subcategories as $sub)
																				@php
																						$firstBanner = $sub->banners->first();
																				@endphp

																				@if ($firstBanner)
																						<li>
																								<a href="{{ route('banner.show', [
																								    'categoria' => $category->slug,
																								    'subcategoria' => $sub->slug,
																								    'title' => $firstBanner->slug,
																								]) }}"
																										class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200
									{{ request()->is($category->slug . '/' . $sub->slug . '/*') ? 'font-bold sub-active' : '' }}">
																										{{ $sub->name }}
																								</a>
																						</li>
																				@endif
																		@endforeach
																</ul>
														</div>
												</li>
										@endforeach
								</ul>
						</nav>
				</div>
				<!-- End Content -->
		</div>
</div>
