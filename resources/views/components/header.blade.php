@php
		use App\Models\Tool;
		$tool = Tool::first();
@endphp

@props([
    'title' => '',
    'category' => '',
    'subcategory' => '',
])

<header
		class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-48 w-full bg-linear-65 from-[#fab024] to-[#e41851] border-b border-gray-200 text-sm py-2.5 lg:ps-65 dark:bg-neutral-800 dark:border-neutral-700">
		<nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
				<div class="me-5 lg:me-0 hidden flex items-center">
						<!-- Logo -->
						<a class="flex rounded-md text-xl font-semibold focus:outline-hidden focus:opacity-80" href="#"
								aria-label="Preline">
								<x-heroicon-o-rectangle-stack class="w-8 h-8" />
								<h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
									{{ $tool->title }}
								</h5>
						</a>
						<!-- End Logo -->
				</div>

				<div class="w-full flex items-center justify-between ms-auto md:justify-between gap-x-1 md:gap-x-3">
						<div class="flex flex-row items-center justify-end gap-1">
								<h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
										{{ $category }} {{ $subcategory }} - {{ $title }}
								</h2>
						</div>
						<div class="flex flex-row items-center justify-end gap-1">

								<!-- Dropdown -->
								<div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
										<button id="hs-dropdown-account" type="button"
												class="size-9.5 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none dark:text-white"
												aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
												<x-heroicon-c-question-mark-circle class="w-8 h-8" />
										</button>

										<div
												class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
												role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
												<div class="p-1.5 space-y-0.5">
														<a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
																href="mailto:{{ $tool->email }}?subject=Consulta&body=Hola,%20tengo%20una%20consulta%20sobre%20el%20sitio%20web.">
																<x-codicon-mail class="shrink-0 size-4" />
																Escríbenos
														</a>
														<a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
																href="https://wa.me/{{ $tool->phone }}?text=Hola,%20tengo%20una%20consulta" target="_blank">
																<x-codicon-mail class="shrink-0 size-4" />
																Contactanos por WhatsApp
														</a>
												</div>
										</div>
								</div>
								<!-- End Dropdown -->
						</div>
				</div>
		</nav>
</header>
